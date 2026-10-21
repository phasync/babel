<?php

declare(strict_types=1);

namespace phasync\Babel;

/**
 * One translation: the token walk over a single compilation unit.
 *
 * @internal used by Babel::translate()
 */
final class Unit
{
    private const RT = '\\phasync\\Babel\\Runtime::';
    /** Keyword tokens that PHP allows as method/constant/case names. */
    private const KEYWORD_NAMES = [
        \T_INCLUDE => 1, \T_INCLUDE_ONCE => 1, \T_REQUIRE => 1, \T_REQUIRE_ONCE => 1, \T_EVAL => 1,
        \T_FILE => 1, \T_DIR => 1, \T_CLASS => 1, \T_INTERFACE => 1, \T_TRAIT => 1, \T_FN => 1,
        \T_FUNCTION => 1, \T_CONST => 1, \T_EXTENDS => 1, \T_IMPLEMENTS => 1, \T_INSTEADOF => 1,
        \T_USE => 1, \T_CATCH => 1, \T_NAMESPACE => 1, \T_STATIC => 1, \T_NEW => 1,
        \T_INSTANCEOF => 1, \T_PUBLIC => 1, \T_PROTECTED => 1, \T_PRIVATE => 1, \T_VAR => 1,
        \T_ABSTRACT => 1, \T_FINAL => 1, \T_READONLY => 1, \T_EXIT => 1, \T_ENUM => 1, \T_CASE => 1,
        \T_HALT_COMPILER => 1, \T_ENDIF => 1, \T_ENDWHILE => 1, \T_ENDFOR => 1, \T_ENDFOREACH => 1,
        \T_ENDSWITCH => 1, \T_ENDDECLARE => 1,
    ];
    private const SPECIAL = [
        'self' => 1, 'parent' => 1, 'static' => 1, 'int' => 1, 'float' => 1, 'bool' => 1,
        'string' => 1, 'array' => 1, 'callable' => 1, 'iterable' => 1, 'object' => 1,
        'mixed' => 1, 'void' => 1, 'null' => 1, 'never' => 1, 'false' => 1, 'true' => 1,
    ];
    private const CONTROL = [
        \T_IF => 1, \T_ELSEIF => 1, \T_WHILE => 1, \T_FOR => 1, \T_FOREACH => 1, \T_SWITCH => 1,
        \T_DECLARE => 1, \T_CATCH => 1, \T_MATCH => 1,
    ];
    /** Functions PHP refuses to call dynamically (they read the caller's frame). */
    private const NO_DYNAMIC = [
        'compact' => 1, 'extract' => 1, 'func_get_args' => 1, 'func_get_arg' => 1, 'func_num_args' => 1,
        'get_defined_vars' => 1, 'assert' => 1,
    ];
    /** Tokens after which an expression is the whole left operand of a following `??`. */
    private const BELOW_COALESCE = [
        '(' => 1, ',' => 1, '[' => 1, '{' => 1, '}' => 1, ';' => 1, '?' => 1, ':' => 1, '=' => 1, \T_COALESCE => 1,
        \T_COALESCE_EQUAL => 1, \T_PLUS_EQUAL => 1, \T_MINUS_EQUAL => 1, \T_MUL_EQUAL => 1, \T_DIV_EQUAL => 1,
        \T_CONCAT_EQUAL => 1, \T_MOD_EQUAL => 1, \T_AND_EQUAL => 1, \T_OR_EQUAL => 1, \T_XOR_EQUAL => 1, \T_SL_EQUAL => 1,
        \T_SR_EQUAL => 1, \T_POW_EQUAL => 1, \T_DOUBLE_ARROW => 1, \T_RETURN => 1, \T_ECHO => 1, \T_PRINT => 1, \T_YIELD => 1,
        \T_LOGICAL_AND => 1, \T_LOGICAL_OR => 1, \T_LOGICAL_XOR => 1, \T_OPEN_TAG => 1, \T_OPEN_TAG_WITH_ECHO => 1,
        \T_THROW => 1, \T_CASE => 1, \T_CURLY_OPEN => 1, \T_DOLLAR_OPEN_CURLY_BRACES => 1, \T_PIPE => 1,
    ];
    /** Tokens that end the right operand of `|>` (operators of lower precedence, and closers). */
    private const PIPE_END = [
        ';' => 1, ',' => 1, ')' => 1, ']' => 1, '}' => 1, '?' => 1, ':' => 1, '|' => 1, '^' => 1, '&' => 1, '<' => 1, '>' => 1,
        \T_PIPE => 1, \T_COALESCE => 1, \T_IS_EQUAL => 1, \T_IS_NOT_EQUAL => 1, \T_IS_IDENTICAL => 1, \T_IS_NOT_IDENTICAL => 1,
        \T_IS_SMALLER_OR_EQUAL => 1, \T_IS_GREATER_OR_EQUAL => 1, \T_SPACESHIP => 1, \T_BOOLEAN_AND => 1, \T_BOOLEAN_OR => 1,
        \T_LOGICAL_AND => 1, \T_LOGICAL_OR => 1, \T_LOGICAL_XOR => 1, \T_DOUBLE_ARROW => 1, \T_CLOSE_TAG => 1, \T_AS => 1,
        \T_AMPERSAND_NOT_FOLLOWED_BY_VAR_OR_VARARG => 1, \T_AMPERSAND_FOLLOWED_BY_VAR_OR_VARARG => 1,
    ];
    private const ALT_END = [
        \T_ENDIF => 1, \T_ENDWHILE => 1, \T_ENDFOR => 1, \T_ENDFOREACH => 1, \T_ENDSWITCH => 1, \T_ENDDECLARE => 1,
    ];

    private array $fn;
    private array $cls;
    private bool $rt;
    private array $id = [];
    private array $tx = [];
    private array $ln = [];
    private array $nx = [];
    private array $pv = [];
    private int $n = 0;
    /** @var array<int,string> token index => replacement text */
    private array $edit = [];
    /** @var array<int,string> text before / after a token, inside any wrap */
    private array $pre = [];
    private array $post = [];
    /** @var list<array{int,int,string,string}> [first token, last token, open, close] */
    private array $wraps = [];
    /** @var array<int,true> opening '"' of strings whose interpolation is turned into concatenation */
    private array $dqFix = [];
    /** @var list<array{string,int}> open strings: [kind q|h|b, index of the opening token] */
    private array $str = [];
    /** @var list<int> token index => index of the matching bracket (-1: none) */
    private array $pair = [];
    /** @var list<int>|null token index => the innermost unclosed bracket around it (built on demand) */
    private ?array $up = null;
    /** @var array<int,int> known exprStart() results: the end of a call or `::` link => its start */
    private array $starts = [];
    /** @var list<int>|null token index => number of `?->` before it (built on demand) */
    private ?array $nullsafe = null;
    /** @var array<int,true> '::' tokens already rewritten as part of a nullsafe chain */
    private array $chained = [];
    /** Identifies this unit in run time call-site ids and temporary variable names. */
    private string $uid = '';
    private bool $strict = false;

    public function __construct(
        private readonly Babel $babel,
        private readonly string $source,
        private readonly string $origin,
        private readonly bool $isEval,
    ) {
        $this->fn = $babel->fn;
        $this->cls = $babel->cls;
        $this->rt = $babel->runtime;
    }

    public function run(): string
    {
        $code = $this->isEval ? '<?php ' . $this->source : $this->source;
        // the lexer and parser warn about odd escapes and casts: the compiler warns again later
        $level = \error_reporting(0);
        \set_error_handler(static fn (): bool => true);
        try {
            if ($this->isEval) {
                try {
                    \token_get_all($code, \TOKEN_PARSE);
                } catch (\CompileError) {
                    return $this->source; // eval() reports the error as without the tool
                }
            }
            $tokens = \token_get_all($code);
        } finally {
            \restore_error_handler();
            \error_reporting($level);
        }
        $n = \count($tokens);
        $id = $tx = $ln = [];
        $line = 1;
        $cr = \strpos($this->source, "\r") !== false;
        foreach ($tokens as $k => $t) {
            if (\is_array($t)) {
                $id[$k] = $t[0];
                $tx[$k] = $t[1];
                $ln[$k] = $line;
                $line += $cr ? \preg_match_all('/\r\n|\r|\n/', $t[1]) : \substr_count($t[1], "\n");
            } else {
                $id[$k] = $t === 'B"' ? 'b"' : $t;
                $tx[$k] = $t;
                $ln[$k] = $line;
            }
        }
        unset($tokens);
        $nx = $pv = [];
        $last = $n;
        for ($i = $n - 1; $i >= 0; --$i) {
            $nx[$i] = $last;
            $t = $id[$i];
            if ($t !== \T_WHITESPACE && $t !== \T_COMMENT && $t !== \T_DOC_COMMENT) {
                $last = $i;
            }
        }
        $last = -1;
        for ($i = 0; $i < $n; ++$i) {
            $pv[$i] = $last;
            $t = $id[$i];
            if ($t !== \T_WHITESPACE && $t !== \T_COMMENT && $t !== \T_DOC_COMMENT) {
                $last = $i;
            }
        }
        $id[$n] = null;
        $tx[$n] = '';
        $nx[$n] = $n;
        $pv[$n] = $n - 1;
        $pair = \array_fill(0, $n + 1, -1);
        $open = [];
        for ($i = 0; $i < $n; ++$i) {
            $t = $id[$i];
            if ($t === '(' || $t === '[' || $t === '{' || $t === \T_CURLY_OPEN || $t === \T_DOLLAR_OPEN_CURLY_BRACES || $t === \T_ATTRIBUTE) {
                $open[] = $i;
            } elseif (($t === ')' || $t === ']' || $t === '}') && $open) {
                $o = \array_pop($open);
                $pair[$o] = $i;
                $pair[$i] = $o;
            }
        }
        foreach ($open as $o) {
            $pair[$o] = $n - 1;
        }
        $this->pair = $pair;
        // call-site ids must differ between units (a file whose content changed; Runtime re-ids each eval)
        $this->uid = \substr(\md5($this->origin . "\0" . $this->source), 0, 10);
        $this->id = $id;
        $this->tx = $tx;
        $this->ln = $ln;
        $this->nx = $nx;
        $this->pv = $pv;
        $this->n = $n;

        if ($this->hasMarker()) {
            return $this->source;
        }
        $skip = [\T_OPEN_TAG => 1, \T_INLINE_HTML => 1, \T_WHITESPACE => 1, \T_COMMENT => 1, \T_DOC_COMMENT => 1];
        for ($i = 0; $i < $n && isset($skip[$id[$i]]); ++$i);
        if ($id[$i] === \T_DECLARE && $id[$nx[$i]] === '(') {
            for ($j = $nx[$nx[$i]], $e = $this->matchClose($nx[$i]); $j < $e; $j = $nx[$j]) {
                if ($id[$j] === \T_STRING && \strcasecmp($tx[$j], 'strict_types') === 0 && $id[$nx[$j]] === '=') {
                    $v = \strtolower(\str_replace('_', '', $tx[$nx[$nx[$j]]])); // any integer literal of value 1
                    if (\str_starts_with($v, '0x')) {
                        $v = \hexdec(\substr($v, 2));
                    } elseif (\str_starts_with($v, '0b')) {
                        $v = \bindec(\substr($v, 2));
                    } elseif (\str_starts_with($v, '0')) {
                        $v = \octdec(\ltrim($v, '0o'));
                    }
                    $this->strict = (int) $v === 1;
                }
            }
        }
        $this->walk();

        return $this->output();
    }

    /** The unit starts with this Babel's marker comment: it is translated already. */
    private function hasMarker(): bool
    {
        if (!\str_contains($this->source, $this->babel->marker)) {
            return false;
        }
        for ($i = 0; $i < $this->n; ++$i) {
            $t = $this->id[$i];
            if ($t === \T_COMMENT) {
                return $this->tx[$i] === $this->babel->marker;
            }
            if ($t !== \T_OPEN_TAG && $t !== \T_OPEN_TAG_WITH_ECHO && $t !== \T_CLOSE_TAG && $t !== \T_INLINE_HTML && $t !== \T_WHITESPACE) {
                return false;
            }
        }

        return false;
    }

    private function output(): string
    {
        if (!$this->edit && !$this->pre && !$this->post && !$this->wraps) {
            return $this->source;
        }
        $tx = $this->tx;
        foreach ($this->edit as $i => $s) {
            $tx[$i] = $s;
        }
        foreach ($this->pre as $i => $s) {
            $tx[$i] = $s . $tx[$i];
        }
        foreach ($this->post as $i => $s) {
            $tx[$i] .= $s;
        }
        // Wraps nest by extent: at a start, outer (later ending) wraps open first; at an end,
        // inner (later starting) wraps close first.
        $opens = $closes = [];
        foreach ($this->wraps as $w => [$s, $e, $open, $close]) {
            $opens[$s][] = [$e, $w, $open];
            $closes[$e][] = [$s, $w, $close];
        }
        foreach ($opens as $s => $list) {
            \usort($list, static fn ($a, $b) => [$b[0], $a[1]] <=> [$a[0], $b[1]]);
            $open = \implode('', \array_column($list, 2));
            $before = $s > 0 ? \substr($tx[$s - 1], -1) : '';
            if ($before !== '' && $open !== '' && (\ctype_alnum($before) || $before === '_') && (\ctype_alnum($open[0]) || $open[0] === '\\' || $open[0] === '_')) {
                $open = ' ' . $open; // include\x... would be one name
            }
            $tx[$s] = $open . $tx[$s];
        }
        foreach ($closes as $e => $list) {
            \usort($list, static fn ($a, $b) => [$b[0], $b[1]] <=> [$a[0], $a[1]]);
            $tx[$e] .= \implode('', \array_column($list, 2));
        }
        unset($tx[$this->n]);
        // The marker, on the first line: after the first open tag of a file, first in eval'd code.
        $marker = $this->babel->marker;
        if ($this->isEval) {
            unset($tx[0]);
            $tx[1] = $marker . ($tx[1] ?? '');
        } else {
            for ($i = 0; $i < $this->n; ++$i) {
                if ($this->id[$i] === \T_OPEN_TAG || $this->id[$i] === \T_OPEN_TAG_WITH_ECHO) {
                    $nl = \strcspn($tx[$i], "\r\n");
                    $tx[$i] = \substr($tx[$i], 0, $nl) . ($nl === \strlen($tx[$i]) ? '' : ' ') . $marker . \substr($tx[$i], $nl) . ($nl === \strlen($tx[$i]) ? ' ' : '');
                    break;
                }
            }
        }

        return \implode('', $tx);
    }

    private function wrap(int $s, int $e, string $open, string $close): void
    {
        $this->wraps[] = [$s, $e, $open, $close];
    }

    private function walk(): void
    {
        $id = $this->id;
        $tx = $this->tx;
        $nx = $this->nx;
        $pv = $this->pv;
        $n = $this->n;
        $fn = $this->fn;
        $cls = $this->cls;
        $rt = $this->rt;

        // Where the data after __halt_compiler() starts, in the original source.
        $haltOffset = null;
        if (\stripos($this->source, '__halt_compiler') !== false) {
            $pos = $this->isEval ? -\strlen($tx[0]) : 0; // eval'd code was given an open tag
            for ($i = 0; $i < $n; ++$i) {
                if ($id[$i] === \T_HALT_COMPILER) {
                    $j = $nx[$i];
                    while ($j < $n && $id[$j] !== ';' && $id[$j] !== \T_CLOSE_TAG) {
                        $j = $nx[$j];
                    }
                    for ($k = $i; $k <= $j && $k < $n; ++$k) {
                        $pos += \strlen($tx[$k]);
                    }
                    $haltOffset = $pos;
                    break;
                }
                $pos += \strlen($tx[$i]);
            }
        }

        $declared = [];
        $sites = [];
        $argSites = [];
        $stack = [];
        $kw = [];
        $depth = 0;
        $ns = $nsl = '';
        $fnImp = $clsImp = $haltAlias = [];
        $listMode = $propMode = $retType = $afterParams = $fnPending = $traitUse = false;
        $inProp = $inConst = false;
        $propStart = $constStart = 0;
        $pend = [];
        $alt = 0;
        $closure = false; // the function whose header is being read is a closure
        $arrows = [];     // depths at which arrow function bodies started
        $constCand = null;
        $site = $this->uid . ':';
        // Is the current position inside a constant expression (no run time calls allowed)?
        $constExpr = static function () use (&$stack, &$depth, &$inConst, &$inProp, &$constStart, &$propStart): bool {
            $limit = $inConst ? $constStart : ($inProp ? $propStart : 0);
            for ($k = $depth - 1; $k >= $limit; --$k) {
                $c = $stack[$k];
                if ($c === 'f' || $c === 'l' || $c === 'h') {
                    return false; // a function body, or the hooks of a property (`get => expr`)
                }
                if ($c === 'Q' || $c === 't') {
                    return true;
                }
            }

            return $inConst || $inProp;
        };

        for ($i = 0; $i < $n; ++$i) {
            $t = $id[$i];
            if ($t === \T_WHITESPACE || $t === \T_COMMENT || $t === \T_DOC_COMMENT) {
                continue;
            }
            // an arrow function body ends at ',', ';' or a closing bracket at its own depth
            while ($arrows && (($t === ')' || $t === ']' || $t === '}') && $depth <= $arrows[\count($arrows) - 1]
                || ($t === ',' || $t === ';' || $t === \T_CLOSE_TAG) && $depth === $arrows[\count($arrows) - 1])) {
                \array_pop($arrows);
            }
            $top = $depth ? $stack[$depth - 1] : '';
            $wasAfter = $afterParams;

            if ($afterParams) {
                if ($t === ':') {
                    $retType = true;
                    $afterParams = false;
                    continue;
                }
                if ($t === \T_USE) {
                    continue;
                }
                if ($t === '(' && $pv[$i] >= 0 && $id[$pv[$i]] === \T_USE) {
                    $afterParams = false;
                    $stack[$depth++] = 'U';
                    continue;
                }
                $afterParams = false;
            }

            // Keyword tokens used as member, constant, case, label or function names are plain names.
            if (\is_int($t) && $t !== \T_VARIABLE && $t !== \T_STRING && $t !== \T_CURLY_OPEN && $t !== \T_DOLLAR_OPEN_CURLY_BRACES
                && $t !== \T_NAME_QUALIFIED && $t !== \T_NAME_FULLY_QUALIFIED && $t !== \T_NAME_RELATIVE
                && $t !== \T_START_HEREDOC && $t !== \T_END_HEREDOC) {
                $pt = $pv[$i] >= 0 ? $id[$pv[$i]] : null;
                if ($pt === \T_OBJECT_OPERATOR || $pt === \T_NULLSAFE_OBJECT_OPERATOR || $pt === \T_DOUBLE_COLON) {
                    continue;
                }
                if ($pt === \T_FUNCTION || $pt === \T_FN || ($pt === \T_AMPERSAND_NOT_FOLLOWED_BY_VAR_OR_VARARG && $pv[$pv[$i]] >= 0
                        && ($id[$pv[$pv[$i]]] === \T_FUNCTION || $id[$pv[$pv[$i]]] === \T_FN))) {
                    continue;
                }
                $ntk = $id[$nx[$i]];
                if ($ntk === ':' && ($pt === '(' || $pt === ',') && ($top === 'p' || $top === 'C')) {
                    continue; // named argument label
                }
                if ($top === 'a' && isset(self::KEYWORD_NAMES[$t])) {
                    continue; // trait adaptation: method names
                }
                if (isset(self::KEYWORD_NAMES[$t]) && ($pt === \T_CONST || ($pt === \T_CASE && $top === 'c') || $pt === \T_AS
                        || ($inConst && $ntk === '=')
                        || (($pt === \T_PUBLIC || $pt === \T_PROTECTED || $pt === \T_PRIVATE || $pt === \T_FINAL) && $pv[$pv[$i]] >= 0 && $id[$pv[$pv[$i]]] === \T_AS))) {
                    if ($constCand !== null) {
                        $constCand[] = $i;
                    }
                    continue;
                }
                if ($inConst && $ntk === '=' && $constCand !== null) {
                    $constCand[] = $i; // reserved word as a typed constant name (DEFAULT, LIST, ...)
                    continue;
                }
            }

            switch ($t) {
                case '(':
                    if ($fnPending) {
                        $fnPending = false;
                        $stack[$depth++] = 'P';
                        break;
                    }
                    $p = $pv[$i] >= 0 ? $id[$pv[$i]] : null;
                    if ($p !== null && isset(self::CONTROL[$p]) && !$this->isMemberName($pv[$i])) {
                        $kw[$depth] = $p;
                        $stack[$depth++] = $p === \T_CATCH ? 'K' : 'C';
                        break;
                    }
                    if ($top === 'P' || $top === 'D' || $retType || ($propMode && $top === 'c')) {
                        $stack[$depth++] = 'D';
                        break;
                    }
                    if ($rt && ($fn || $cls) && $p !== null) {
                        $this->dynamicCall($i, $constExpr);
                    }
                    $stack[$depth++] = 'p';
                    break;
                case ')':
                    if ($depth) {
                        $k = $stack[--$depth];
                        if ($k === 'P' || $k === 'Q' || $k === 'U') {
                            $afterParams = true;
                        } elseif ($k === 'C' && $id[$nx[$i]] === ':' && ($kw[$depth] ?? null) !== \T_ELSEIF) {
                            ++$alt; // if (...): ... endif;
                        }
                    }
                    break;
                case '[':
                    $stack[$depth++] = 'b';
                    break;
                case \T_ATTRIBUTE:
                    $stack[$depth++] = 't';
                    break;
                case ']':
                    if ($depth) {
                        --$depth;
                    }
                    break;
                case '{':
                    if ($pend && $pend[\count($pend) - 1] === $depth) {
                        \array_pop($pend);
                        $k = 'c';
                    } elseif ($traitUse) {
                        $k = 'a';
                    } elseif ((($top === 'c' && $inProp) || $top === 'Q') && !$wasAfter && !$retType) {
                        $k = 'h';
                        $inProp = false;
                    } elseif ($wasAfter || $retType || ($top === 'h' && $pv[$i] >= 0 && $id[$pv[$i]] === \T_STRING)) {
                        $k = $closure && ($wasAfter || $retType) ? 'l' : 'f'; // a closure, or a function, method or hook body
                        $closure = false;
                    } else {
                        $p = $pv[$i] >= 0 ? $id[$pv[$i]] : null;
                        // a bare block `{ ... }` as a statement: its functions are declared at compile time
                        $k = $p === null || $p === ';' || $p === '{' || $p === '}' || $p === \T_OPEN_TAG || $p === \T_CLOSE_TAG ? 'B' : 'o';
                    }
                    $stack[$depth++] = $k;
                    $fnPending = $listMode = $retType = $propMode = $traitUse = false;
                    break;
                case \T_CURLY_OPEN:
                case \T_DOLLAR_OPEN_CURLY_BRACES:
                    $stack[$depth++] = 'i';
                    break;
                case '}':
                    if ($depth) {
                        $k = $stack[--$depth];
                        if ($k === 'n') {
                            $ns = $nsl = '';
                            $fnImp = $clsImp = $haltAlias = [];
                        }
                        if ($k === 'c' || $k === 'h' || $k === 'n') {
                            $inProp = false;
                        }
                    }
                    $propMode = false;
                    break;
                case '"':
                case 'b"':
                case '`':
                case \T_START_HEREDOC:
                case \T_END_HEREDOC:
                    $this->stringToken($i, $depth);
                    break;
                case ';':
                case \T_CLOSE_TAG:
                    $listMode = $propMode = $retType = $fnPending = $traitUse = false;
                    if ($inConst && $depth <= $constStart) {
                        $inConst = false;
                    }
                    if ($top === 'c' || $top === 'Q' || $top === '') {
                        $inProp = false;
                    }
                    $constCand = null;
                    break;
                case ',':
                    if ($top === 'Q') {
                        $stack[$depth - 1] = 'P';
                    }
                    break;
                case '=':
                    if ($top === 'P') {
                        $stack[$depth - 1] = 'Q';
                    }
                    if ($constCand !== null) {
                        for ($k = 0, $c = \count($constCand) - 1; $k < $c; ++$k) {
                            $this->classRef($constCand[$k], $nsl, $clsImp);
                        }
                        $constCand = null;
                    }
                    $propMode = false;
                    break;
                case \T_DOUBLE_ARROW:
                    if ($closure && ($wasAfter || $retType)) {
                        $arrows[] = $depth; // fn (...) => body
                        $closure = false;
                    }
                    $retType = false;
                    break;
                case \T_ENDIF:
                case \T_ENDWHILE:
                case \T_ENDFOR:
                case \T_ENDFOREACH:
                case \T_ENDSWITCH:
                case \T_ENDDECLARE:
                    $alt = \max(0, $alt - 1);
                    break;
                case \T_VARIABLE:
                case \T_ELLIPSIS:
                case \T_AMPERSAND_FOLLOWED_BY_VAR_OR_VARARG:
                    if ($top === 'P') {
                        $stack[$depth - 1] = 'Q';
                    }
                    if ($t === \T_VARIABLE) {
                        $propMode = false;
                        if ($top === 'c') {
                            $inProp = true;
                            $propStart = $depth;
                        }
                        $pt = $pv[$i] >= 0 ? $id[$pv[$i]] : null;
                        if ($rt && $cls && ($pt === \T_NEW || $pt === \T_INSTANCEOF) && !$constExpr()) {
                            $this->wrapCls($i, $this->chainEnd($i, true));
                        }
                    }
                    break;
                case \T_FUNCTION:
                case \T_FN:
                    $fnPending = true;
                    $propMode = false;
                    $j = $nx[$i];
                    $closure = $t === \T_FN || $id[$j] === '(' || $id[$nx[$j]] === '(' && $id[$j] !== \T_STRING;
                    if ($t === \T_FUNCTION && $top !== 'c') {
                        $j = $nx[$i];
                        if ($id[$j] === \T_AMPERSAND_NOT_FOLLOWED_BY_VAR_OR_VARARG) {
                            $j = $nx[$j];
                        }
                        if ($id[$j] === \T_STRING) {
                            // top level declarations always exist; others (conditional, nested) only maybe
                            $lt = \strtolower($tx[$j]);
                            $early = $alt === 0;
                            for ($k = 0; $k < $depth && $early; ++$k) {
                                $early = $stack[$k] === 'n' || $stack[$k] === 'B';
                            }
                            $declared[$nsl][$lt] = ($declared[$nsl][$lt] ?? false) || $early;
                        }
                    }
                    break;
                case \T_CLASS:
                case \T_INTERFACE:
                case \T_TRAIT:
                case \T_ENUM:
                    $nt = $id[$nx[$i]];
                    if ($nt === \T_STRING || ($t === \T_CLASS && ($nt === '(' || $nt === '{' || $nt === \T_EXTENDS || $nt === \T_IMPLEMENTS))) {
                        $pend[] = $depth;
                    }
                    break;
                case \T_EXTENDS:
                case \T_IMPLEMENTS:
                case \T_INSTEADOF:
                    $listMode = true;
                    break;
                case \T_CASE:
                    if ($top === 'c') { // an enum case value is a constant expression
                        $inConst = true;
                        $constStart = $depth;
                    }
                    break;
                case \T_CONST:
                    $inConst = true;
                    $constStart = $depth;
                    if ($top === 'c') {
                        $constCand = [];
                        $propMode = false;
                    }
                    break;
                case \T_PUBLIC:
                case \T_PROTECTED:
                case \T_PRIVATE:
                case \T_STATIC:
                case \T_READONLY:
                case \T_VAR:
                case \T_ABSTRACT:
                case \T_FINAL:
                case \T_PUBLIC_SET:
                case \T_PROTECTED_SET:
                case \T_PRIVATE_SET:
                    if ($top === 'c') {
                        $propMode = true;
                    }
                    break;
                case \T_NAMESPACE:
                    $j = $nx[$i];
                    $name = '';
                    if ($id[$j] === \T_STRING || $id[$j] === \T_NAME_QUALIFIED || (\is_int($id[$j]) && \preg_match('/^[A-Za-z_]\w*$/', $tx[$j]))) {
                        $name = $tx[$j]; // also a reserved word: namespace List;
                        $j = $nx[$j];
                    }
                    if ($id[$j] === '{' || $id[$j] === ';' || $id[$j] === \T_CLOSE_TAG) {
                        $ns = $name;
                        $nsl = \strtolower($name);
                        $fnImp = $clsImp = $haltAlias = [];
                        if ($id[$j] === '{') {
                            $stack[$depth++] = 'n';
                        }
                        $i = $j;
                    }
                    break;
                case \T_USE:
                    if (($depth === 0 || $top === 'n') && ($pv[$i] < 0 || $id[$pv[$i]] !== ')')) {
                        $u = $this->parseUse($i);
                        if ($u !== null) {
                            $this->applyUse($u, $fnImp, $clsImp);
                            foreach ($u['items'] as $it) {
                                if ($it['kind'] === 'k' && \ltrim($it['name'], '\\') === '__COMPILER_HALT_OFFSET__') {
                                    $haltAlias[$it['alias'] ?? '__COMPILER_HALT_OFFSET__'] = true;
                                }
                            }
                            $i = $u['end'];
                        }
                    } elseif ($top === 'c') {
                        $listMode = $traitUse = true;
                    }
                    break;
                case \T_NEW:
                case \T_INSTANCEOF:
                    if ($rt && $cls && !$constExpr()) {
                        $this->dynamicNew($i);
                    }
                    break;
                case \T_DOUBLE_COLON:
                    if ($cls) {
                        $this->dynamicClass($i, $rt && !$constExpr());
                    }
                    break;
                case \T_PIPE:
                    if ($rt && ($fn || $cls) && !$constExpr()) {
                        $this->pipeOperand($i);
                    }
                    break;
                case \T_EVAL:
                    if ($rt) {
                        $this->evalSite($i);
                    }
                    break;
                case \T_FILE:
                    // Reached only for the real magic constant: a T_FILE used as a name (member,
                    // constant, trait alias, ...) already `continue`d above, never reaching this switch.
                    if ($this->babel->fileConstants && !$this->isEval) {
                        $this->edit[$i] = self::quote($this->origin);
                    }
                    break;
                case \T_DIR:
                    if ($this->babel->fileConstants && !$this->isEval) {
                        $this->edit[$i] = self::quote(\dirname($this->origin));
                    }
                    break;
                case \T_INCLUDE:
                case \T_INCLUDE_ONCE:
                case \T_REQUIRE:
                case \T_REQUIRE_ONCE:
                    if (null !== $this->babel->includeHandler) {
                        $this->includeSite($i);
                    }
                    break;
                case \T_HALT_COMPILER:
                    break 2;
                case \T_CONSTANT_ENCAPSED_STRING:
                    // 'fopen'(...) / 'Class::method'(...) / ('fopen')(...)
                    $pt = $pv[$i] >= 0 ? $id[$pv[$i]] : null;
                    $grouped = $pt === '(' && $id[$nx[$i]] === ')' && $id[$nx[$nx[$i]]] === '(' && $pv[$pv[$i]] >= 0
                        && !\in_array($id[$pv[$pv[$i]]], [\T_STRING, \T_NAME_QUALIFIED, \T_NAME_FULLY_QUALIFIED, \T_NAME_RELATIVE, \T_VARIABLE, ')', ']', '}',
                            \T_STATIC, \T_ARRAY, \T_ISSET, \T_EMPTY, \T_LIST, \T_EVAL, \T_EXIT, \T_CLASS, \T_NEW, \T_INSTANCEOF, \T_CLONE, \T_PRINT, \T_ECHO], true)
                        && !isset(self::CONTROL[$id[$pv[$pv[$i]]]]);
                    if (($id[$nx[$i]] === '(' || $grouped) && ($fn || $cls)
                        && $pt !== \T_OBJECT_OPERATOR && $pt !== \T_NULLSAFE_OBJECT_OPERATOR && $pt !== \T_DOUBLE_COLON
                        && $pt !== \T_NEW && $pt !== \T_INSTANCEOF) {
                        $v = self::literal($tx[$i]);
                        $r = $this->babel->mapCallable($v);
                        if ($r !== $v) {
                            $this->edit[$i] = self::quote($r, $this->tx[$i]);
                        }
                    }
                    break;
                case \T_STRING:
                case \T_NAME_QUALIFIED:
                case \T_NAME_FULLY_QUALIFIED:
                case \T_NAME_RELATIVE:
                    $p = $pv[$i] >= 0 ? $id[$pv[$i]] : null;
                    if ($p === \T_OBJECT_OPERATOR || $p === \T_NULLSAFE_OBJECT_OPERATOR || $p === \T_DOUBLE_COLON) {
                        break;
                    }
                    if ($constCand !== null) {
                        $constCand[] = $i;
                        break;
                    }
                    $nxt = $id[$nx[$i]];
                    if ($haltOffset !== null && ($tx[$i] === '__COMPILER_HALT_OFFSET__' || $tx[$i] === '\\__COMPILER_HALT_OFFSET__' || isset($haltAlias[$tx[$i]])
                            || ($nsl === '' && \strcasecmp($tx[$i], 'namespace\\__COMPILER_HALT_OFFSET__') === 0))
                        && $this->constantPosition($i, $top, $inConst) && !$listMode && !$retType && !$propMode
                        && $top !== 'P' && $top !== 'K' && $top !== 'D' && $top !== 't' && $top !== 'a') {
                        $this->edit[$i] = (string) $haltOffset;
                        break;
                    }
                    if ($top === 'h' && $nxt === '(' && (\strcasecmp($tx[$i], 'get') === 0 || \strcasecmp($tx[$i], 'set') === 0)
                        && ($p === '{' || $p === ';' || $p === '}' || $p === ']' || $p === \T_FINAL || $p === \T_AMPERSAND_NOT_FOLLOWED_BY_VAR_OR_VARARG)) {
                        $fnPending = true;
                        break;
                    }
                    if ($listMode || $top === 't' || $top === 'K' || $top === 'D' || $top === 'P' || $retType
                        || ($propMode && $top === 'c') || $p === \T_NEW || $p === \T_INSTANCEOF || $nxt === \T_DOUBLE_COLON) {
                        $key = $this->classRef($i, $nsl, $clsImp);
                        if ($p === \T_NEW && $nxt === '(' && $key !== null && isset(Babel::CLASS_ARG_NEW[$key])) {
                            $argSites[] = [$nx[$i], $key, null, '', $constExpr(), false];
                        }
                        if ($nxt === \T_DOUBLE_COLON && $key !== null) {
                            $m = $nx[$nx[$i]];
                            $sk = $key . '::' . \strtolower($tx[$m]);
                            if (isset(Babel::STATIC_ARG[$sk]) && $id[$nx[$m]] === '(') {
                                $argSites[] = [$nx[$m], $sk, null, '', $constExpr(), false];
                            }
                        }
                        break;
                    }
                    if ($nxt !== '(') {
                        break;
                    }
                    if ($p === \T_FUNCTION || $p === \T_FN || $p === \T_CONST
                        || ($p === \T_AMPERSAND_NOT_FOLLOWED_BY_VAR_OR_VARARG && $pv[$pv[$i]] >= 0
                            && ($id[$pv[$pv[$i]]] === \T_FUNCTION || $id[$pv[$pv[$i]]] === \T_FN))) {
                        break;
                    }
                    $this->callSite($i, $ns, $nsl, $fnImp, $clsImp, $constExpr(), $site, $sites, $argSites);
                    break;
            }
        }

        $this->finishCalls($sites, $argSites, $declared);
    }

    /**
     * A call to a named function at $i: rewrite it when it resolves to a mapped function and note
     * class-name, callable and member-string arguments.
     */
    private function callSite(int $i, string $ns, string $nsl, array $fnImp, array $clsImp, bool $constExpr, string $site, array &$sites, array &$argSites): void
    {
        $t = $this->id[$i];
        $text = $this->tx[$i];
        $fallback = false;
        $imported = false;
        $lt = '';
        if ($t === \T_NAME_FULLY_QUALIFIED) {
            $key = \strtolower(\substr($text, 1));
        } elseif ($t === \T_NAME_RELATIVE) {
            $key = ($nsl === '' ? '' : $nsl . '\\') . \strtolower(\substr($text, 10));
        } elseif ($t === \T_NAME_QUALIFIED) {
            $q = \strpos($text, '\\');
            $first = \strtolower(\substr($text, 0, $q));
            $key = isset($clsImp[$first])
                ? \strtolower($clsImp[$first] . \substr($text, $q))
                : ($nsl === '' ? '' : $nsl . '\\') . \strtolower($text);
        } else {
            $lt = \strtolower($text);
            if (isset($fnImp[$lt])) {
                $key = \strtolower($fnImp[$lt]);
                $imported = true;
            } else {
                $key = $lt;
                $fallback = $nsl !== '';
            }
        }
        if ($fallback) {
            // resolved at the end, when all declarations of the unit are known
            $sites[] = [$i, $nsl, $lt, $ns, $constExpr, $site . $i];
        } elseif (isset($this->fn[$key]) && !$imported) {
            $this->edit[$i] = '\\' . $this->fn[$key];
        }
        if ($this->rt || isset(Babel::CLASS_ARG_FN[$key]) || isset(Babel::MEMBER_ARG_FN[$key]) || isset(Babel::callableArgs()[$key])) {
            if (Babel::argSpecs($key)) {
                $argSites[] = [$this->nx[$i], $key, $fallback ? $nsl : null, $lt, $constExpr, true];
            }
        }
    }

    private function finishCalls(array $sites, array $argSites, array $declared): void
    {
        // 1. calls that must go to a shim (first-class callable or placeholder of a class-name function)
        $shimmed = [];
        foreach ($argSites as [$open, $key, $s, $lt, $constExpr, $isFn]) {
            if (($s === null || ($declared[$s][$lt] ?? false) !== true) && $this->callArgs($open, $key, $constExpr, $isFn, false, null)) {
                $shimmed[$this->pv[$open]] = Babel::SHIM_NS . ($this->strict ? 'Strict\\' : '') . $key;
            }
        }
        // 2. unqualified calls in a namespace: the namespaced function, or the global one's replacement
        $guard = $hasArgs = [];
        foreach ($argSites as [$open]) {
            $hasArgs[$this->pv[$open]] = true;
        }
        foreach ($sites as [$i, $s, $lt, $nsName, $constExpr, $siteId]) {
            $decl = $declared[$s][$lt] ?? null;
            $local = $nsName . '\\' . $this->tx[$i];
            $ifLocal = $this->fn[$s . '\\' . $lt] ?? null;
            $ifGlobal = $this->fn[$lt] ?? $shimmed[$i] ?? null;
            if ($decl === true) {
                if ($ifLocal !== null) {
                    $this->edit[$i] = '\\' . $ifLocal;
                }
                unset($shimmed[$i]);
            } elseif ($ifLocal === null && $ifGlobal === null && !($decl === false && isset($hasArgs[$i]) && $this->rt && !$constExpr && !isset(self::NO_DYNAMIC[$lt]))) {
                continue; // nothing mapped either way (a polyfill in this file still guards the arguments)
            } elseif ($constExpr || !$this->rt || ($decl === null && !$this->babel->nsFallback) || ($ifGlobal === null && isset(self::NO_DYNAMIC[$lt]))) {
                // no run time choice possible (or wanted): PHP's usual outcome, the global function
                $r = $ifGlobal;
                if ($r !== null) {
                    $this->edit[$i] = '\\' . $r;
                }
            } else {
                // PHP falls back to the global function only when the namespaced one does not exist
                $guard[$i] = $siteId;
                $this->edit[$i] = self::RT . 'ns(' . self::quote($siteId) . ', ' . self::quote($local) . ', '
                    . self::quote($ifLocal ?? $local) . ', ' . self::quote($ifGlobal ?? $this->tx[$i]) . ')';
            }
        }
        foreach ($shimmed as $i => $shim) {
            if (!isset($this->edit[$i])) {
                $this->edit[$i] = '\\' . $shim;
            }
        }
        // 3. class-name, callable and member arguments (only when the global function is reached)
        foreach ($argSites as [$open, $key, $s, $lt, $constExpr, $isFn]) {
            if ($s === null || ($declared[$s][$lt] ?? false) !== true) {
                $this->callArgs($open, $key, $constExpr, $isFn, true, $guard[$this->pv[$open]] ?? null);
            }
        }
    }

    /**
     * Maps the class-name, callable and member arguments of the call whose '(' is at $open.
     *
     * @return bool the call must go to the shim instead (first-class callable, placeholder)
     */
    private function callArgs(int $open, string $key, bool $constExpr, bool $isFn, bool $apply, ?string $guard): bool
    {
        $id = $this->id;
        $nx = $this->nx;
        $args = $this->args($open);
        $specs = Babel::argSpecs($key);
        $canShim = $isFn && $this->rt && isset(Babel::CLASS_ARG_FN[$key]) && !isset(Babel::NO_SHIM[$key]) && !isset($this->fn[$key]);
        $positional = 0;
        $named = [];
        $byPos = [];
        $spread = null;
        foreach ($args as $n => [$f, $l]) {
            if ($id[$f] === \T_ELLIPSIS) {
                if ($f === $l) {
                    return $canShim; // first-class callable syntax f(...)
                }
                $spread ??= $n;
                continue;
            }
            if ($f < $l && $id[$nx[$f]] === ':' && \preg_match('/^[A-Za-z_]\w*$/', $this->tx[$f])) {
                $named[\strtolower($this->tx[$f])] = [$nx[$nx[$f]], $l];
                continue;
            }
            if (!$named && $spread === null) {
                $byPos[$positional++] = [$f, $l];
            }
        }
        if ($spread !== null && $apply && $this->rt && !$constExpr && !$this->startsRuntime($nx[$args[$spread][0]])) {
            // every unpacked list goes through one spread() (the position of a later one is known at run time only)
            $lists = [];
            foreach ($args as $n => [$f, $l]) {
                if ($n >= $spread && $id[$f] === \T_ELLIPSIS) {
                    $lists[] = [$f, $l];
                }
            }
            [$f, $l] = $lists[0];
            $e = $lists[\count($lists) - 1][1];
            foreach (\array_slice($lists, 1) as [$g]) {
                $this->edit[$g] = ''; // ...$b becomes the next list
            }
            // plain variables keep their elements' references for by-reference parameters (usort(...$a))
            $ref = $isFn && Babel::byRef($key);
            foreach ($lists as [$g, $h]) {
                $ref = $ref && $nx[$g] === $h && $id[$h] === \T_VARIABLE;
            }
            $this->wrap($nx[$f], $e, self::RT . ($ref ? 'spreadRef(' : 'spread(') . self::quote($key) . ', ' . $positional . ', '
                . ($guard !== null ? self::quote($guard) : 'null') . ', ', ')');
        }
        $shim = false;
        foreach ($specs as [$mode, $pos, $names]) {
            $target = $byPos[$pos] ?? null;
            foreach ($names as $name) {
                $target ??= $named[$name] ?? null;
            }
            if ($target === null) {
                continue;
            }
            [$first, $last] = $target;
            if ($first === $last && $id[$first] === '?') {
                $shim = $shim || ($mode === 'cls' && $canShim); // partial application placeholder
                continue;
            }
            if ($apply) {
                $this->mapArg($first, $last, $mode, $constExpr, $guard);
            }
        }

        return $shim;
    }

    /** @return list<array{int,int}> first and last significant token of each argument */
    private function args(int $open): array
    {
        $id = $this->id;
        $d = 0;
        $first = $last = -1;
        $args = [];
        for ($j = $open + 1; $j < $this->n; ++$j) {
            $t = $id[$j];
            if ($t === \T_WHITESPACE || $t === \T_COMMENT || $t === \T_DOC_COMMENT) {
                continue;
            }
            if ($d === 0 && ($t === ')' || $t === ',')) {
                if ($first >= 0) {
                    $args[] = [$first, $last];
                }
                $first = -1;
                if ($t === ')') {
                    break;
                }
                continue;
            }
            if ($first < 0) {
                $first = $j;
            }
            if ($t === '(' || $t === '[' || $t === '{' || $t === \T_CURLY_OPEN || $t === \T_DOLLAR_OPEN_CURLY_BRACES || $t === \T_ATTRIBUTE) {
                $j = $this->matchClose($j); // nested brackets in one step
            }
            $last = $j;
        }

        return $args;
    }

    /** Maps one argument holding a class name ('cls'), a callable ('fn') or a 'Class::member' ('member'). */
    private function mapArg(int $first, int $last, string $mode, bool $constExpr, ?string $guard): void
    {
        $id = $this->id;
        $nx = $this->nx;
        if ($guard !== null) {
            // the call may reach a namespaced function at run time: map only when the global one is called
            if ($this->rt && !$constExpr && !$this->startsRuntime($first) && !($last - $first >= 2 && $id[$last] === \T_CLASS && $id[$nx[$first]] === \T_DOUBLE_COLON)) {
                $this->wrap($first, $last, self::RT . 'arg(' . self::quote($guard) . ', ' . self::quote($mode) . ', ', ')');
            }

            return;
        }
        if ($mode === 'fns') {
            if ($this->rt && !$constExpr && !$this->startsRuntime($first)) {
                $this->wrap($first, $last, self::RT . 'fns(', ')'); // ['/re/' => 'callable', ...]
            }

            return;
        }
        if ($first === $last && $id[$first] === \T_CONSTANT_ENCAPSED_STRING) {
            $v = self::literal($this->tx[$first]);
            $r = $mode === 'fn' ? $this->babel->mapCallable($v) : ($mode === 'member' ? $this->babel->mapMember($v) : $this->babel->mapClass($v));
            if ($r !== $v) {
                $this->edit[$first] = self::quote($r, $this->tx[$first]);
            }

            return;
        }
        if ($first === $last && ($id[$first] === \T_LNUMBER || $id[$first] === \T_DNUMBER)) {
            return;
        }
        if ($last - $first >= 2 && $id[$last] === \T_CLASS && $id[$nx[$first]] === \T_DOUBLE_COLON && $nx[$nx[$first]] === $last) {
            return; // X::class is rewritten already
        }
        if ($mode === 'fn' && ($id[$first] === '[' || $id[$first] === \T_ARRAY) && $this->matchClose($id[$first] === '[' ? $first : $nx[$first]) === $last) {
            // [ 'Class', 'method' ]: map a literal class string, leave a computed one to the run time
            $e = $id[$first] === '[' ? $nx[$first] : $nx[$nx[$first]];
            if ($id[$e] === \T_CONSTANT_ENCAPSED_STRING && $id[$nx[$e]] === ',') {
                $v = self::literal($this->tx[$e]);
                $r = $this->babel->mapClass($v);
                if ($r !== $v) {
                    $this->edit[$e] = self::quote($r, $this->tx[$e]);
                }

                return;
            }
            if ($id[$e] === ']' || $id[$e] === ')' || ($last - $first >= 4 && $id[$nx[$nx[$e]]] === \T_CLASS && $id[$nx[$e]] === \T_DOUBLE_COLON)) {
                return; // empty, or [X::class, 'm']
            }
        }
        if (!$this->rt || $constExpr || $this->startsRuntime($first)) {
            return;
        }
        $this->wrap($first, $last, self::RT . ($mode === 'fn' ? 'fn' : ($mode === 'member' ? 'member' : 'cls')) . '(', ')');
    }

    /** The expression at $s is already a Runtime wrapper (translated code translated again). */
    private function startsRuntime(int $s): bool
    {
        $id = $this->id;
        while ($id[$s] === '(') {
            $s = $this->nx[$s];
        }
        if ($id[$s] === \T_NAME_FULLY_QUALIFIED) {
            return \strncasecmp($this->tx[$s], '\\phasync\\Babel\\', 15) === 0;
        }

        return $id[$s] === \T_VARIABLE && $this->tx[$s] === '$GLOBALS' && $id[$this->nx[$s]] === '['
            && \str_contains($this->tx[$this->nx[$this->nx[$s]]], '__phasync_babel_');
    }

    /** The token at $i follows '->', '?->' or '::' (a member name). */
    private function isMemberName(int $i): bool
    {
        $p = $this->pv[$i];
        $t = $p >= 0 ? $this->id[$p] : null;

        return $t === \T_OBJECT_OPERATOR || $t === \T_NULLSAFE_OBJECT_OPERATOR || $t === \T_DOUBLE_COLON;
    }

    /** __COMPILER_HALT_OFFSET__ (or an alias) at $i is used as a constant, not as a name. */
    private function constantPosition(int $i, string $top, bool $inConst): bool
    {
        $p = $this->pv[$i] >= 0 ? $this->id[$this->pv[$i]] : null;
        $nt = $this->id[$this->nx[$i]];
        if ($nt === \T_DOUBLE_COLON || $nt === '(' || $nt === \T_VARIABLE || $nt === \T_ELLIPSIS || $nt === \T_AMPERSAND_FOLLOWED_BY_VAR_OR_VARARG
            || $nt === \T_AS || ($nt === '=' && $inConst) || ($nt === ':' && ($p === '(' || $p === ',') && $top === 'p')
            || ($nt === ':' && ($p === null || $p === ';' || $p === '{' || $p === '}' || $p === \T_OPEN_TAG))) { // also a goto label
            return false;
        }

        return !\in_array($p, [\T_CLASS, \T_NEW, \T_INTERFACE, \T_TRAIT, \T_ENUM, \T_EXTENDS, \T_IMPLEMENTS, \T_INSTANCEOF,
            \T_FUNCTION, \T_CONST, \T_CASE, \T_AS, \T_USE, \T_NAMESPACE, \T_GOTO, \T_INSTEADOF, \T_CATCH], true);
    }

    /** Tracks string literals with interpolation, and applies the concatenation rewrite on close. */
    private function stringToken(int $i, int $depth): void
    {
        $t = $this->id[$i];
        $top = $this->str ? $this->str[\count($this->str) - 1] : null;
        if ($t === \T_START_HEREDOC) {
            $this->str[] = ['h', $i, $depth];
        } elseif ($t === \T_END_HEREDOC) {
            \array_pop($this->str);
        } elseif ($t !== 'b"' && $top !== null && $top[0] === ($t === '"' ? 'q' : 'b') && $top[2] === $depth) {
            \array_pop($this->str);
            if (isset($this->dqFix[$top[1]])) {
                $this->edit[$top[1]] = '(' . $this->tx[$top[1]];
                if (($this->edit[$i - 1] ?? null) === ') . "') {
                    // no empty "" at the end: as the last node compiled it would move the line of an eval
                    $this->edit[$i - 1] = ')';
                    $this->edit[$i] = ')';
                } else {
                    $this->edit[$i] = $this->tx[$i] . ')';
                }
            }
        } else {
            $this->str[] = [$t === '`' ? 'b' : 'q', $i, $depth];
        }
    }

    /**
     * How an expression starting at $s can be wrapped: null outside string interpolation;
     * 'dq' when it opens a "{$...}" of a double quoted string (rewritten to concatenation);
     * 'globals' when it opens a "{$...}" of a heredoc or backtick string.
     */
    private function interpolation(int $s): ?string
    {
        $p = $this->pv[$s];
        if ($p < 0 || $this->id[$p] !== \T_CURLY_OPEN || !$this->str) {
            return null;
        }
        $top = $this->str[\count($this->str) - 1];
        if ($top[0] !== 'q') {
            return 'globals';
        }
        // "...{$expr}..." becomes ("..." . (expr) . "..."), so expr needs no '$' in front
        $this->dqFix[$top[1]] = true;
        $this->edit[$p] = '" . (';
        $this->edit[$this->matchClose($p)] = ') . "';

        return 'dq';
    }

    private function wrapCls(int $s, int $e): void
    {
        if ($this->startsRuntime($s)) {
            return;
        }
        if ($this->interpolation($s) === 'globals') {
            $this->wrap($s, $e, "\$GLOBALS['__phasync_babel_cls'](", ')');
        } else {
            $this->wrap($s, $e, '(' . self::RT . 'cls(', '))');
        }
    }

    /** new / instanceof followed by a computed class: (expr), $$x, ${...}, X::$p, static::$p. */
    private function dynamicNew(int $i): void
    {
        $id = $this->id;
        $nx = $this->nx;
        $j = $nx[$i];
        $end = -1;
        if (($id[$j] === \T_STATIC || $id[$j] === \T_STRING || $id[$j] === \T_NAME_QUALIFIED || $id[$j] === \T_NAME_FULLY_QUALIFIED || $id[$j] === \T_NAME_RELATIVE)
            && $id[$nx[$j]] === \T_DOUBLE_COLON && ($id[$nx[$nx[$j]]] === \T_VARIABLE || $id[$nx[$nx[$j]]] === '$')) {
            $end = $this->chainEnd($j, true);
        } elseif ($id[$j] === '(') {
            $end = $this->matchClose($j);
        } elseif ($id[$j] === '$') {
            $end = $this->chainEnd($j, true);
        }
        if ($end > $j) {
            $this->wrapCls($j, $end);
        }
    }

    /**
     * Last token of the chain that starts at $i: $a->b[0]->c, $$a, ${..}, with calls unless $newMode
     * (in `new $a->b(...)` the parentheses are the constructor's), with `::$p` links in $newMode.
     */
    private function chainEnd(int $i, bool $newMode): int
    {
        $id = $this->id;
        $nx = $this->nx;
        $n = $this->n;
        $last = $i;
        if ($id[$i] === '(' || $id[$i] === '[') { // new (expr), [...]
            $last = $this->matchClose($i);
        } elseif (!$newMode && $this->nameLike($i) && $id[$nx[$i]] === '(') { // f(...)
            $last = $this->matchClose($nx[$i]);
        } elseif ($id[$i] === '$') { // $$a, ${expr}
            $k = $nx[$i];
            while ($id[$k] === '$') {
                $k = $nx[$k];
            }
            $last = $id[$k] === '{' ? $this->matchClose($k) : $k;
        } elseif (($id[$i] === \T_STATIC || $id[$i] === \T_STRING || $id[$i] === \T_NAME_QUALIFIED || $id[$i] === \T_NAME_FULLY_QUALIFIED || $id[$i] === \T_NAME_RELATIVE)
            && $id[$nx[$i]] === \T_DOUBLE_COLON) {
            $last = $i; // A::$p: the link is taken below
        }
        $j = $nx[$last];
        while ($j < $n) {
            $t = $id[$j];
            if ($t === \T_OBJECT_OPERATOR || $t === \T_NULLSAFE_OBJECT_OPERATOR) {
                $k = $nx[$j];
                if ($k >= $n) {
                    break;
                }
                if ($id[$k] === '$') { // ->$$p, ->${expr}
                    while ($id[$k] === '$') {
                        $k = $nx[$k];
                    }
                }
                if ($id[$k] === '{') {
                    $k = $this->matchClose($k);
                }
                $last = $k;
                $j = $nx[$k];
            } elseif ($t === '[' || $t === '{' && $id[$last] === '}' || ($t === '(' && !$newMode)) {
                $last = $this->matchClose($j);
                $j = $nx[$last];
            } elseif ($t === \T_DOUBLE_COLON && ($id[$nx[$j]] === \T_VARIABLE || $id[$nx[$j]] === '$') && ($newMode || $last === $i)) {
                $k = $nx[$j];
                if ($id[$k] === '$') {
                    while ($id[$k] === '$') {
                        $k = $nx[$k];
                    }
                    $k = $id[$k] === '{' ? $this->matchClose($k) : $k;
                }
                $last = $k;
                $j = $nx[$k];
            } else {
                break;
            }
        }

        return $last;
    }

    /** A token that is used as a name: an identifier, static, or any keyword after '->', '::'. */
    private function nameLike(int $i): bool
    {
        $t = $this->id[$i];

        return $t === \T_STRING || $t === \T_NAME_QUALIFIED || $t === \T_NAME_FULLY_QUALIFIED || $t === \T_NAME_RELATIVE || $t === \T_STATIC
            || (\is_int($t) && $this->isMemberName($i) && $t !== \T_VARIABLE);
    }

    /**
     * The first token of the postfix expression (variable, call, dereference chain, parenthesised
     * expression, literal) that ends at $k, or -1 when there is none.
     */
    private function exprStart(int $k): int
    {
        $id = $this->id; // (known starts: a chain $f()()() or $c::m()::m() is walked once)
        $pv = $this->pv;
        $s = $k;
        $call = false;
        while (true) {
            if (isset($this->starts[$s])) {
                return $this->starts[$s];
            }
            $t = $id[$s];
            if ($t === ')' || $t === ']' || $t === '}') {
                $o = $this->matchOpen($s);
                if ($o < 0 || $id[$o] === \T_ATTRIBUTE || $id[$o] === \T_CURLY_OPEN || $id[$o] === \T_DOLLAR_OPEN_CURLY_BRACES) {
                    return -1;
                }
                $p = $pv[$o];
                $pt = $p >= 0 ? $id[$p] : null;
                if ($t === '}') {
                    if ($pt === '$') {
                        $s = $p; // ${expr}
                        continue;
                    }
                    if ($this->isMemberName($o)) {
                        $s = $pv[$pv[$o]]; // ->{expr}
                        continue;
                    }

                    return $this->anonNew($o); // new class {...}, or a block (-1)
                }
                if ($pt === ')' && $this->controlParen($p)) {
                    return $o; // if (...) (expr)
                }
                if ($pt === '}' && ($po = $this->matchOpen($p)) >= 0 && $id[$po] === '{' && !$this->derefBrace($p) && $this->anonNew($po) < 0) {
                    return $o; // {...} (expr)
                }
                if ($pt === \T_VARIABLE || $pt === ')' || $pt === ']' || $pt === '}' || $pt === '"' || $pt === \T_CONSTANT_ENCAPSED_STRING
                    || ($t === ')' && $pt === \T_ARRAY) || ($p >= 0 && $this->nameLike($p) && !($pt === \T_STATIC && !$this->isMemberName($p) && ($pv[$p] < 0 || $id[$pv[$p]] !== \T_NEW)))) {
                    $call = $call || $t === ')';
                    $s = $p; // callee or dereferenced base
                    continue;
                }

                // a parenthesised expression or an array literal; `new (expr)(...)` when called
                return $pt === \T_NEW && $call ? $p : $o;
            }
            if ($t === \T_VARIABLE || $this->nameLike($s)) {
                $p = $pv[$s];
                $pt = $p >= 0 ? $id[$p] : null;
                if ($pt === \T_OBJECT_OPERATOR || $pt === \T_NULLSAFE_OBJECT_OPERATOR || $pt === \T_DOUBLE_COLON) {
                    $s = $pv[$p];
                    continue;
                }
                if ($pt === '$') {
                    $s = $p;
                    continue;
                }
                // after `new`: `new X(...)...` when the walk went through its arguments, else the class
                return $pt === \T_NEW && $call ? $p : $s;
            }
            if ($t === '$') {
                $p = $pv[$s];
                $pt = $p >= 0 ? $id[$p] : null;
                if ($pt === '$') {
                    $s = $p;
                    continue;
                }
                if ($pt === \T_DOUBLE_COLON || $pt === \T_OBJECT_OPERATOR || $pt === \T_NULLSAFE_OBJECT_OPERATOR) {
                    $s = $pv[$p]; // A::$$p, $o->$$p
                    continue;
                }

                return $s;
            }
            if ($t === '"' || $t === '`' || $t === \T_END_HEREDOC) {
                return $this->stringStart($s);
            }
            if ($t === \T_CONSTANT_ENCAPSED_STRING || $t === \T_ARRAY) {
                return $s;
            }

            return -1;
        }
    }

    /** ')' at $p closes the condition of a control structure (if, while, foreach, ...). */
    private function controlParen(int $p): bool
    {
        $o = $this->matchOpen($p);
        $q = $o >= 0 ? $this->pv[$o] : -1;

        return $q >= 0 && isset(self::CONTROL[$this->id[$q]]) && !$this->isMemberName($q);
    }

    /** '}' at $p closes ->{...} or ${...} rather than a block. */
    private function derefBrace(int $p): bool
    {
        $o = $this->matchOpen($p);

        return $o >= 0 && ($this->isMemberName($o) || ($this->pv[$o] >= 0 && $this->id[$this->pv[$o]] === '$'));
    }

    /** The `new` at $o..: the last token of the new-expression `new X(...)`, `new class (...) {...}`. */
    private function newEnd(int $s): int
    {
        $id = $this->id;
        $nx = $this->nx;
        $j = $nx[$s];
        while ($id[$j] === \T_ATTRIBUTE || $id[$j] === \T_READONLY) {
            $j = $id[$j] === \T_ATTRIBUTE ? $nx[$this->matchClose($j)] : $nx[$j];
        }
        if ($id[$j] === \T_CLASS) {
            while ($j < $this->n && $id[$j] !== '{') {
                $j = $id[$j] === '(' ? $nx[$this->matchClose($j)] : $nx[$j];
            }

            return $this->matchClose($j);
        }
        $e = $this->chainEnd($j, true);

        return $id[$nx[$e]] === '(' ? $this->matchClose($nx[$e]) : $e;
    }

    /** The `new` of an anonymous class whose body opens at $o, or -1 (a block). */
    private function anonNew(int $o): int
    {
        $id = $this->id;
        $pv = $this->pv;
        for ($j = $pv[$o]; $j >= 0; $j = $pv[$j]) {
            $t = $id[$j];
            if ($t === \T_CLASS) {
                for ($p = $pv[$j]; $p >= 0 && ($id[$p] === \T_READONLY || ($id[$p] === ']' && $this->matchOpen($p) >= 0 && $id[$this->matchOpen($p)] === \T_ATTRIBUTE)); $p = $pv[$id[$p] === ']' ? $this->matchOpen($p) : $p]);

                return $p >= 0 && $id[$p] === \T_NEW ? $p : -1;
            }
            if ($t === ')') {
                $j = $this->matchOpen($j);
            } elseif ($t !== \T_STRING && $t !== \T_NAME_QUALIFIED && $t !== \T_NAME_FULLY_QUALIFIED && $t !== \T_NAME_RELATIVE
                && $t !== ',' && $t !== \T_EXTENDS && $t !== \T_IMPLEMENTS) {
                return -1;
            }
            if ($j < 0) {
                return -1;
            }
        }

        return -1;
    }

    /**
     * The class expression in front of the `::` at $i is computed at run time ($x::, $o->p::, f()::,
     * (expr)::, A::$p::, A::C::, $$n::): wrap it in Runtime::cls(); a string literal is mapped.
     */
    private function dynamicClass(int $i, bool $wrap): void
    {
        $id = $this->id;
        $k = $this->pv[$i];
        if ($k < 0 || isset($this->chained[$i])) {
            return;
        }
        if ($id[$k] === \T_VARIABLE && $this->pv[$k] >= 0 && $id[$this->pv[$k]] === \T_DOUBLE_COLON
            && \strcasecmp($this->tx[$this->pv[$this->pv[$k]]], 'parent') === 0 && $id[$this->nx[$this->nx[$i]]] === '('
            && \in_array(\strtolower($this->tx[$this->nx[$i]]), ['get', 'set'], true)) {
            return; // parent::$prop::get(): the parent's property hook
        }
        $before = $this->pv[$k] >= 0 ? $id[$this->pv[$k]] : null;
        if ($this->nameLike($k) && !$this->isMemberName($k) && $before !== '$') {
            return; // a class name (resolved statically) or static/self/parent
        }
        if ($id[$k] === \T_CONSTANT_ENCAPSED_STRING && !$this->isMemberName($k)) {
            $v = self::literal($this->tx[$k]);
            $r = $this->babel->mapClass($v);
            if ($r !== $v) {
                $this->edit[$k] = self::quote($r, $this->tx[$k]);
            }

            return;
        }
        if (!$wrap) {
            return; // a constant expression, or no run time: only literals can be mapped
        }
        $s = $this->exprStart($k);
        if ($s < 0 || $this->startsRuntime($s)) {
            return;
        }
        if ($id[$s] === \T_NEW && $this->newEnd($s) === $k) {
            return; // new X(...)::m(): an object
        }
        if ($id[$s] !== \T_NEW && ($this->pv[$s] < 0 || $id[$this->pv[$s]] !== \T_NEW)) {
            $m = $this->nx[$i];
            $this->starts[$id[$m] === \T_VARIABLE ? $m : ($id[$this->nx[$m]] === '(' ? $this->matchClose($this->nx[$m]) : $m)] = $s;
        }
        if ($this->nullsafeChain($i, $s, $k)) {
            return;
        }
        $this->wrapCls($s, $k);
    }

    /**
     * `$a?->b::m()` short-circuits to null when $a is null: the rest of the chain is skipped, also
     * through parentheses, and its arguments are not evaluated. The chain is rewritten once, with a
     * guard per nullsafe link, so every computed class in it is mapped and the semantics stay exact:
     * `Runtime::v([&$t0], ($t0 = $a) === null ? null : Runtime::cls($t0->b)::m())` (v() clears the
     * temporaries, so they hold no object longer than PHP would, and returns the value).
     *
     * @return bool the `::` at $i is handled
     */
    private function nullsafeChain(int $i, int $s, int $k): bool
    {
        $id = $this->id;
        $nx = $this->nx;
        $pv = $this->pv;
        if (!$this->chainLink($nx[$i])) {
            return false; // `$a?->b::X` and `::class` end the chain: PHP throws on null
        }
        if ($this->nullsafe === null) {
            $count = 0;
            $this->nullsafe = [];
            for ($j = 0; $j <= $this->n; ++$j) {
                $this->nullsafe[$j] = $count;
                $count += (int) ($id[$j] === \T_NULLSAFE_OBJECT_OPERATOR);
            }
        }
        if ($this->nullsafe[$k] === $this->nullsafe[$s]) {
            return false; // no `?->` at all in front of this `::`
        }
        // parentheses around the base of a chain do not end it: (($a?->b))::m()
        $a = $s;
        $peel = [];
        while ($id[$a] === '(' && $id[$nx[$a]] !== \T_NEW) {
            $c = $this->matchClose($a);
            if ($c > $k || $this->exprStart($pv[$c]) !== $nx[$a] || !($this->linkAfter($nx[$c]) || \in_array($nx[$c], $peel, true))) {
                break;
            }
            $peel[$a] = $c;
            $a = $nx[$a];
        }
        $top = $s;
        $closes = \array_flip($peel);
        $qs = $colons = [];
        $lastCall = -1;
        $e = $pv[$this->n];
        for ($j = $a; $j < $this->n; $j = $nx[$j]) {
            $t = $id[$j];
            if (isset($closes[$j])) {
                continue;
            }
            if ($t === \T_NULLSAFE_OBJECT_OPERATOR) {
                $qs[] = $j;
            } elseif ($t === \T_DOUBLE_COLON) {
                if (!$this->chainLink($nx[$j])) {
                    if ($j > $k) {
                        $e = $pv[$j];
                        break;
                    }
                    $qs = $colons = []; // `$a?->b::C` ends a chain: what follows applies to a value
                } elseif ($qs) {
                    $colons[] = [$j, \count($qs) - 1];
                }
            } elseif ($t === '(') {
                if ($j !== $a && !$this->memberCall($pv[$j])) { // calling a computed callee ends a chain
                    if ($j > $k) {
                        $e = $pv[$j];
                        break;
                    }
                    $qs = $colons = [];
                }
                $lastCall = $j;
                $j = $this->matchClose($j);
            } elseif ($t === '[' || $t === '{') {
                $j = $this->matchClose($j);
            } elseif ($t === '"' || $t === 'b"' || $t === '`' || $t === \T_START_HEREDOC) {
                $j = $this->stringEnd($j);
            } elseif ($t === ')' && $j > $k && $pv[$top] >= 0 && $this->pair[$j] === $pv[$top] && $this->grouping($pv[$top]) && $this->linkAfter($nx[$j])) {
                $peel[$pv[$top]] = $j; // ($a?->b::m())->c: the chain goes on through the parentheses
                $top = $pv[$top];
            } elseif ($j > $k && $t !== \T_OBJECT_OPERATOR && $t !== \T_VARIABLE && $t !== '$' && !(\is_int($t) && $this->isMemberName($j))) {
                $e = $pv[$j];
                break;
            }
        }
        if (!$colons || $colons[0][0] > $i) {
            return false; // no nullsafe link in front of this `::`
        }
        foreach ($peel as $po => $pc) {
            if ($po >= $s && !\array_filter($qs, static fn (int $q): bool => $q > $po && $q < $pc)) {
                unset($peel[$po]); // (base)::$p?->c: these parentheses hold no link, they stay
                if ($po === $s || isset($peel[$pv[$po]])) {
                    $a = $po;
                }
            }
        }
        // the parentheses the whole chain sits in, and what comes before and after it
        [$o, $c] = [$top, $e];
        while ($pv[$o] >= 0 && $id[$pv[$o]] === '(' && $this->matchClose($pv[$o]) === $nx[$c] && $this->grouping($pv[$o])) {
            [$o, $c] = [$pv[$o], $nx[$c]];
        }
        $before = $pv[$o];
        $after = $nx[$c];
        $outer = $before >= 0 && $id[$before] === ',' ? $this->enclosingOpen($o) : $before;
        if ($outer >= 0 && $id[$outer] === '(' && $pv[$outer] >= 0 && \in_array($id[$pv[$outer]], [\T_ISSET, \T_EMPTY, \T_UNSET], true)
            && ($id[$after] === ')' || $id[$after] === ',')) {
            return true; // isset($a?->b::$p): no expression allowed there, left as it is
        }
        // `$a?->b::$p ?? $x` reads every link after the last call as isset() does
        $isset = $id[$after] === \T_COALESCE && ($before < 0 || isset(self::BELOW_COALESCE[$id[$before]]));
        $iss = static fn (int $end): string => $isset && $end > $lastCall ? ' ?? null' : '';
        foreach ($peel as $po => $pc) {
            $this->edit[$po] = $this->edit[$pc] = '';
        }
        $v = fn (int $n): string => '$__phasync_babel_' . $this->uid . '_' . $i . '_' . $n;
        $refs = [];
        foreach ($qs as $n => $q) {
            $refs[] = '&' . $v($n);
        }
        // the value goes last: it stays the last node compiled (the line of an eval around it)
        $this->wrap($top, $e, ($this->interpolation($top) === 'globals' ? "\$GLOBALS['__phasync_babel_v'](" : self::RT . 'v(') . '[' . \implode(', ', $refs) . '], ', ')');
        $this->wrap($a, $pv[$qs[0]], '(' . $v(0) . ' = ', $iss($pv[$qs[0]]) . ')');
        $cls = [];
        foreach ($colons as [$cc, $seg]) {
            $cls[$seg] = ($cls[$seg] ?? '') . self::RT . 'cls(';
            $this->wrap($nx[$qs[$seg]], $pv[$cc], '', ')');
            $this->chained[$cc] = true;
        }
        $last = \count($qs) - 1;
        foreach ($qs as $n => $q) {
            if ($n < $last) {
                $this->edit[$q] = ' === null ? null : ((' . $v($n + 1) . ' = ' . ($cls[$n] ?? '') . $v($n) . '->';
                $this->wrap($nx[$q], $pv[$qs[$n + 1]], '', $iss($pv[$qs[$n + 1]]) . ')');
                $this->wrap($nx[$q], $e, '', ')');
            } else {
                $this->edit[$q] = ' === null ? null : ' . ($cls[$n] ?? '') . $v($n) . '->';
                if ($iss($e) !== '') {
                    $this->wrap($nx[$q], $e, '', ' ?? null');
                }
            }
        }

        return true;
    }

    /** The token at $j continues a chain: `->`, `?->`, `[`, or a `::` link of a nullsafe chain. */
    private function linkAfter(int $j): bool
    {
        $t = $this->id[$j];

        return $t === \T_OBJECT_OPERATOR || $t === \T_NULLSAFE_OBJECT_OPERATOR || $t === '['
            || ($t === \T_DOUBLE_COLON && $this->chainLink($this->nx[$j]));
    }

    /** The '(' at $o groups an expression (it is no argument list, condition or construct). */
    private function grouping(int $o): bool
    {
        $p = $this->pv[$o];
        if ($p < 0) {
            return true;
        }
        $t = $this->id[$p];

        return !$this->nameLike($p) && !isset(self::CONTROL[$t]) && !\in_array($t, [\T_VARIABLE, ')', ']', '}', '$', \T_ARRAY, \T_ISSET,
            \T_EMPTY, \T_UNSET, \T_LIST, \T_EVAL, \T_EXIT, \T_DECLARE, \T_FN, \T_FUNCTION, \T_USE, \T_CLASS, \T_NEW, '"', \T_CONSTANT_ENCAPSED_STRING], true);
    }

    /** The token after a `::` at $m continues a nullsafe chain: `::$p`, `::$$p`, `::m()`, `::{expr}()`. */
    private function chainLink(int $m): bool
    {
        $t = $this->id[$m];
        if ($t === \T_VARIABLE || $t === '$') {
            return true;
        }
        if ($t === '{') {
            return $this->id[$this->nx[$this->matchClose($m)]] === '(';
        }

        return \is_int($t) && $t !== \T_CLASS && $this->id[$this->nx[$m]] === '(';
    }

    /** The token before a '(' at $p names a method: `->m(`, `::m(`, `->$m(`, `::$$m(`, `->{expr}(`. */
    private function memberCall(int $p): bool
    {
        $t = $this->id[$p];
        if ($t === \T_VARIABLE || $t === '}') {
            return $this->isMemberName($this->varStart($p));
        }

        return \is_int($t) && $this->isMemberName($p);
    }

    /** The first token of the variable (or `{expr}` member name) ending at $p: `$$x`, `${expr}`, `{expr}`. */
    private function varStart(int $p): int
    {
        if ($this->id[$p] === '}') {
            $p = $this->matchOpen($p);
            if ($p < 0) {
                return 0;
            }
        }
        while ($this->pv[$p] >= 0 && $this->id[$this->pv[$p]] === '$') {
            $p = $this->pv[$p];
        }

        return $p;
    }

    /** The token closing the string literal opened at $o ('"', 'b"', '`' or a heredoc start). */
    private function stringEnd(int $o): int
    {
        $id = $this->id;
        $end = $id[$o] === \T_START_HEREDOC ? \T_END_HEREDOC : ($id[$o] === '`' ? '`' : '"');
        for ($j = $o + 1; $j < $this->n; ++$j) {
            if ($id[$j] === \T_CURLY_OPEN || $id[$j] === \T_DOLLAR_OPEN_CURLY_BRACES) {
                $j = $this->matchClose($j);
            } elseif ($id[$j] === $end) {
                return $j;
            }
        }

        return $this->n - 1;
    }

    /** The token opening the string literal closed at $c ('"', '`' or a heredoc end). */
    private function stringStart(int $c): int
    {
        $id = $this->id;
        $t = $id[$c];
        for ($j = $c - 1; $j >= 0; --$j) {
            if ($id[$j] === '}') {
                $j = $this->matchOpen($j);
                if ($j < 0) {
                    return -1;
                }
            } elseif ($t === \T_END_HEREDOC ? $id[$j] === \T_START_HEREDOC : ($id[$j] === $t || ($t === '"' && $id[$j] === 'b"'))) {
                return $j;
            }
        }

        return -1;
    }

    /** The innermost unclosed bracket around token $s, or -1. */
    private function enclosingOpen(int $s): int
    {
        if ($this->up === null) {
            $id = $this->id;
            $up = \array_fill(0, $this->n + 1, -1);
            $open = [];
            for ($j = 0; $j < $this->n; ++$j) {
                $up[$j] = $open ? $open[\count($open) - 1] : -1;
                $t = $id[$j];
                if ($t === '(' || $t === '[' || $t === '{' || $t === \T_CURLY_OPEN || $t === \T_DOLLAR_OPEN_CURLY_BRACES || $t === \T_ATTRIBUTE) {
                    $open[] = $j;
                } elseif (($t === ')' || $t === ']' || $t === '}') && $open) {
                    \array_pop($open);
                }
            }
            $this->up = $up;
        }

        return $this->up[$s];
    }

    /**
     * The '(' at $i calls a computed callee ($f(), $a['k'](), ($f)(), f()(), [$o, 'm'](), "f"(),
     * $$f(), A::$fns['k']()): wrap the callee in Runtime::fn().
     */
    private function dynamicCall(int $i, \Closure $constExpr): void
    {
        $id = $this->id;
        $k = $this->pv[$i];
        $t = $id[$k];
        if ($t === \T_VARIABLE) {
            if ($this->isMemberName($this->varStart($k))) {
                return; // $o->$m() / A::$$m(): a method call
            }
        } elseif ($t === ')' || $t === ']') {
            $o = $this->matchOpen($k);
            if ($o < 0 || $id[$o] === \T_ATTRIBUTE) {
                return;
            }
            if ($t === ')') {
                $q = $this->pv[$o];
                if ($q >= 0 && !$this->isMemberName($q) && (isset(self::CONTROL[$id[$q]]) || $id[$q] === \T_FUNCTION || $id[$q] === \T_FN
                    || $id[$q] === \T_USE || $id[$q] === \T_ISSET || $id[$q] === \T_EMPTY || $id[$q] === \T_LIST || $id[$q] === \T_EVAL || $id[$q] === \T_EXIT
                    || $id[$q] === \T_DECLARE || ($id[$q] === \T_STRING && $this->pv[$q] >= 0 && ($id[$this->pv[$q]] === \T_FUNCTION || $id[$this->pv[$q]] === \T_FN)))) {
                    return; // a control structure, a declaration or a language construct
                }
            }
        } elseif ($t === '}') {
            $o = $this->matchOpen($k);
            if ($o < 0 || $this->pv[$o] < 0 || $id[$this->pv[$o]] !== '$' || $this->isMemberName($this->varStart($k))) {
                return; // ->{..}() and A::${..}() are method calls; new class {...}() an object; a block no callee
            }
        } elseif ($t !== '"') {
            return;
        }
        $s = $this->exprStart($k);
        if ($s < 0 || $this->startsRuntime($s) || $constExpr()) {
            return;
        }
        if (($id[$s] === \T_NEW && $this->newEnd($s) === $k) || ($this->pv[$s] >= 0 && $id[$this->pv[$s]] === \T_NEW)) {
            return; // new X()(): an invokable object; new $c(...), new (expr)(...): constructor arguments
        }
        if ($id[$s] !== \T_NEW) {
            $this->starts[$this->matchClose($i)] = $s;
        }
        if ($this->interpolation($s) === 'globals') {
            $this->wrap($s, $k, "\$GLOBALS['__phasync_babel_fn'](", ')');
        } else {
            $this->wrap($s, $k, self::RT . 'fn(', ')');
        }
    }

    /** The right operand of `|>` at $i is called: map it like a computed callee. */
    private function pipeOperand(int $i): void
    {
        $id = $this->id;
        $nx = $this->nx;
        $j = $nx[$i];
        $e = $this->operandEnd($j);
        // only an operand that ends where the pipe's own operand ends (an operator of lower precedence follows)
        if ($e < 0 || !isset(self::PIPE_END[$id[$nx[$e]]])) {
            return;
        }
        if ($e === $j && $id[$j] === \T_CONSTANT_ENCAPSED_STRING) {
            $v = self::literal($this->tx[$j]);
            $r = $this->babel->mapCallable($v);
            if ($r !== $v) {
                $this->edit[$j] = self::quote($r, $this->tx[$j]);
            }

            return;
        }
        $f = $id[$j] === '(' ? $nx[$j] : $j;
        if (($id[$e] === ')' && $id[$this->pv[$e]] === \T_ELLIPSIS && $this->pv[$this->pv[$e]] === $this->matchOpen($e))
            || $id[$f] === \T_FN || $id[$f] === \T_FUNCTION || ($id[$f] === \T_STATIC && ($id[$nx[$f]] === \T_FN || $id[$nx[$f]] === \T_FUNCTION))
            || ($id[$j] === \T_NEW && $e === $this->newEnd($j)) || $this->startsRuntime($j)) {
            return; // a first-class callable, a closure or a new object
        }
        $this->wrap($j, $e, self::RT . 'fn(', ')');
    }

    /** The last token of the postfix expression (with its calls, member and static accesses) starting at $j, or -1. */
    private function operandEnd(int $j): int
    {
        $id = $this->id;
        $nx = $this->nx;
        $t = $id[$j];
        if ($t === '@') {
            return $this->operandEnd($nx[$j]); // @$f
        }
        if ($t === \T_VARIABLE) {
            $e = $j;
        } elseif ($t === '$') {
            for ($e = $j; $id[$e] === '$'; $e = $nx[$e]);
            if ($id[$e] === '{') {
                $e = $this->matchClose($e);
            }
        } elseif ($t === '(' || $t === '[') {
            $e = $this->matchClose($j);
        } elseif (($t === \T_ARRAY || $t === \T_LIST) && $id[$nx[$j]] === '(') {
            $e = $this->matchClose($nx[$j]);
        } elseif ($t === \T_CONSTANT_ENCAPSED_STRING || $this->nameLike($j)) {
            $e = $j;
        } elseif ($t === '"' || $t === 'b"' || $t === \T_START_HEREDOC) {
            $e = $this->stringEnd($j);
        } elseif ($t === \T_NEW) {
            $e = $this->newEnd($j);
        } elseif ($t === \T_MATCH && $id[$nx[$j]] === '(') {
            $e = $this->matchClose($nx[$this->matchClose($nx[$j])]);
        } else {
            return -1;
        }
        while (true) {
            $k = $nx[$e];
            $t = $id[$k];
            if ($t === \T_OBJECT_OPERATOR || $t === \T_NULLSAFE_OBJECT_OPERATOR || $t === \T_DOUBLE_COLON) {
                $m = $nx[$k];
                while ($id[$m] === '$') {
                    $m = $nx[$m];
                }
                if ($id[$m] === '{') {
                    $m = $this->matchClose($m);
                } elseif (!\is_int($id[$m])) {
                    return -1;
                }
                $e = $m;
            } elseif ($t === '[' || $t === '(') {
                $e = $this->matchClose($k);
            } else {
                return $e;
            }
        }
    }

    /** eval(EXPR) becomes eval(Runtime::evalCode('<origin of this eval site>', EXPR)). */
    private function evalSite(int $i): void
    {
        $id = $this->id;
        $j = $this->nx[$i];
        if ($id[$j] !== '(' || $this->startsRuntime($this->nx[$j])) {
            return;
        }
        $k = $this->matchClose($j);
        if ($k >= $this->n - 1 && $id[$k] !== ')') {
            return;
        }
        // The origin goes first: PHP takes the line of the translated eval from the last argument,
        // so that argument must stay the original expression to keep the line.
        $line = $this->evalLine($j, $k);
        $this->edit[$j] = '(' . self::RT . 'evalCode(' . self::quote($this->origin . '(' . $line . ") : eval()'d code") . ', ';
        $this->pre[$k] = ')' . ($this->pre[$k] ?? '');
    }

    /**
     * include/include_once/require/require_once EXPR (with or without parentheses around EXPR;
     * EXPR may be any expression, since PHP's own grammar gives these constructs a full `expr` as
     * their operand) becomes `include $includeHandler(EXPR, '<this unit's original directory>')`.
     */
    private function includeSite(int $i): void
    {
        $s = $this->nx[$i];
        if ($this->startsIncludeHandler($s)) {
            return; // already translated (no marker: an eval'd closure, say): changing it again would double-wrap
        }
        $e = $this->includeOperandEnd($s);
        if ($e < $s) {
            return; // nothing follows (malformed source): leave it alone
        }
        $this->wrap($s, $e, '\\' . $this->babel->includeHandler . '(', ', ' . self::quote($this->originDir()) . ')');
    }

    /** Whether the expression at $s (skipping any of the user's own leading parens) is already a call to the include handler. */
    private function startsIncludeHandler(int $s): bool
    {
        $id = $this->id;
        while ($id[$s] === '(') {
            $s = $this->nx[$s];
        }

        return $id[$s] === \T_NAME_FULLY_QUALIFIED && 0 === \strcasecmp($this->tx[$s], '\\' . $this->babel->includeHandler)
            && $this->id[$this->nx[$s]] === '(';
    }

    /**
     * The last token of the expression starting at $s: the one just before whatever is not part
     * of it (a ';', a ',' or closing bracket belonging to something opened before $s, the ':' of
     * a ternary opened before $s, '?>', or EOF). A bracket opened at or after $s is skipped as a
     * whole via $this->pair, so nothing seen at this level ever belongs to us: every stop
     * condition here does end the expression.
     *
     * A bare '?' (ternary; never '??', '?->' or '?:' with nothing missing -- those are their own
     * token, or a '?' immediately followed by ':') opened at or after $s is tracked the same way:
     * `require $f ? 'a' : 'b'` is one expression (require's own operand reaches past its matching
     * ':', as PHP's grammar gives it everything a `require $x ? $y : $z` construct needs -- an
     * include/require that itself *starts* a ternary absorbs all of it, confirmed against real
     * PHP), but `$cond ? require $f : 'b'` must stop right before that ':': it belongs to a
     * ternary that opened *before* $s, which require has no claim on (also confirmed: PHP's own
     * parser ends require's operand there, unlike the lower-precedence 'or'/'and', '.', '??' and
     * '?:', which it does absorb -- so only ':' needs this counter, not every low-precedence
     * operator).
     */
    private function includeOperandEnd(int $s): int
    {
        $id = $this->id;
        $nx = $this->nx;
        $pair = $this->pair;
        $j = $s;
        $last = $s - 1;
        $ternary = 0;
        while (true) {
            $t = $id[$j];
            if (null === $t || ';' === $t || ',' === $t || ')' === $t || ']' === $t || '}' === $t || \T_CLOSE_TAG === $t) {
                return $last;
            }
            if ('(' === $t || '[' === $t || '{' === $t || \T_CURLY_OPEN === $t || \T_DOLLAR_OPEN_CURLY_BRACES === $t || \T_ATTRIBUTE === $t) {
                $c = $pair[$j] ?? -1;
                if ($c < 0) {
                    return $this->n - 1;
                }
                $last = $c;
                $j = $nx[$c];
                continue;
            }
            if (':' === $t) {
                if ($ternary <= 0) {
                    return $last; // an enclosing ternary's ':': not ours to take
                }
                --$ternary;
            } elseif ('?' === $t) {
                ++$ternary;
            }
            $last = $j;
            $j = $nx[$j];
        }
    }

    /** This unit's original directory: the file's own, or the file that contains this eval site. */
    private function originDir(): string
    {
        $origin = $this->isEval ? \preg_replace('/\(\d+\) : eval\(\)\'d code$/', '', $this->origin) : $this->origin;

        return \dirname($origin);
    }

    /** The bracket closing the one at $open (the last token when it is never closed). */
    private function matchClose(int $open): int
    {
        $c = $this->pair[$open] ?? -1;

        return $c >= 0 ? $c : $this->n - 1;
    }

    /** The bracket opening the one closed at $close, or -1. */
    private function matchOpen(int $close): int
    {
        return $this->pair[$close] ?? -1;
    }

    /** The value of a T_CONSTANT_ENCAPSED_STRING token. */
    private static function literal(string $tok): string
    {
        if ($tok[0] === 'b' || $tok[0] === 'B') {
            $tok = \substr($tok, 1);
        }
        if ($tok[0] === "'") {
            return \str_replace(['\\\\', "\\'"], ['\\', "'"], \substr($tok, 1, -1));
        }
        if (\strpos($tok, '\\') === false) {
            return \substr($tok, 1, -1);
        }

        // a constant double quoted string: only escapes to decode
        return \preg_replace_callback('/\\\\(?:([nrtvef\\\\$"])|([0-7]{1,3})|x([0-9A-Fa-f]{1,2})|u\{([0-9A-Fa-f]+)\})/', static function (array $m): string {
            if (($m[1] ?? '') !== '') {
                return ['n' => "\n", 'r' => "\r", 't' => "\t", 'v' => "\v", 'e' => "\e", 'f' => "\f"][$m[1]] ?? $m[1];
            }
            if (($m[2] ?? '') !== '') {
                return \chr(\octdec($m[2]) & 255);
            }
            if (($m[3] ?? '') !== '') {
                return \chr(\hexdec($m[3]));
            }
            $c = \hexdec($m[4]);
            if ($c < 0x80) {
                return \chr($c);
            }
            if ($c < 0x800) {
                return \chr(0xC0 | $c >> 6) . \chr(0x80 | $c & 0x3F);
            }
            if ($c < 0x10000) {
                return \chr(0xE0 | $c >> 12) . \chr(0x80 | $c >> 6 & 0x3F) . \chr(0x80 | $c & 0x3F);
            }

            return $c > 0x10FFFF ? $m[0] : \chr(0xF0 | $c >> 18) . \chr(0x80 | $c >> 12 & 0x3F) . \chr(0x80 | $c >> 6 & 0x3F) . \chr(0x80 | $c & 0x3F);
        }, \substr($tok, 1, -1));
    }

    /**
     * A PHP string literal for $s with as many raw line breaks as $orig (the token it replaces) has,
     * so line numbers do not change; further line breaks are written as escapes.
     */
    private static function quote(string $s, string $orig = ''): string
    {
        $raw = $orig === '' ? 0 : \preg_match_all('/\r\n|\r|\n/', $orig);
        $out = '';
        foreach (\preg_split('/(\r\n|\r|\n)/', $s, -1, \PREG_SPLIT_DELIM_CAPTURE) as $n => $part) {
            if ($n % 2 === 0) {
                $out .= \str_replace(['\\', "'"], ['\\\\', "\\'"], $part);
            } elseif ($raw-- > 0) {
                $out .= $part;
            } else {
                $out .= "' . \"" . \str_replace(["\r", "\n"], ['\\r', '\\n'], $part) . "\" . '";
            }
        }

        return "'" . $out . "'";
    }

    /** Rewrites the class reference at token $i if it resolves to a mapped class; returns the resolved key. */
    private function classRef(int $i, string $nsl, array $clsImp): ?string
    {
        $t = $this->id[$i];
        $text = $this->tx[$i];
        if ($t === \T_NAME_FULLY_QUALIFIED) {
            $key = \strtolower(\substr($text, 1));
        } elseif ($t === \T_NAME_RELATIVE) {
            $key = ($nsl === '' ? '' : $nsl . '\\') . \strtolower(\substr($text, 10));
        } elseif ($t === \T_NAME_QUALIFIED) {
            $q = \strpos($text, '\\');
            $first = \strtolower(\substr($text, 0, $q));
            $key = isset($clsImp[$first])
                ? \strtolower($clsImp[$first] . \substr($text, $q))
                : ($nsl === '' ? '' : $nsl . '\\') . \strtolower($text);
        } else {
            $lt = \strtolower($text);
            if (isset(self::SPECIAL[$lt])) {
                return null;
            }
            $key = isset($clsImp[$lt]) ? \strtolower($clsImp[$lt]) : ($nsl === '' ? '' : $nsl . '\\') . $lt;
        }
        if (isset($this->cls[$key])) {
            $this->edit[$i] = '\\' . $this->cls[$key];
        }

        return $key;
    }

    private function evalLine(int $j, int $k): int
    {
        $id = $this->id;
        $nx = $this->nx;

        return $nx[$j] < $k ? $this->exprLine($id, $this->tx, $this->ln, $nx, $this->pv, $nx[$j], $this->pv[$k])[1] : $this->ln[$k];
    }

    /**
     * The line PHP reports in "<file>(LINE) : eval()'d code" is the line CG(zend_lineno) holds when the
     * compiler emits the eval opcode, that is the start line of the last AST node compiled for the
     * argument, which is the argument's last leaf token (not the line of `eval` or of the closing
     * paren), with these exceptions:
     * - `$var = rhs` (a plain variable, `$$v`, `${..}` or `$GLOBALS[..]`) ends on the line of $var,
     *   `lhs ??= rhs` on the last leaf of lhs; other assignments end in their rhs;
     * - a concatenation of literals is folded by the parser when it reads the token after it, so
     *   its line is that token's line (a literal concatenated with a non-literal is not folded);
     * - the last leaf of a call, array or index is its last argument or element; with no arguments
     *   it is the method name, else the start of the callee (a called closure: the line of its `}`
     *   or, for fn, of the `)`); `new class(..) {..}` uses its last argument or the `class` line;
     * - `->{expr}` and `${expr}` use expr, a backtick string its opening backtick, a bare `yield`
     *   the token after it.
     *
     * @return array{bool,int} [the tokens $a..$b are one folded literal, the line PHP assigns to them]
     */
    private function exprLine(array $id, array $tx, array $ln, array $nx, array $pv, int $a, int $b): array
    {
        static $operand = [
            \T_VARIABLE => 1, \T_STRING => 1, \T_NAME_QUALIFIED => 1, \T_NAME_FULLY_QUALIFIED => 1, \T_NAME_RELATIVE => 1,
            \T_LNUMBER => 1, \T_DNUMBER => 1, \T_CONSTANT_ENCAPSED_STRING => 1, \T_OBJECT_OPERATOR => 1,
            \T_NULLSAFE_OBJECT_OPERATOR => 1, \T_DOUBLE_COLON => 1, \T_STATIC => 1, \T_NS_SEPARATOR => 1, \T_LINE => 1,
            \T_FILE => 1, \T_DIR => 1, \T_CLASS => 1, '$' => 1, \T_ARRAY => 1, \T_FUNCTION => 1, \T_FN => 1, \T_USE => 1,
            \T_MATCH => 1, \T_NUM_STRING => 1, \T_ENCAPSED_AND_WHITESPACE => 1, \T_START_HEREDOC => 1, \T_END_HEREDOC => 1,
            '"' => 1, '`' => 1, \T_CURLY_OPEN => 1, \T_DOLLAR_OPEN_CURLY_BRACES => 1, \T_EXTENDS => 1, \T_IMPLEMENTS => 1,
        ];
        // Operators that bind tighter than '.', so a literal next to them is not a folded operand.
        static $tight = [
            \T_INT_CAST => 1, \T_DOUBLE_CAST => 1, \T_STRING_CAST => 1, \T_ARRAY_CAST => 1, \T_OBJECT_CAST => 1, \T_BOOL_CAST => 1,
            '@' => 1, '!' => 1, '~' => 1, '-' => 1, '+' => 1, '*' => 1, '/' => 1, '%' => 1, \T_POW => 1, \T_INSTANCEOF => 1,
            \T_INC => 1, \T_DEC => 1,
        ];
        if ($id[$b] === ',' && $b > $a) {
            $b = $pv[$b]; // trailing comma
        }
        $ops = $asg = [];
        $oe = $b;
        $start = $a;
        $depth = $tern = 0;
        $quote = $cut = $isTight = false;
        for ($t = $b; $t >= $a; $t = $pv[$t]) {
            $x = $id[$t];
            if ($x === \T_END_HEREDOC) {
                $quote = true;
            } elseif ($x === \T_START_HEREDOC) {
                $quote = false;
            } elseif ($x === '"' || $x === '`') {
                $quote = !$quote;
            } elseif ($quote) {
                continue;
            } elseif ($x === ')' || $x === ']' || $x === '}') {
                ++$depth;
            } elseif ($x === '(' || $x === '[' || $x === '{' || $x === \T_ATTRIBUTE) {
                --$depth;
            } elseif ($depth === 0) {
                if ($x === ',' || $x === \T_DOUBLE_ARROW || $x === \T_LOGICAL_AND || $x === \T_LOGICAL_OR || $x === \T_LOGICAL_XOR) {
                    $cut || $start = $nx[$t];
                    break;
                }
                if ($x === ':') {
                    ++$tern;
                } elseif ($x === '?') {
                    --$tern;
                } elseif ($tern === 0 && ($x === '=' || $x === \T_COALESCE_EQUAL)) {
                    $asg[] = $t; // an assignment whose rhs runs to $b
                }
                if ($cut) {
                    continue;
                }
                if ($x === '.') {
                    $ops[] = [$nx[$t], $oe];
                    $oe = $pv[$t];
                } elseif (!isset($operand[$x])) {
                    $start = $nx[$t];
                    $cut = true;
                    $isTight = isset($tight[$x]);
                }
            }
        }
        if ($start > $b) {
            return [false, $ln[$start]]; // nothing after the operator (bare yield): the next token
        }
        // The outermost assignment that resets the line wins; =&, compound and non-variable ones do not.
        for ($q = \count($asg) - 1; $q >= 0; --$q) {
            $t = $asg[$q];
            $e = $pv[$t];
            for ($s = $u = $e; $u >= $a; $u = $pv[$u]) {
                if ($id[$u] === ')' || $id[$u] === ']' || $id[$u] === '}') {
                    $u = $this->opener($id, $pv, $u);
                } elseif (!isset($operand[$id[$u]])) {
                    break;
                }
                $s = $u;
            }
            if ($id[$t] === \T_COALESCE_EQUAL) {
                return [false, $this->exprLine($id, $tx, $ln, $nx, $pv, $s, $e)[1]];
            }
            if ($id[$nx[$t]] !== '&' && $id[$nx[$t]] !== \T_AMPERSAND_FOLLOWED_BY_VAR_OR_VARARG && $id[$nx[$t]] !== \T_AMPERSAND_NOT_FOLLOWED_BY_VAR_OR_VARARG && ($s === $e && $id[$s] === \T_VARIABLE || $id[$s] === '$' && ($nx[$s] === $e || $id[$e] === '}')
                || $tx[$s] === '$GLOBALS' && $id[$nx[$s]] === '[' && $this->opener($id, $pv, $e) === $nx[$s])) {
                return [false, $ln[$s]];
            }
        }
        $ops[] = [$start, $oe];
        $const = false;
        $line = 0;
        for ($n = \count($ops) - 1; $n >= 0; --$n) {
            [$os, $oe] = $ops[$n];
            [$c, $l] = $this->operandLine($id, $tx, $ln, $nx, $pv, $os, $oe);
            if ($n === \count($ops) - 1) {
                $c = $c && !$isTight;
            } elseif ($const && $c) {
                $l = $ln[$nx[$oe]];
            } else {
                $c = false;
            }
            $const = $c;
            $line = $l;
        }

        return [$const && !$cut, $line];
    }

    /** @return array{bool,int} like exprLine(), for one operand $os..$oe (no top level '.') */
    private function operandLine(array $id, array $tx, array $ln, array $nx, array $pv, int $os, int $oe): array
    {
        static $member = [\T_OBJECT_OPERATOR => 1, \T_NULLSAFE_OBJECT_OPERATOR => 1, \T_DOUBLE_COLON => 1];
        $last = $id[$oe];
        if ($os === $oe) {
            return [$last === \T_CONSTANT_ENCAPSED_STRING || $last === \T_LNUMBER || $last === \T_DNUMBER, $ln[$os]];
        }
        if ($id[$os] === \T_CLASS) { // new class(...) {...}: the last argument, else the class keyword
            $p = $nx[$os];
            if ($id[$p] === '(') {
                for ($q = $nx[$p], $d = 1; $id[$q] !== ')' || --$d > 0; $q = $nx[$q]) {
                    $id[$q] === '(' && ++$d;
                }
                if ($nx[$p] !== $q) {
                    return [false, $this->exprLine($id, $tx, $ln, $nx, $pv, $nx[$p], $pv[$q])[1]];
                }
            }

            return [false, $ln[$os]];
        }
        if ($last === \T_END_HEREDOC && $id[$pv[$pv[$oe]]] === \T_START_HEREDOC) {
            return [true, $ln[$pv[$oe]]]; // heredoc without interpolation is a literal
        }
        if ($last === '"' || $last === \T_END_HEREDOC) {
            return [false, $ln[$pv[$oe]]];
        }
        if ($last === '`') {
            for ($m = $pv[$oe]; $id[$m] !== '`'; $m = $pv[$m]);
            return [false, $ln[$m]];
        }
        if ($last !== ')' && $last !== ']' && $last !== '}') {
            return [false, $ln[$oe]];
        }
        $m = $this->opener($id, $pv, $oe);
        if ($last === '}') { // ->{expr}, ${expr}, match (...) {arms}: the inner expression; a body ends at its brace
            $p = $id[$pv[$m]];
            return [false, isset($member[$p]) || $p === '$' || $p === ')' ? $this->exprLine($id, $tx, $ln, $nx, $pv, $nx[$m], $pv[$oe])[1] : $ln[$oe]];
        }
        if ($m === $os && $last === ')') { // plain parentheses
            return $this->exprLine($id, $tx, $ln, $nx, $pv, $nx[$m], $pv[$oe]);
        }
        if ($nx[$m] !== $oe) { // call, array or index: its last argument or element
            return [false, $this->exprLine($id, $tx, $ln, $nx, $pv, $nx[$m], $pv[$oe])[1]];
        }
        // Empty argument list: the method name, the end of a called closure, else the callee's start.
        $g = $pv[$m];
        if (isset($member[$id[$pv[$g]]])) {
            return [false, $ln[$g]];
        }
        if ($id[$g] === '}' && isset($member[$id[$pv[$r = $this->opener($id, $pv, $g)]]])) {
            return [false, $this->exprLine($id, $tx, $ln, $nx, $pv, $nx[$r], $pv[$g])[1]];
        }
        for ($f = $nx[$os]; $id[$f] === \T_ATTRIBUTE; $f = $nx[$f]) {
            for ($d = 1; $d > 0;) {
                $f = $nx[$f];
                $id[$f] === '[' ? ++$d : ($id[$f] === ']' && --$d);
            }
        }
        $f = $id[$f] === \T_STATIC ? $id[$nx[$f]] : $id[$f];
        if ($id[$g] === ')' && ($f === \T_FN || $f === \T_FUNCTION)) {
            return [false, $ln[$f === \T_FN ? $g : $pv[$g]]];
        }

        return [false, $ln[$os]];
    }

    /** Index of the bracket that opens the group closed at $close. */
    private function opener(array $id, array $pv, int $close): int
    {
        for ($d = 0, $m = $close; $m >= 0; $m = $pv[$m]) {
            $x = $id[$m];
            if ($x === ')' || $x === ']' || $x === '}') {
                ++$d;
            } elseif (($x === '(' || $x === '[' || $x === '{' || $x === \T_ATTRIBUTE || $x === \T_CURLY_OPEN || $x === \T_DOLLAR_OPEN_CURLY_BRACES) && --$d === 0) {
                break;
            }
        }

        return $m;
    }

    /**
     * Parses a `use` import statement starting at token $i.
     *
     * @return array{items:list<array>,end:int,group:bool,use:int}|null
     */
    private function parseUse(int $i): ?array
    {
        $id = $this->id;
        $tx = $this->tx;
        $nx = $this->nx;
        $isName = static fn ($t) => $t === \T_STRING || $t === \T_NAME_QUALIFIED || $t === \T_NAME_FULLY_QUALIFIED;
        $j = $nx[$i];
        $kind = 'c';
        if ($id[$j] === \T_FUNCTION) {
            $kind = 'f';
            $j = $nx[$j];
        } elseif ($id[$j] === \T_CONST) {
            $kind = 'k';
            $j = $nx[$j];
        }
        $items = [];
        $group = false;
        while (true) {
            if (!$isName($id[$j])) {
                return null;
            }
            $nameIdx = $j;
            $name = \ltrim($tx[$j], '\\');
            $j = $nx[$j];
            if ($id[$j] === \T_NS_SEPARATOR) {
                $group = true;
                $j = $nx[$j];
                if ($id[$j] !== '{') {
                    return null;
                }
                $j = $nx[$j];
                while ($id[$j] !== '}') {
                    $k = $kind;
                    if ($id[$j] === \T_FUNCTION) {
                        $k = 'f';
                        $j = $nx[$j];
                    } elseif ($id[$j] === \T_CONST) {
                        $k = 'k';
                        $j = $nx[$j];
                    }
                    if (!$isName($id[$j])) {
                        return null;
                    }
                    $nidx = $j;
                    $short = $tx[$j];
                    $j = $nx[$j];
                    $alias = null;
                    if ($id[$j] === \T_AS) {
                        $j = $nx[$j];
                        $alias = $tx[$j];
                        $j = $nx[$j];
                    }
                    $items[] = ['kind' => $k, 'name' => $name . '\\' . $short, 'alias' => $alias, 'idx' => $nidx];
                    if ($id[$j] === ',') {
                        $j = $nx[$j];
                    } elseif ($id[$j] !== '}') {
                        return null;
                    }
                }
                $j = $nx[$j];
            } else {
                $alias = null;
                if ($id[$j] === \T_AS) {
                    $j = $nx[$j];
                    $alias = $tx[$j];
                    $j = $nx[$j];
                }
                $items[] = ['kind' => $kind, 'name' => $name, 'alias' => $alias, 'idx' => $nameIdx];
            }
            if ($id[$j] === ',') {
                $j = $nx[$j];
                continue;
            }
            break;
        }
        if ($id[$j] !== ';' && $id[$j] !== \T_CLOSE_TAG) {
            return null;
        }

        return ['items' => $items, 'end' => $j, 'group' => $group, 'use' => $i];
    }

    /** Registers the imports of a parsed `use` statement and redirects mapped function imports. */
    private function applyUse(array $u, array &$fnImp, array &$clsImp): void
    {
        $mapped = [];
        foreach ($u['items'] as $k => $it) {
            $last = \substr(\strrchr('\\' . $it['name'], '\\'), 1);
            $alias = $it['alias'] ?? $last;
            if ($it['kind'] === 'f') {
                $fnImp[\strtolower($alias)] = $it['name'];
                if (isset($this->fn[\strtolower($it['name'])])) {
                    $mapped[$k] = [$this->fn[\strtolower($it['name'])], $alias];
                }
            } elseif ($it['kind'] === 'c') {
                $clsImp[\strtolower($alias)] = $it['name'];
            }
        }
        if (!$mapped) {
            return;
        }
        if (!$u['group']) {
            foreach ($mapped as $k => [$repl, $alias]) {
                $it = $u['items'][$k];
                $needAs = $it['alias'] === null && \strcasecmp(\substr(\strrchr('\\' . $repl, '\\'), 1), $alias) !== 0;
                $this->edit[$it['idx']] = $repl . ($needAs ? ' as ' . $alias : '');
            }

            return;
        }
        // Group import: regenerate the statement; its line breaks go at its end (before a closing tag).
        $closeTag = $this->id[$u['end']] === \T_CLOSE_TAG;
        $nl = '';
        for ($k = $u['use']; $k < $u['end']; ++$k) {
            if (\preg_match_all('/\r\n|\r|\n/', $this->tx[$k], $m)) {
                $nl .= \implode('', $m[0]);
            }
        }
        $keep = [];
        $extra = '';
        foreach ($u['items'] as $k => $it) {
            if (isset($mapped[$k])) {
                $extra .= ' use function ' . $mapped[$k][0] . ' as ' . $mapped[$k][1] . ';';
            } else {
                $keep[] = ($it['kind'] === 'f' ? 'function ' : ($it['kind'] === 'k' ? 'const ' : '')) . $it['name'] . ($it['alias'] !== null ? ' as ' . $it['alias'] : '');
            }
        }
        $text = '';
        foreach ($keep as $s) {
            $text .= ' use ' . $s . ';';
        }
        for ($k = $u['use']; $k < $u['end']; ++$k) {
            $this->edit[$k] = '';
        }
        $this->edit[$u['use']] = \ltrim($text . $extra);
        $this->edit[$u['end']] = $closeTag ? $nl . $this->tx[$u['end']] : $nl;
    }
}
