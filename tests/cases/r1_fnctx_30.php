<?php
namespace big;
$a = []; foreach (array (
  0 => 'fopen',
  1 => 'sleep',
  2 => 'usleep',
  3 => 'file_get_contents',
  4 => 'stream_select',
  5 => 'curl_exec',
  6 => 'strtoupper',
) as $q) { $a["HOOK:$q"] = "v"; } $o = new class { function fopen() { return ''; } function sleep() { return ''; } function usleep() { return ''; } function file_get_contents() { return ''; } function stream_select() { return ''; } function curl_exec() { return ''; } function strtoupper() { return ''; } };
function f0($a, $o) {
  return fopen('a');
}
echo f0($a, $o), ' ';
function f1($a, $o) {
  return sleep('a');
}
echo f1($a, $o), ' ';
function f2($a, $o) {
  return usleep('a');
}
echo f2($a, $o), ' ';
function f3($a, $o) {
  return file_get_contents('a');
}
echo f3($a, $o), ' ';
function f4($a, $o) {
  return stream_select('a');
}
echo f4($a, $o), ' ';
function f5($a, $o) {
  return curl_exec('a');
}
echo f5($a, $o), ' ';
function f6($a, $o) {
  return strtoupper('a');
}
echo f6($a, $o), ' ';
function f7($a, $o) {
  return \fopen('a');
}
echo f7($a, $o), ' ';
function f8($a, $o) {
  return \sleep('a');
}
echo f8($a, $o), ' ';
function f9($a, $o) {
  return \usleep('a');
}
echo f9($a, $o), ' ';
function f10($a, $o) {
  return \file_get_contents('a');
}
echo f10($a, $o), ' ';
function f11($a, $o) {
  return \stream_select('a');
}
echo f11($a, $o), ' ';
function f12($a, $o) {
  return \curl_exec('a');
}
echo f12($a, $o), ' ';
function f13($a, $o) {
  return \strtoupper('a');
}
echo f13($a, $o), ' ';
function f14($a, $o) {
  return (fopen(...))('a');
}
echo f14($a, $o), ' ';
function f15($a, $o) {
  return (sleep(...))('a');
}
echo f15($a, $o), ' ';
function f16($a, $o) {
  return (usleep(...))('a');
}
echo f16($a, $o), ' ';
function f17($a, $o) {
  return (file_get_contents(...))('a');
}
echo f17($a, $o), ' ';
function f18($a, $o) {
  return (stream_select(...))('a');
}
echo f18($a, $o), ' ';
function f19($a, $o) {
  return (curl_exec(...))('a');
}
echo f19($a, $o), ' ';
function f20($a, $o) {
  return (strtoupper(...))('a');
}
echo f20($a, $o), ' ';
function f21($a, $o) {
  return [fopen('a'), "{$a[fopen()]}"][0];
}
echo f21($a, $o), ' ';
function f22($a, $o) {
  return [sleep('a'), "{$a[sleep()]}"][0];
}
echo f22($a, $o), ' ';
function f23($a, $o) {
  return [usleep('a'), "{$a[usleep()]}"][0];
}
echo f23($a, $o), ' ';
function f24($a, $o) {
  return [file_get_contents('a'), "{$a[file_get_contents()]}"][0];
}
echo f24($a, $o), ' ';
function f25($a, $o) {
  return [stream_select('a'), "{$a[stream_select()]}"][0];
}
echo f25($a, $o), ' ';
function f26($a, $o) {
  return [curl_exec('a'), "{$a[curl_exec()]}"][0];
}
echo f26($a, $o), ' ';
function f27($a, $o) {
  return [strtoupper('a'), "{$a[strtoupper()]}"][0];
}
echo f27($a, $o), ' ';
function f28($a, $o) {
  return (fn() => (function() { return fopen(); })())();
}
echo f28($a, $o), ' ';
function f29($a, $o) {
  return (fn() => (function() { return sleep(); })())();
}
echo f29($a, $o), ' ';
function f30($a, $o) {
  return (fn() => (function() { return usleep(); })())();
}
echo f30($a, $o), ' ';
function f31($a, $o) {
  return (fn() => (function() { return file_get_contents(); })())();
}
echo f31($a, $o), ' ';
function f32($a, $o) {
  return (fn() => (function() { return stream_select(); })())();
}
echo f32($a, $o), ' ';
function f33($a, $o) {
  return (fn() => (function() { return curl_exec(); })())();
}
echo f33($a, $o), ' ';
function f34($a, $o) {
  return (fn() => (function() { return strtoupper(); })())();
}
echo f34($a, $o), ' ';
function f35($a, $o) {
  return match(true) { default => fopen() };
}
echo f35($a, $o), ' ';
function f36($a, $o) {
  return match(true) { default => sleep() };
}
echo f36($a, $o), ' ';
function f37($a, $o) {
  return match(true) { default => usleep() };
}
echo f37($a, $o), ' ';
function f38($a, $o) {
  return match(true) { default => file_get_contents() };
}
echo f38($a, $o), ' ';
function f39($a, $o) {
  return match(true) { default => stream_select() };
}
echo f39($a, $o), ' ';
function f40($a, $o) {
  return match(true) { default => curl_exec() };
}
echo f40($a, $o), ' ';
function f41($a, $o) {
  return match(true) { default => strtoupper() };
}
echo f41($a, $o), ' ';
function f42($a, $o) {
  return strtoupper /*x*/ ( # y
 fopen
 (1));
}
echo f42($a, $o), ' ';
function f43($a, $o) {
  return strtoupper /*x*/ ( # y
 sleep
 (1));
}
echo f43($a, $o), ' ';
function f44($a, $o) {
  return strtoupper /*x*/ ( # y
 usleep
 (1));
}
echo f44($a, $o), ' ';
function f45($a, $o) {
  return strtoupper /*x*/ ( # y
 file_get_contents
 (1));
}
echo f45($a, $o), ' ';
function f46($a, $o) {
  return strtoupper /*x*/ ( # y
 stream_select
 (1));
}
echo f46($a, $o), ' ';
function f47($a, $o) {
  return strtoupper /*x*/ ( # y
 curl_exec
 (1));
}
echo f47($a, $o), ' ';
function f48($a, $o) {
  return strtoupper /*x*/ ( # y
 strtoupper
 (1));
}
echo f48($a, $o), ' ';
function f49($a, $o) {
  return (new class(fopen('q')) { function __construct(public $p) {} })->p;
}
echo f49($a, $o), ' ';
function f50($a, $o) {
  return (new class(sleep('q')) { function __construct(public $p) {} })->p;
}
echo f50($a, $o), ' ';
function f51($a, $o) {
  return (new class(usleep('q')) { function __construct(public $p) {} })->p;
}
echo f51($a, $o), ' ';
function f52($a, $o) {
  return (new class(file_get_contents('q')) { function __construct(public $p) {} })->p;
}
echo f52($a, $o), ' ';
function f53($a, $o) {
  return (new class(stream_select('q')) { function __construct(public $p) {} })->p;
}
echo f53($a, $o), ' ';
function f54($a, $o) {
  return (new class(curl_exec('q')) { function __construct(public $p) {} })->p;
}
echo f54($a, $o), ' ';
function f55($a, $o) {
  return (new class(strtoupper('q')) { function __construct(public $p) {} })->p;
}
echo f55($a, $o), ' ';
function f56($a, $o) {
  return $o->fopen() . fopen();
}
echo f56($a, $o), ' ';
function f57($a, $o) {
  return $o->sleep() . sleep();
}
echo f57($a, $o), ' ';
function f58($a, $o) {
  return $o->usleep() . usleep();
}
echo f58($a, $o), ' ';
function f59($a, $o) {
  return $o->file_get_contents() . file_get_contents();
}
echo f59($a, $o), ' ';
function f60($a, $o) {
  return $o->stream_select() . stream_select();
}
echo f60($a, $o), ' ';
function f61($a, $o) {
  return $o->curl_exec() . curl_exec();
}
echo f61($a, $o), ' ';
function f62($a, $o) {
  return $o->strtoupper() . strtoupper();
}
echo f62($a, $o), ' ';
function f63($a, $o) {
  return <<<X
{$a[fopen(1)]}
X;
}
echo f63($a, $o), ' ';
function f64($a, $o) {
  return <<<X
{$a[sleep(1)]}
X;
}
echo f64($a, $o), ' ';
function f65($a, $o) {
  return <<<X
{$a[usleep(1)]}
X;
}
echo f65($a, $o), ' ';
function f66($a, $o) {
  return <<<X
{$a[file_get_contents(1)]}
X;
}
echo f66($a, $o), ' ';
function f67($a, $o) {
  return <<<X
{$a[stream_select(1)]}
X;
}
echo f67($a, $o), ' ';
function f68($a, $o) {
  return <<<X
{$a[curl_exec(1)]}
X;
}
echo f68($a, $o), ' ';
function f69($a, $o) {
  return <<<X
{$a[strtoupper(1)]}
X;
}
echo f69($a, $o), ' ';
function f70($a, $o) {
  return fopen('a');
}
echo f70($a, $o), ' ';
function f71($a, $o) {
  return sleep('a');
}
echo f71($a, $o), ' ';
function f72($a, $o) {
  return usleep('a');
}
echo f72($a, $o), ' ';
function f73($a, $o) {
  return file_get_contents('a');
}
echo f73($a, $o), ' ';
function f74($a, $o) {
  return stream_select('a');
}
echo f74($a, $o), ' ';
function f75($a, $o) {
  return curl_exec('a');
}
echo f75($a, $o), ' ';
function f76($a, $o) {
  return strtoupper('a');
}
echo f76($a, $o), ' ';
function f77($a, $o) {
  return \fopen('a');
}
echo f77($a, $o), ' ';
function f78($a, $o) {
  return \sleep('a');
}
echo f78($a, $o), ' ';
function f79($a, $o) {
  return \usleep('a');
}
echo f79($a, $o), ' ';
function f80($a, $o) {
  return \file_get_contents('a');
}
echo f80($a, $o), ' ';
function f81($a, $o) {
  return \stream_select('a');
}
echo f81($a, $o), ' ';
function f82($a, $o) {
  return \curl_exec('a');
}
echo f82($a, $o), ' ';
function f83($a, $o) {
  return \strtoupper('a');
}
echo f83($a, $o), ' ';
function f84($a, $o) {
  return (fopen(...))('a');
}
echo f84($a, $o), ' ';
function f85($a, $o) {
  return (sleep(...))('a');
}
echo f85($a, $o), ' ';
function f86($a, $o) {
  return (usleep(...))('a');
}
echo f86($a, $o), ' ';
function f87($a, $o) {
  return (file_get_contents(...))('a');
}
echo f87($a, $o), ' ';
function f88($a, $o) {
  return (stream_select(...))('a');
}
echo f88($a, $o), ' ';
function f89($a, $o) {
  return (curl_exec(...))('a');
}
echo f89($a, $o), ' ';
function f90($a, $o) {
  return (strtoupper(...))('a');
}
echo f90($a, $o), ' ';
function f91($a, $o) {
  return [fopen('a'), "{$a[fopen()]}"][0];
}
echo f91($a, $o), ' ';
function f92($a, $o) {
  return [sleep('a'), "{$a[sleep()]}"][0];
}
echo f92($a, $o), ' ';
function f93($a, $o) {
  return [usleep('a'), "{$a[usleep()]}"][0];
}
echo f93($a, $o), ' ';
function f94($a, $o) {
  return [file_get_contents('a'), "{$a[file_get_contents()]}"][0];
}
echo f94($a, $o), ' ';
function f95($a, $o) {
  return [stream_select('a'), "{$a[stream_select()]}"][0];
}
echo f95($a, $o), ' ';
function f96($a, $o) {
  return [curl_exec('a'), "{$a[curl_exec()]}"][0];
}
echo f96($a, $o), ' ';
function f97($a, $o) {
  return [strtoupper('a'), "{$a[strtoupper()]}"][0];
}
echo f97($a, $o), ' ';
function f98($a, $o) {
  return (fn() => (function() { return fopen(); })())();
}
echo f98($a, $o), ' ';
function f99($a, $o) {
  return (fn() => (function() { return sleep(); })())();
}
echo f99($a, $o), ' ';
function f100($a, $o) {
  return (fn() => (function() { return usleep(); })())();
}
echo f100($a, $o), ' ';
function f101($a, $o) {
  return (fn() => (function() { return file_get_contents(); })())();
}
echo f101($a, $o), ' ';
function f102($a, $o) {
  return (fn() => (function() { return stream_select(); })())();
}
echo f102($a, $o), ' ';
function f103($a, $o) {
  return (fn() => (function() { return curl_exec(); })())();
}
echo f103($a, $o), ' ';
function f104($a, $o) {
  return (fn() => (function() { return strtoupper(); })())();
}
echo f104($a, $o), ' ';
function f105($a, $o) {
  return match(true) { default => fopen() };
}
echo f105($a, $o), ' ';
function f106($a, $o) {
  return match(true) { default => sleep() };
}
echo f106($a, $o), ' ';
function f107($a, $o) {
  return match(true) { default => usleep() };
}
echo f107($a, $o), ' ';
function f108($a, $o) {
  return match(true) { default => file_get_contents() };
}
echo f108($a, $o), ' ';
function f109($a, $o) {
  return match(true) { default => stream_select() };
}
echo f109($a, $o), ' ';
function f110($a, $o) {
  return match(true) { default => curl_exec() };
}
echo f110($a, $o), ' ';
function f111($a, $o) {
  return match(true) { default => strtoupper() };
}
echo f111($a, $o), ' ';
function f112($a, $o) {
  return strtoupper /*x*/ ( # y
 fopen
 (1));
}
echo f112($a, $o), ' ';
function f113($a, $o) {
  return strtoupper /*x*/ ( # y
 sleep
 (1));
}
echo f113($a, $o), ' ';
function f114($a, $o) {
  return strtoupper /*x*/ ( # y
 usleep
 (1));
}
echo f114($a, $o), ' ';
function f115($a, $o) {
  return strtoupper /*x*/ ( # y
 file_get_contents
 (1));
}
echo f115($a, $o), ' ';
function f116($a, $o) {
  return strtoupper /*x*/ ( # y
 stream_select
 (1));
}
echo f116($a, $o), ' ';
function f117($a, $o) {
  return strtoupper /*x*/ ( # y
 curl_exec
 (1));
}
echo f117($a, $o), ' ';
function f118($a, $o) {
  return strtoupper /*x*/ ( # y
 strtoupper
 (1));
}
echo f118($a, $o), ' ';
function f119($a, $o) {
  return (new class(fopen('q')) { function __construct(public $p) {} })->p;
}
echo f119($a, $o), ' ';
function f120($a, $o) {
  return (new class(sleep('q')) { function __construct(public $p) {} })->p;
}
echo f120($a, $o), ' ';
function f121($a, $o) {
  return (new class(usleep('q')) { function __construct(public $p) {} })->p;
}
echo f121($a, $o), ' ';
function f122($a, $o) {
  return (new class(file_get_contents('q')) { function __construct(public $p) {} })->p;
}
echo f122($a, $o), ' ';
function f123($a, $o) {
  return (new class(stream_select('q')) { function __construct(public $p) {} })->p;
}
echo f123($a, $o), ' ';
function f124($a, $o) {
  return (new class(curl_exec('q')) { function __construct(public $p) {} })->p;
}
echo f124($a, $o), ' ';
function f125($a, $o) {
  return (new class(strtoupper('q')) { function __construct(public $p) {} })->p;
}
echo f125($a, $o), ' ';
function f126($a, $o) {
  return $o->fopen() . fopen();
}
echo f126($a, $o), ' ';
function f127($a, $o) {
  return $o->sleep() . sleep();
}
echo f127($a, $o), ' ';
function f128($a, $o) {
  return $o->usleep() . usleep();
}
echo f128($a, $o), ' ';
function f129($a, $o) {
  return $o->file_get_contents() . file_get_contents();
}
echo f129($a, $o), ' ';
function f130($a, $o) {
  return $o->stream_select() . stream_select();
}
echo f130($a, $o), ' ';
function f131($a, $o) {
  return $o->curl_exec() . curl_exec();
}
echo f131($a, $o), ' ';
function f132($a, $o) {
  return $o->strtoupper() . strtoupper();
}
echo f132($a, $o), ' ';
function f133($a, $o) {
  return <<<X
{$a[fopen(1)]}
X;
}
echo f133($a, $o), ' ';
function f134($a, $o) {
  return <<<X
{$a[sleep(1)]}
X;
}
echo f134($a, $o), ' ';
function f135($a, $o) {
  return <<<X
{$a[usleep(1)]}
X;
}
echo f135($a, $o), ' ';
function f136($a, $o) {
  return <<<X
{$a[file_get_contents(1)]}
X;
}
echo f136($a, $o), ' ';
function f137($a, $o) {
  return <<<X
{$a[stream_select(1)]}
X;
}
echo f137($a, $o), ' ';
function f138($a, $o) {
  return <<<X
{$a[curl_exec(1)]}
X;
}
echo f138($a, $o), ' ';
function f139($a, $o) {
  return <<<X
{$a[strtoupper(1)]}
X;
}
echo f139($a, $o), ' ';
function f140($a, $o) {
  return fopen('a');
}
echo f140($a, $o), ' ';
function f141($a, $o) {
  return sleep('a');
}
echo f141($a, $o), ' ';
function f142($a, $o) {
  return usleep('a');
}
echo f142($a, $o), ' ';
function f143($a, $o) {
  return file_get_contents('a');
}
echo f143($a, $o), ' ';
function f144($a, $o) {
  return stream_select('a');
}
echo f144($a, $o), ' ';
function f145($a, $o) {
  return curl_exec('a');
}
echo f145($a, $o), ' ';
function f146($a, $o) {
  return strtoupper('a');
}
echo f146($a, $o), ' ';
function f147($a, $o) {
  return \fopen('a');
}
echo f147($a, $o), ' ';
function f148($a, $o) {
  return \sleep('a');
}
echo f148($a, $o), ' ';
function f149($a, $o) {
  return \usleep('a');
}
echo f149($a, $o), ' ';
function f150($a, $o) {
  return \file_get_contents('a');
}
echo f150($a, $o), ' ';
function f151($a, $o) {
  return \stream_select('a');
}
echo f151($a, $o), ' ';
function f152($a, $o) {
  return \curl_exec('a');
}
echo f152($a, $o), ' ';
function f153($a, $o) {
  return \strtoupper('a');
}
echo f153($a, $o), ' ';
function f154($a, $o) {
  return (fopen(...))('a');
}
echo f154($a, $o), ' ';
function f155($a, $o) {
  return (sleep(...))('a');
}
echo f155($a, $o), ' ';
function f156($a, $o) {
  return (usleep(...))('a');
}
echo f156($a, $o), ' ';
function f157($a, $o) {
  return (file_get_contents(...))('a');
}
echo f157($a, $o), ' ';
function f158($a, $o) {
  return (stream_select(...))('a');
}
echo f158($a, $o), ' ';
function f159($a, $o) {
  return (curl_exec(...))('a');
}
echo f159($a, $o), ' ';
function f160($a, $o) {
  return (strtoupper(...))('a');
}
echo f160($a, $o), ' ';
function f161($a, $o) {
  return [fopen('a'), "{$a[fopen()]}"][0];
}
echo f161($a, $o), ' ';
function f162($a, $o) {
  return [sleep('a'), "{$a[sleep()]}"][0];
}
echo f162($a, $o), ' ';
function f163($a, $o) {
  return [usleep('a'), "{$a[usleep()]}"][0];
}
echo f163($a, $o), ' ';
function f164($a, $o) {
  return [file_get_contents('a'), "{$a[file_get_contents()]}"][0];
}
echo f164($a, $o), ' ';
function f165($a, $o) {
  return [stream_select('a'), "{$a[stream_select()]}"][0];
}
echo f165($a, $o), ' ';
function f166($a, $o) {
  return [curl_exec('a'), "{$a[curl_exec()]}"][0];
}
echo f166($a, $o), ' ';
function f167($a, $o) {
  return [strtoupper('a'), "{$a[strtoupper()]}"][0];
}
echo f167($a, $o), ' ';
function f168($a, $o) {
  return (fn() => (function() { return fopen(); })())();
}
echo f168($a, $o), ' ';
function f169($a, $o) {
  return (fn() => (function() { return sleep(); })())();
}
echo f169($a, $o), ' ';
function f170($a, $o) {
  return (fn() => (function() { return usleep(); })())();
}
echo f170($a, $o), ' ';
function f171($a, $o) {
  return (fn() => (function() { return file_get_contents(); })())();
}
echo f171($a, $o), ' ';
function f172($a, $o) {
  return (fn() => (function() { return stream_select(); })())();
}
echo f172($a, $o), ' ';
function f173($a, $o) {
  return (fn() => (function() { return curl_exec(); })())();
}
echo f173($a, $o), ' ';
function f174($a, $o) {
  return (fn() => (function() { return strtoupper(); })())();
}
echo f174($a, $o), ' ';
function f175($a, $o) {
  return match(true) { default => fopen() };
}
echo f175($a, $o), ' ';
function f176($a, $o) {
  return match(true) { default => sleep() };
}
echo f176($a, $o), ' ';
function f177($a, $o) {
  return match(true) { default => usleep() };
}
echo f177($a, $o), ' ';
function f178($a, $o) {
  return match(true) { default => file_get_contents() };
}
echo f178($a, $o), ' ';
function f179($a, $o) {
  return match(true) { default => stream_select() };
}
echo f179($a, $o), ' ';
function f180($a, $o) {
  return match(true) { default => curl_exec() };
}
echo f180($a, $o), ' ';
function f181($a, $o) {
  return match(true) { default => strtoupper() };
}
echo f181($a, $o), ' ';
function f182($a, $o) {
  return strtoupper /*x*/ ( # y
 fopen
 (1));
}
echo f182($a, $o), ' ';
function f183($a, $o) {
  return strtoupper /*x*/ ( # y
 sleep
 (1));
}
echo f183($a, $o), ' ';
function f184($a, $o) {
  return strtoupper /*x*/ ( # y
 usleep
 (1));
}
echo f184($a, $o), ' ';
function f185($a, $o) {
  return strtoupper /*x*/ ( # y
 file_get_contents
 (1));
}
echo f185($a, $o), ' ';
function f186($a, $o) {
  return strtoupper /*x*/ ( # y
 stream_select
 (1));
}
echo f186($a, $o), ' ';
function f187($a, $o) {
  return strtoupper /*x*/ ( # y
 curl_exec
 (1));
}
echo f187($a, $o), ' ';
function f188($a, $o) {
  return strtoupper /*x*/ ( # y
 strtoupper
 (1));
}
echo f188($a, $o), ' ';
function f189($a, $o) {
  return (new class(fopen('q')) { function __construct(public $p) {} })->p;
}
echo f189($a, $o), ' ';
function f190($a, $o) {
  return (new class(sleep('q')) { function __construct(public $p) {} })->p;
}
echo f190($a, $o), ' ';
function f191($a, $o) {
  return (new class(usleep('q')) { function __construct(public $p) {} })->p;
}
echo f191($a, $o), ' ';
function f192($a, $o) {
  return (new class(file_get_contents('q')) { function __construct(public $p) {} })->p;
}
echo f192($a, $o), ' ';
function f193($a, $o) {
  return (new class(stream_select('q')) { function __construct(public $p) {} })->p;
}
echo f193($a, $o), ' ';
function f194($a, $o) {
  return (new class(curl_exec('q')) { function __construct(public $p) {} })->p;
}
echo f194($a, $o), ' ';
function f195($a, $o) {
  return (new class(strtoupper('q')) { function __construct(public $p) {} })->p;
}
echo f195($a, $o), ' ';
function f196($a, $o) {
  return $o->fopen() . fopen();
}
echo f196($a, $o), ' ';
function f197($a, $o) {
  return $o->sleep() . sleep();
}
echo f197($a, $o), ' ';
function f198($a, $o) {
  return $o->usleep() . usleep();
}
echo f198($a, $o), ' ';
function f199($a, $o) {
  return $o->file_get_contents() . file_get_contents();
}
echo f199($a, $o), ' ';
function f200($a, $o) {
  return $o->stream_select() . stream_select();
}
echo f200($a, $o), ' ';
function f201($a, $o) {
  return $o->curl_exec() . curl_exec();
}
echo f201($a, $o), ' ';
function f202($a, $o) {
  return $o->strtoupper() . strtoupper();
}
echo f202($a, $o), ' ';
function f203($a, $o) {
  return <<<X
{$a[fopen(1)]}
X;
}
echo f203($a, $o), ' ';
function f204($a, $o) {
  return <<<X
{$a[sleep(1)]}
X;
}
echo f204($a, $o), ' ';
function f205($a, $o) {
  return <<<X
{$a[usleep(1)]}
X;
}
echo f205($a, $o), ' ';
function f206($a, $o) {
  return <<<X
{$a[file_get_contents(1)]}
X;
}
echo f206($a, $o), ' ';
function f207($a, $o) {
  return <<<X
{$a[stream_select(1)]}
X;
}
echo f207($a, $o), ' ';
function f208($a, $o) {
  return <<<X
{$a[curl_exec(1)]}
X;
}
echo f208($a, $o), ' ';
function f209($a, $o) {
  return <<<X
{$a[strtoupper(1)]}
X;
}
echo f209($a, $o), ' ';
function f210($a, $o) {
  return fopen('a');
}
echo f210($a, $o), ' ';
function f211($a, $o) {
  return sleep('a');
}
echo f211($a, $o), ' ';
function f212($a, $o) {
  return usleep('a');
}
echo f212($a, $o), ' ';
function f213($a, $o) {
  return file_get_contents('a');
}
echo f213($a, $o), ' ';
function f214($a, $o) {
  return stream_select('a');
}
echo f214($a, $o), ' ';
function f215($a, $o) {
  return curl_exec('a');
}
echo f215($a, $o), ' ';
function f216($a, $o) {
  return strtoupper('a');
}
echo f216($a, $o), ' ';
function f217($a, $o) {
  return \fopen('a');
}
echo f217($a, $o), ' ';
function f218($a, $o) {
  return \sleep('a');
}
echo f218($a, $o), ' ';
function f219($a, $o) {
  return \usleep('a');
}
echo f219($a, $o), ' ';
function f220($a, $o) {
  return \file_get_contents('a');
}
echo f220($a, $o), ' ';
function f221($a, $o) {
  return \stream_select('a');
}
echo f221($a, $o), ' ';
function f222($a, $o) {
  return \curl_exec('a');
}
echo f222($a, $o), ' ';
function f223($a, $o) {
  return \strtoupper('a');
}
echo f223($a, $o), ' ';
function f224($a, $o) {
  return (fopen(...))('a');
}
echo f224($a, $o), ' ';
function f225($a, $o) {
  return (sleep(...))('a');
}
echo f225($a, $o), ' ';
function f226($a, $o) {
  return (usleep(...))('a');
}
echo f226($a, $o), ' ';
function f227($a, $o) {
  return (file_get_contents(...))('a');
}
echo f227($a, $o), ' ';
function f228($a, $o) {
  return (stream_select(...))('a');
}
echo f228($a, $o), ' ';
function f229($a, $o) {
  return (curl_exec(...))('a');
}
echo f229($a, $o), ' ';
function f230($a, $o) {
  return (strtoupper(...))('a');
}
echo f230($a, $o), ' ';
function f231($a, $o) {
  return [fopen('a'), "{$a[fopen()]}"][0];
}
echo f231($a, $o), ' ';
function f232($a, $o) {
  return [sleep('a'), "{$a[sleep()]}"][0];
}
echo f232($a, $o), ' ';
function f233($a, $o) {
  return [usleep('a'), "{$a[usleep()]}"][0];
}
echo f233($a, $o), ' ';
function f234($a, $o) {
  return [file_get_contents('a'), "{$a[file_get_contents()]}"][0];
}
echo f234($a, $o), ' ';
function f235($a, $o) {
  return [stream_select('a'), "{$a[stream_select()]}"][0];
}
echo f235($a, $o), ' ';
function f236($a, $o) {
  return [curl_exec('a'), "{$a[curl_exec()]}"][0];
}
echo f236($a, $o), ' ';
function f237($a, $o) {
  return [strtoupper('a'), "{$a[strtoupper()]}"][0];
}
echo f237($a, $o), ' ';
function f238($a, $o) {
  return (fn() => (function() { return fopen(); })())();
}
echo f238($a, $o), ' ';
function f239($a, $o) {
  return (fn() => (function() { return sleep(); })())();
}
echo f239($a, $o), ' ';
function f240($a, $o) {
  return (fn() => (function() { return usleep(); })())();
}
echo f240($a, $o), ' ';
function f241($a, $o) {
  return (fn() => (function() { return file_get_contents(); })())();
}
echo f241($a, $o), ' ';
function f242($a, $o) {
  return (fn() => (function() { return stream_select(); })())();
}
echo f242($a, $o), ' ';
function f243($a, $o) {
  return (fn() => (function() { return curl_exec(); })())();
}
echo f243($a, $o), ' ';
function f244($a, $o) {
  return (fn() => (function() { return strtoupper(); })())();
}
echo f244($a, $o), ' ';
function f245($a, $o) {
  return match(true) { default => fopen() };
}
echo f245($a, $o), ' ';
function f246($a, $o) {
  return match(true) { default => sleep() };
}
echo f246($a, $o), ' ';
function f247($a, $o) {
  return match(true) { default => usleep() };
}
echo f247($a, $o), ' ';
function f248($a, $o) {
  return match(true) { default => file_get_contents() };
}
echo f248($a, $o), ' ';
function f249($a, $o) {
  return match(true) { default => stream_select() };
}
echo f249($a, $o), ' ';
function f250($a, $o) {
  return match(true) { default => curl_exec() };
}
echo f250($a, $o), ' ';
function f251($a, $o) {
  return match(true) { default => strtoupper() };
}
echo f251($a, $o), ' ';
function f252($a, $o) {
  return strtoupper /*x*/ ( # y
 fopen
 (1));
}
echo f252($a, $o), ' ';
function f253($a, $o) {
  return strtoupper /*x*/ ( # y
 sleep
 (1));
}
echo f253($a, $o), ' ';
function f254($a, $o) {
  return strtoupper /*x*/ ( # y
 usleep
 (1));
}
echo f254($a, $o), ' ';
function f255($a, $o) {
  return strtoupper /*x*/ ( # y
 file_get_contents
 (1));
}
echo f255($a, $o), ' ';
function f256($a, $o) {
  return strtoupper /*x*/ ( # y
 stream_select
 (1));
}
echo f256($a, $o), ' ';
function f257($a, $o) {
  return strtoupper /*x*/ ( # y
 curl_exec
 (1));
}
echo f257($a, $o), ' ';
function f258($a, $o) {
  return strtoupper /*x*/ ( # y
 strtoupper
 (1));
}
echo f258($a, $o), ' ';
function f259($a, $o) {
  return (new class(fopen('q')) { function __construct(public $p) {} })->p;
}
echo f259($a, $o), ' ';
function f260($a, $o) {
  return (new class(sleep('q')) { function __construct(public $p) {} })->p;
}
echo f260($a, $o), ' ';
function f261($a, $o) {
  return (new class(usleep('q')) { function __construct(public $p) {} })->p;
}
echo f261($a, $o), ' ';
function f262($a, $o) {
  return (new class(file_get_contents('q')) { function __construct(public $p) {} })->p;
}
echo f262($a, $o), ' ';
function f263($a, $o) {
  return (new class(stream_select('q')) { function __construct(public $p) {} })->p;
}
echo f263($a, $o), ' ';
function f264($a, $o) {
  return (new class(curl_exec('q')) { function __construct(public $p) {} })->p;
}
echo f264($a, $o), ' ';
function f265($a, $o) {
  return (new class(strtoupper('q')) { function __construct(public $p) {} })->p;
}
echo f265($a, $o), ' ';
function f266($a, $o) {
  return $o->fopen() . fopen();
}
echo f266($a, $o), ' ';
function f267($a, $o) {
  return $o->sleep() . sleep();
}
echo f267($a, $o), ' ';
function f268($a, $o) {
  return $o->usleep() . usleep();
}
echo f268($a, $o), ' ';
function f269($a, $o) {
  return $o->file_get_contents() . file_get_contents();
}
echo f269($a, $o), ' ';
function f270($a, $o) {
  return $o->stream_select() . stream_select();
}
echo f270($a, $o), ' ';
function f271($a, $o) {
  return $o->curl_exec() . curl_exec();
}
echo f271($a, $o), ' ';
function f272($a, $o) {
  return $o->strtoupper() . strtoupper();
}
echo f272($a, $o), ' ';
function f273($a, $o) {
  return <<<X
{$a[fopen(1)]}
X;
}
echo f273($a, $o), ' ';
function f274($a, $o) {
  return <<<X
{$a[sleep(1)]}
X;
}
echo f274($a, $o), ' ';
function f275($a, $o) {
  return <<<X
{$a[usleep(1)]}
X;
}
echo f275($a, $o), ' ';
function f276($a, $o) {
  return <<<X
{$a[file_get_contents(1)]}
X;
}
echo f276($a, $o), ' ';
function f277($a, $o) {
  return <<<X
{$a[stream_select(1)]}
X;
}
echo f277($a, $o), ' ';
function f278($a, $o) {
  return <<<X
{$a[curl_exec(1)]}
X;
}
echo f278($a, $o), ' ';
function f279($a, $o) {
  return <<<X
{$a[strtoupper(1)]}
X;
}
echo f279($a, $o), ' ';
function f280($a, $o) {
  return fopen('a');
}
echo f280($a, $o), ' ';
function f281($a, $o) {
  return sleep('a');
}
echo f281($a, $o), ' ';
function f282($a, $o) {
  return usleep('a');
}
echo f282($a, $o), ' ';
function f283($a, $o) {
  return file_get_contents('a');
}
echo f283($a, $o), ' ';
function f284($a, $o) {
  return stream_select('a');
}
echo f284($a, $o), ' ';
function f285($a, $o) {
  return curl_exec('a');
}
echo f285($a, $o), ' ';
function f286($a, $o) {
  return strtoupper('a');
}
echo f286($a, $o), ' ';
function f287($a, $o) {
  return \fopen('a');
}
echo f287($a, $o), ' ';
function f288($a, $o) {
  return \sleep('a');
}
echo f288($a, $o), ' ';
function f289($a, $o) {
  return \usleep('a');
}
echo f289($a, $o), ' ';
function f290($a, $o) {
  return \file_get_contents('a');
}
echo f290($a, $o), ' ';
function f291($a, $o) {
  return \stream_select('a');
}
echo f291($a, $o), ' ';
function f292($a, $o) {
  return \curl_exec('a');
}
echo f292($a, $o), ' ';
function f293($a, $o) {
  return \strtoupper('a');
}
echo f293($a, $o), ' ';
function f294($a, $o) {
  return (fopen(...))('a');
}
echo f294($a, $o), ' ';
function f295($a, $o) {
  return (sleep(...))('a');
}
echo f295($a, $o), ' ';
function f296($a, $o) {
  return (usleep(...))('a');
}
echo f296($a, $o), ' ';
function f297($a, $o) {
  return (file_get_contents(...))('a');
}
echo f297($a, $o), ' ';
function f298($a, $o) {
  return (stream_select(...))('a');
}
echo f298($a, $o), ' ';
function f299($a, $o) {
  return (curl_exec(...))('a');
}
echo f299($a, $o), ' ';
function f300($a, $o) {
  return (strtoupper(...))('a');
}
echo f300($a, $o), ' ';
function f301($a, $o) {
  return [fopen('a'), "{$a[fopen()]}"][0];
}
echo f301($a, $o), ' ';
function f302($a, $o) {
  return [sleep('a'), "{$a[sleep()]}"][0];
}
echo f302($a, $o), ' ';
function f303($a, $o) {
  return [usleep('a'), "{$a[usleep()]}"][0];
}
echo f303($a, $o), ' ';
function f304($a, $o) {
  return [file_get_contents('a'), "{$a[file_get_contents()]}"][0];
}
echo f304($a, $o), ' ';
function f305($a, $o) {
  return [stream_select('a'), "{$a[stream_select()]}"][0];
}
echo f305($a, $o), ' ';
function f306($a, $o) {
  return [curl_exec('a'), "{$a[curl_exec()]}"][0];
}
echo f306($a, $o), ' ';
function f307($a, $o) {
  return [strtoupper('a'), "{$a[strtoupper()]}"][0];
}
echo f307($a, $o), ' ';
function f308($a, $o) {
  return (fn() => (function() { return fopen(); })())();
}
echo f308($a, $o), ' ';
function f309($a, $o) {
  return (fn() => (function() { return sleep(); })())();
}
echo f309($a, $o), ' ';
function f310($a, $o) {
  return (fn() => (function() { return usleep(); })())();
}
echo f310($a, $o), ' ';
function f311($a, $o) {
  return (fn() => (function() { return file_get_contents(); })())();
}
echo f311($a, $o), ' ';
function f312($a, $o) {
  return (fn() => (function() { return stream_select(); })())();
}
echo f312($a, $o), ' ';
function f313($a, $o) {
  return (fn() => (function() { return curl_exec(); })())();
}
echo f313($a, $o), ' ';
function f314($a, $o) {
  return (fn() => (function() { return strtoupper(); })())();
}
echo f314($a, $o), ' ';
function f315($a, $o) {
  return match(true) { default => fopen() };
}
echo f315($a, $o), ' ';
function f316($a, $o) {
  return match(true) { default => sleep() };
}
echo f316($a, $o), ' ';
function f317($a, $o) {
  return match(true) { default => usleep() };
}
echo f317($a, $o), ' ';
function f318($a, $o) {
  return match(true) { default => file_get_contents() };
}
echo f318($a, $o), ' ';
function f319($a, $o) {
  return match(true) { default => stream_select() };
}
echo f319($a, $o), ' ';
function f320($a, $o) {
  return match(true) { default => curl_exec() };
}
echo f320($a, $o), ' ';
function f321($a, $o) {
  return match(true) { default => strtoupper() };
}
echo f321($a, $o), ' ';
function f322($a, $o) {
  return strtoupper /*x*/ ( # y
 fopen
 (1));
}
echo f322($a, $o), ' ';
function f323($a, $o) {
  return strtoupper /*x*/ ( # y
 sleep
 (1));
}
echo f323($a, $o), ' ';
function f324($a, $o) {
  return strtoupper /*x*/ ( # y
 usleep
 (1));
}
echo f324($a, $o), ' ';
function f325($a, $o) {
  return strtoupper /*x*/ ( # y
 file_get_contents
 (1));
}
echo f325($a, $o), ' ';
function f326($a, $o) {
  return strtoupper /*x*/ ( # y
 stream_select
 (1));
}
echo f326($a, $o), ' ';
function f327($a, $o) {
  return strtoupper /*x*/ ( # y
 curl_exec
 (1));
}
echo f327($a, $o), ' ';
function f328($a, $o) {
  return strtoupper /*x*/ ( # y
 strtoupper
 (1));
}
echo f328($a, $o), ' ';
function f329($a, $o) {
  return (new class(fopen('q')) { function __construct(public $p) {} })->p;
}
echo f329($a, $o), ' ';
function f330($a, $o) {
  return (new class(sleep('q')) { function __construct(public $p) {} })->p;
}
echo f330($a, $o), ' ';
function f331($a, $o) {
  return (new class(usleep('q')) { function __construct(public $p) {} })->p;
}
echo f331($a, $o), ' ';
function f332($a, $o) {
  return (new class(file_get_contents('q')) { function __construct(public $p) {} })->p;
}
echo f332($a, $o), ' ';
function f333($a, $o) {
  return (new class(stream_select('q')) { function __construct(public $p) {} })->p;
}
echo f333($a, $o), ' ';
function f334($a, $o) {
  return (new class(curl_exec('q')) { function __construct(public $p) {} })->p;
}
echo f334($a, $o), ' ';
function f335($a, $o) {
  return (new class(strtoupper('q')) { function __construct(public $p) {} })->p;
}
echo f335($a, $o), ' ';
function f336($a, $o) {
  return $o->fopen() . fopen();
}
echo f336($a, $o), ' ';
function f337($a, $o) {
  return $o->sleep() . sleep();
}
echo f337($a, $o), ' ';
function f338($a, $o) {
  return $o->usleep() . usleep();
}
echo f338($a, $o), ' ';
function f339($a, $o) {
  return $o->file_get_contents() . file_get_contents();
}
echo f339($a, $o), ' ';
function f340($a, $o) {
  return $o->stream_select() . stream_select();
}
echo f340($a, $o), ' ';
function f341($a, $o) {
  return $o->curl_exec() . curl_exec();
}
echo f341($a, $o), ' ';
function f342($a, $o) {
  return $o->strtoupper() . strtoupper();
}
echo f342($a, $o), ' ';
function f343($a, $o) {
  return <<<X
{$a[fopen(1)]}
X;
}
echo f343($a, $o), ' ';
function f344($a, $o) {
  return <<<X
{$a[sleep(1)]}
X;
}
echo f344($a, $o), ' ';
function f345($a, $o) {
  return <<<X
{$a[usleep(1)]}
X;
}
echo f345($a, $o), ' ';
function f346($a, $o) {
  return <<<X
{$a[file_get_contents(1)]}
X;
}
echo f346($a, $o), ' ';
function f347($a, $o) {
  return <<<X
{$a[stream_select(1)]}
X;
}
echo f347($a, $o), ' ';
function f348($a, $o) {
  return <<<X
{$a[curl_exec(1)]}
X;
}
echo f348($a, $o), ' ';
function f349($a, $o) {
  return <<<X
{$a[strtoupper(1)]}
X;
}
echo f349($a, $o), ' ';
function f350($a, $o) {
  return fopen('a');
}
echo f350($a, $o), ' ';
function f351($a, $o) {
  return sleep('a');
}
echo f351($a, $o), ' ';
function f352($a, $o) {
  return usleep('a');
}
echo f352($a, $o), ' ';
function f353($a, $o) {
  return file_get_contents('a');
}
echo f353($a, $o), ' ';
function f354($a, $o) {
  return stream_select('a');
}
echo f354($a, $o), ' ';
function f355($a, $o) {
  return curl_exec('a');
}
echo f355($a, $o), ' ';
function f356($a, $o) {
  return strtoupper('a');
}
echo f356($a, $o), ' ';
function f357($a, $o) {
  return \fopen('a');
}
echo f357($a, $o), ' ';
function f358($a, $o) {
  return \sleep('a');
}
echo f358($a, $o), ' ';
function f359($a, $o) {
  return \usleep('a');
}
echo f359($a, $o), ' ';
function f360($a, $o) {
  return \file_get_contents('a');
}
echo f360($a, $o), ' ';
function f361($a, $o) {
  return \stream_select('a');
}
echo f361($a, $o), ' ';
function f362($a, $o) {
  return \curl_exec('a');
}
echo f362($a, $o), ' ';
function f363($a, $o) {
  return \strtoupper('a');
}
echo f363($a, $o), ' ';
function f364($a, $o) {
  return (fopen(...))('a');
}
echo f364($a, $o), ' ';
function f365($a, $o) {
  return (sleep(...))('a');
}
echo f365($a, $o), ' ';
function f366($a, $o) {
  return (usleep(...))('a');
}
echo f366($a, $o), ' ';
function f367($a, $o) {
  return (file_get_contents(...))('a');
}
echo f367($a, $o), ' ';
function f368($a, $o) {
  return (stream_select(...))('a');
}
echo f368($a, $o), ' ';
function f369($a, $o) {
  return (curl_exec(...))('a');
}
echo f369($a, $o), ' ';
function f370($a, $o) {
  return (strtoupper(...))('a');
}
echo f370($a, $o), ' ';
function f371($a, $o) {
  return [fopen('a'), "{$a[fopen()]}"][0];
}
echo f371($a, $o), ' ';
function f372($a, $o) {
  return [sleep('a'), "{$a[sleep()]}"][0];
}
echo f372($a, $o), ' ';
function f373($a, $o) {
  return [usleep('a'), "{$a[usleep()]}"][0];
}
echo f373($a, $o), ' ';
function f374($a, $o) {
  return [file_get_contents('a'), "{$a[file_get_contents()]}"][0];
}
echo f374($a, $o), ' ';
function f375($a, $o) {
  return [stream_select('a'), "{$a[stream_select()]}"][0];
}
echo f375($a, $o), ' ';
function f376($a, $o) {
  return [curl_exec('a'), "{$a[curl_exec()]}"][0];
}
echo f376($a, $o), ' ';
function f377($a, $o) {
  return [strtoupper('a'), "{$a[strtoupper()]}"][0];
}
echo f377($a, $o), ' ';
function f378($a, $o) {
  return (fn() => (function() { return fopen(); })())();
}
echo f378($a, $o), ' ';
function f379($a, $o) {
  return (fn() => (function() { return sleep(); })())();
}
echo f379($a, $o), ' ';
function f380($a, $o) {
  return (fn() => (function() { return usleep(); })())();
}
echo f380($a, $o), ' ';
function f381($a, $o) {
  return (fn() => (function() { return file_get_contents(); })())();
}
echo f381($a, $o), ' ';
function f382($a, $o) {
  return (fn() => (function() { return stream_select(); })())();
}
echo f382($a, $o), ' ';
function f383($a, $o) {
  return (fn() => (function() { return curl_exec(); })())();
}
echo f383($a, $o), ' ';
function f384($a, $o) {
  return (fn() => (function() { return strtoupper(); })())();
}
echo f384($a, $o), ' ';
function f385($a, $o) {
  return match(true) { default => fopen() };
}
echo f385($a, $o), ' ';
function f386($a, $o) {
  return match(true) { default => sleep() };
}
echo f386($a, $o), ' ';
function f387($a, $o) {
  return match(true) { default => usleep() };
}
echo f387($a, $o), ' ';
function f388($a, $o) {
  return match(true) { default => file_get_contents() };
}
echo f388($a, $o), ' ';
function f389($a, $o) {
  return match(true) { default => stream_select() };
}
echo f389($a, $o), ' ';
function f390($a, $o) {
  return match(true) { default => curl_exec() };
}
echo f390($a, $o), ' ';
function f391($a, $o) {
  return match(true) { default => strtoupper() };
}
echo f391($a, $o), ' ';
function f392($a, $o) {
  return strtoupper /*x*/ ( # y
 fopen
 (1));
}
echo f392($a, $o), ' ';
function f393($a, $o) {
  return strtoupper /*x*/ ( # y
 sleep
 (1));
}
echo f393($a, $o), ' ';
function f394($a, $o) {
  return strtoupper /*x*/ ( # y
 usleep
 (1));
}
echo f394($a, $o), ' ';
function f395($a, $o) {
  return strtoupper /*x*/ ( # y
 file_get_contents
 (1));
}
echo f395($a, $o), ' ';
function f396($a, $o) {
  return strtoupper /*x*/ ( # y
 stream_select
 (1));
}
echo f396($a, $o), ' ';
function f397($a, $o) {
  return strtoupper /*x*/ ( # y
 curl_exec
 (1));
}
echo f397($a, $o), ' ';
function f398($a, $o) {
  return strtoupper /*x*/ ( # y
 strtoupper
 (1));
}
echo f398($a, $o), ' ';
function f399($a, $o) {
  return (new class(fopen('q')) { function __construct(public $p) {} })->p;
}
echo f399($a, $o), ' ';
function f400($a, $o) {
  return (new class(sleep('q')) { function __construct(public $p) {} })->p;
}
echo f400($a, $o), ' ';
function f401($a, $o) {
  return (new class(usleep('q')) { function __construct(public $p) {} })->p;
}
echo f401($a, $o), ' ';
function f402($a, $o) {
  return (new class(file_get_contents('q')) { function __construct(public $p) {} })->p;
}
echo f402($a, $o), ' ';
function f403($a, $o) {
  return (new class(stream_select('q')) { function __construct(public $p) {} })->p;
}
echo f403($a, $o), ' ';
function f404($a, $o) {
  return (new class(curl_exec('q')) { function __construct(public $p) {} })->p;
}
echo f404($a, $o), ' ';
function f405($a, $o) {
  return (new class(strtoupper('q')) { function __construct(public $p) {} })->p;
}
echo f405($a, $o), ' ';
function f406($a, $o) {
  return $o->fopen() . fopen();
}
echo f406($a, $o), ' ';
function f407($a, $o) {
  return $o->sleep() . sleep();
}
echo f407($a, $o), ' ';
function f408($a, $o) {
  return $o->usleep() . usleep();
}
echo f408($a, $o), ' ';
function f409($a, $o) {
  return $o->file_get_contents() . file_get_contents();
}
echo f409($a, $o), ' ';
function f410($a, $o) {
  return $o->stream_select() . stream_select();
}
echo f410($a, $o), ' ';
function f411($a, $o) {
  return $o->curl_exec() . curl_exec();
}
echo f411($a, $o), ' ';
function f412($a, $o) {
  return $o->strtoupper() . strtoupper();
}
echo f412($a, $o), ' ';
function f413($a, $o) {
  return <<<X
{$a[fopen(1)]}
X;
}
echo f413($a, $o), ' ';
function f414($a, $o) {
  return <<<X
{$a[sleep(1)]}
X;
}
echo f414($a, $o), ' ';
function f415($a, $o) {
  return <<<X
{$a[usleep(1)]}
X;
}
echo f415($a, $o), ' ';
function f416($a, $o) {
  return <<<X
{$a[file_get_contents(1)]}
X;
}
echo f416($a, $o), ' ';
function f417($a, $o) {
  return <<<X
{$a[stream_select(1)]}
X;
}
echo f417($a, $o), ' ';
function f418($a, $o) {
  return <<<X
{$a[curl_exec(1)]}
X;
}
echo f418($a, $o), ' ';
function f419($a, $o) {
  return <<<X
{$a[strtoupper(1)]}
X;
}
echo f419($a, $o), ' ';
function f420($a, $o) {
  return fopen('a');
}
echo f420($a, $o), ' ';
function f421($a, $o) {
  return sleep('a');
}
echo f421($a, $o), ' ';
function f422($a, $o) {
  return usleep('a');
}
echo f422($a, $o), ' ';
function f423($a, $o) {
  return file_get_contents('a');
}
echo f423($a, $o), ' ';
function f424($a, $o) {
  return stream_select('a');
}
echo f424($a, $o), ' ';
function f425($a, $o) {
  return curl_exec('a');
}
echo f425($a, $o), ' ';
function f426($a, $o) {
  return strtoupper('a');
}
echo f426($a, $o), ' ';
function f427($a, $o) {
  return \fopen('a');
}
echo f427($a, $o), ' ';
function f428($a, $o) {
  return \sleep('a');
}
echo f428($a, $o), ' ';
function f429($a, $o) {
  return \usleep('a');
}
echo f429($a, $o), ' ';
function f430($a, $o) {
  return \file_get_contents('a');
}
echo f430($a, $o), ' ';
function f431($a, $o) {
  return \stream_select('a');
}
echo f431($a, $o), ' ';
function f432($a, $o) {
  return \curl_exec('a');
}
echo f432($a, $o), ' ';
function f433($a, $o) {
  return \strtoupper('a');
}
echo f433($a, $o), ' ';
function f434($a, $o) {
  return (fopen(...))('a');
}
echo f434($a, $o), ' ';
function f435($a, $o) {
  return (sleep(...))('a');
}
echo f435($a, $o), ' ';
function f436($a, $o) {
  return (usleep(...))('a');
}
echo f436($a, $o), ' ';
function f437($a, $o) {
  return (file_get_contents(...))('a');
}
echo f437($a, $o), ' ';
function f438($a, $o) {
  return (stream_select(...))('a');
}
echo f438($a, $o), ' ';
function f439($a, $o) {
  return (curl_exec(...))('a');
}
echo f439($a, $o), ' ';
function f440($a, $o) {
  return (strtoupper(...))('a');
}
echo f440($a, $o), ' ';
function f441($a, $o) {
  return [fopen('a'), "{$a[fopen()]}"][0];
}
echo f441($a, $o), ' ';
function f442($a, $o) {
  return [sleep('a'), "{$a[sleep()]}"][0];
}
echo f442($a, $o), ' ';
function f443($a, $o) {
  return [usleep('a'), "{$a[usleep()]}"][0];
}
echo f443($a, $o), ' ';
function f444($a, $o) {
  return [file_get_contents('a'), "{$a[file_get_contents()]}"][0];
}
echo f444($a, $o), ' ';
function f445($a, $o) {
  return [stream_select('a'), "{$a[stream_select()]}"][0];
}
echo f445($a, $o), ' ';
function f446($a, $o) {
  return [curl_exec('a'), "{$a[curl_exec()]}"][0];
}
echo f446($a, $o), ' ';
function f447($a, $o) {
  return [strtoupper('a'), "{$a[strtoupper()]}"][0];
}
echo f447($a, $o), ' ';
function f448($a, $o) {
  return (fn() => (function() { return fopen(); })())();
}
echo f448($a, $o), ' ';
function f449($a, $o) {
  return (fn() => (function() { return sleep(); })())();
}
echo f449($a, $o), ' ';
function f450($a, $o) {
  return (fn() => (function() { return usleep(); })())();
}
echo f450($a, $o), ' ';
function f451($a, $o) {
  return (fn() => (function() { return file_get_contents(); })())();
}
echo f451($a, $o), ' ';
function f452($a, $o) {
  return (fn() => (function() { return stream_select(); })())();
}
echo f452($a, $o), ' ';
function f453($a, $o) {
  return (fn() => (function() { return curl_exec(); })())();
}
echo f453($a, $o), ' ';
function f454($a, $o) {
  return (fn() => (function() { return strtoupper(); })())();
}
echo f454($a, $o), ' ';
function f455($a, $o) {
  return match(true) { default => fopen() };
}
echo f455($a, $o), ' ';
function f456($a, $o) {
  return match(true) { default => sleep() };
}
echo f456($a, $o), ' ';
function f457($a, $o) {
  return match(true) { default => usleep() };
}
echo f457($a, $o), ' ';
function f458($a, $o) {
  return match(true) { default => file_get_contents() };
}
echo f458($a, $o), ' ';
function f459($a, $o) {
  return match(true) { default => stream_select() };
}
echo f459($a, $o), ' ';
function f460($a, $o) {
  return match(true) { default => curl_exec() };
}
echo f460($a, $o), ' ';
function f461($a, $o) {
  return match(true) { default => strtoupper() };
}
echo f461($a, $o), ' ';
function f462($a, $o) {
  return strtoupper /*x*/ ( # y
 fopen
 (1));
}
echo f462($a, $o), ' ';
function f463($a, $o) {
  return strtoupper /*x*/ ( # y
 sleep
 (1));
}
echo f463($a, $o), ' ';
function f464($a, $o) {
  return strtoupper /*x*/ ( # y
 usleep
 (1));
}
echo f464($a, $o), ' ';
function f465($a, $o) {
  return strtoupper /*x*/ ( # y
 file_get_contents
 (1));
}
echo f465($a, $o), ' ';
function f466($a, $o) {
  return strtoupper /*x*/ ( # y
 stream_select
 (1));
}
echo f466($a, $o), ' ';
function f467($a, $o) {
  return strtoupper /*x*/ ( # y
 curl_exec
 (1));
}
echo f467($a, $o), ' ';
function f468($a, $o) {
  return strtoupper /*x*/ ( # y
 strtoupper
 (1));
}
echo f468($a, $o), ' ';
function f469($a, $o) {
  return (new class(fopen('q')) { function __construct(public $p) {} })->p;
}
echo f469($a, $o), ' ';
function f470($a, $o) {
  return (new class(sleep('q')) { function __construct(public $p) {} })->p;
}
echo f470($a, $o), ' ';
function f471($a, $o) {
  return (new class(usleep('q')) { function __construct(public $p) {} })->p;
}
echo f471($a, $o), ' ';
function f472($a, $o) {
  return (new class(file_get_contents('q')) { function __construct(public $p) {} })->p;
}
echo f472($a, $o), ' ';
function f473($a, $o) {
  return (new class(stream_select('q')) { function __construct(public $p) {} })->p;
}
echo f473($a, $o), ' ';
function f474($a, $o) {
  return (new class(curl_exec('q')) { function __construct(public $p) {} })->p;
}
echo f474($a, $o), ' ';
function f475($a, $o) {
  return (new class(strtoupper('q')) { function __construct(public $p) {} })->p;
}
echo f475($a, $o), ' ';
function f476($a, $o) {
  return $o->fopen() . fopen();
}
echo f476($a, $o), ' ';
function f477($a, $o) {
  return $o->sleep() . sleep();
}
echo f477($a, $o), ' ';
function f478($a, $o) {
  return $o->usleep() . usleep();
}
echo f478($a, $o), ' ';
function f479($a, $o) {
  return $o->file_get_contents() . file_get_contents();
}
echo f479($a, $o), ' ';
function f480($a, $o) {
  return $o->stream_select() . stream_select();
}
echo f480($a, $o), ' ';
function f481($a, $o) {
  return $o->curl_exec() . curl_exec();
}
echo f481($a, $o), ' ';
function f482($a, $o) {
  return $o->strtoupper() . strtoupper();
}
echo f482($a, $o), ' ';
function f483($a, $o) {
  return <<<X
{$a[fopen(1)]}
X;
}
echo f483($a, $o), ' ';
function f484($a, $o) {
  return <<<X
{$a[sleep(1)]}
X;
}
echo f484($a, $o), ' ';
function f485($a, $o) {
  return <<<X
{$a[usleep(1)]}
X;
}
echo f485($a, $o), ' ';
function f486($a, $o) {
  return <<<X
{$a[file_get_contents(1)]}
X;
}
echo f486($a, $o), ' ';
function f487($a, $o) {
  return <<<X
{$a[stream_select(1)]}
X;
}
echo f487($a, $o), ' ';
function f488($a, $o) {
  return <<<X
{$a[curl_exec(1)]}
X;
}
echo f488($a, $o), ' ';
function f489($a, $o) {
  return <<<X
{$a[strtoupper(1)]}
X;
}
echo f489($a, $o), ' ';
function f490($a, $o) {
  return fopen('a');
}
echo f490($a, $o), ' ';
function f491($a, $o) {
  return sleep('a');
}
echo f491($a, $o), ' ';
function f492($a, $o) {
  return usleep('a');
}
echo f492($a, $o), ' ';
function f493($a, $o) {
  return file_get_contents('a');
}
echo f493($a, $o), ' ';
function f494($a, $o) {
  return stream_select('a');
}
echo f494($a, $o), ' ';
function f495($a, $o) {
  return curl_exec('a');
}
echo f495($a, $o), ' ';
function f496($a, $o) {
  return strtoupper('a');
}
echo f496($a, $o), ' ';
function f497($a, $o) {
  return \fopen('a');
}
echo f497($a, $o), ' ';
function f498($a, $o) {
  return \sleep('a');
}
echo f498($a, $o), ' ';
function f499($a, $o) {
  return \usleep('a');
}
echo f499($a, $o), ' ';
function f500($a, $o) {
  return \file_get_contents('a');
}
echo f500($a, $o), ' ';
function f501($a, $o) {
  return \stream_select('a');
}
echo f501($a, $o), ' ';
function f502($a, $o) {
  return \curl_exec('a');
}
echo f502($a, $o), ' ';
function f503($a, $o) {
  return \strtoupper('a');
}
echo f503($a, $o), ' ';
function f504($a, $o) {
  return (fopen(...))('a');
}
echo f504($a, $o), ' ';
function f505($a, $o) {
  return (sleep(...))('a');
}
echo f505($a, $o), ' ';
function f506($a, $o) {
  return (usleep(...))('a');
}
echo f506($a, $o), ' ';
function f507($a, $o) {
  return (file_get_contents(...))('a');
}
echo f507($a, $o), ' ';
function f508($a, $o) {
  return (stream_select(...))('a');
}
echo f508($a, $o), ' ';
function f509($a, $o) {
  return (curl_exec(...))('a');
}
echo f509($a, $o), ' ';
function f510($a, $o) {
  return (strtoupper(...))('a');
}
echo f510($a, $o), ' ';
function f511($a, $o) {
  return [fopen('a'), "{$a[fopen()]}"][0];
}
echo f511($a, $o), ' ';
function f512($a, $o) {
  return [sleep('a'), "{$a[sleep()]}"][0];
}
echo f512($a, $o), ' ';
function f513($a, $o) {
  return [usleep('a'), "{$a[usleep()]}"][0];
}
echo f513($a, $o), ' ';
function f514($a, $o) {
  return [file_get_contents('a'), "{$a[file_get_contents()]}"][0];
}
echo f514($a, $o), ' ';
function f515($a, $o) {
  return [stream_select('a'), "{$a[stream_select()]}"][0];
}
echo f515($a, $o), ' ';
function f516($a, $o) {
  return [curl_exec('a'), "{$a[curl_exec()]}"][0];
}
echo f516($a, $o), ' ';
function f517($a, $o) {
  return [strtoupper('a'), "{$a[strtoupper()]}"][0];
}
echo f517($a, $o), ' ';
function f518($a, $o) {
  return (fn() => (function() { return fopen(); })())();
}
echo f518($a, $o), ' ';
function f519($a, $o) {
  return (fn() => (function() { return sleep(); })())();
}
echo f519($a, $o), ' ';
function f520($a, $o) {
  return (fn() => (function() { return usleep(); })())();
}
echo f520($a, $o), ' ';
function f521($a, $o) {
  return (fn() => (function() { return file_get_contents(); })())();
}
echo f521($a, $o), ' ';
function f522($a, $o) {
  return (fn() => (function() { return stream_select(); })())();
}
echo f522($a, $o), ' ';
function f523($a, $o) {
  return (fn() => (function() { return curl_exec(); })())();
}
echo f523($a, $o), ' ';
function f524($a, $o) {
  return (fn() => (function() { return strtoupper(); })())();
}
echo f524($a, $o), ' ';
function f525($a, $o) {
  return match(true) { default => fopen() };
}
echo f525($a, $o), ' ';
function f526($a, $o) {
  return match(true) { default => sleep() };
}
echo f526($a, $o), ' ';
function f527($a, $o) {
  return match(true) { default => usleep() };
}
echo f527($a, $o), ' ';
function f528($a, $o) {
  return match(true) { default => file_get_contents() };
}
echo f528($a, $o), ' ';
function f529($a, $o) {
  return match(true) { default => stream_select() };
}
echo f529($a, $o), ' ';
function f530($a, $o) {
  return match(true) { default => curl_exec() };
}
echo f530($a, $o), ' ';
function f531($a, $o) {
  return match(true) { default => strtoupper() };
}
echo f531($a, $o), ' ';
function f532($a, $o) {
  return strtoupper /*x*/ ( # y
 fopen
 (1));
}
echo f532($a, $o), ' ';
function f533($a, $o) {
  return strtoupper /*x*/ ( # y
 sleep
 (1));
}
echo f533($a, $o), ' ';
function f534($a, $o) {
  return strtoupper /*x*/ ( # y
 usleep
 (1));
}
echo f534($a, $o), ' ';
function f535($a, $o) {
  return strtoupper /*x*/ ( # y
 file_get_contents
 (1));
}
echo f535($a, $o), ' ';
function f536($a, $o) {
  return strtoupper /*x*/ ( # y
 stream_select
 (1));
}
echo f536($a, $o), ' ';
function f537($a, $o) {
  return strtoupper /*x*/ ( # y
 curl_exec
 (1));
}
echo f537($a, $o), ' ';
function f538($a, $o) {
  return strtoupper /*x*/ ( # y
 strtoupper
 (1));
}
echo f538($a, $o), ' ';
function f539($a, $o) {
  return (new class(fopen('q')) { function __construct(public $p) {} })->p;
}
echo f539($a, $o), ' ';
function f540($a, $o) {
  return (new class(sleep('q')) { function __construct(public $p) {} })->p;
}
echo f540($a, $o), ' ';
function f541($a, $o) {
  return (new class(usleep('q')) { function __construct(public $p) {} })->p;
}
echo f541($a, $o), ' ';
function f542($a, $o) {
  return (new class(file_get_contents('q')) { function __construct(public $p) {} })->p;
}
echo f542($a, $o), ' ';
function f543($a, $o) {
  return (new class(stream_select('q')) { function __construct(public $p) {} })->p;
}
echo f543($a, $o), ' ';
function f544($a, $o) {
  return (new class(curl_exec('q')) { function __construct(public $p) {} })->p;
}
echo f544($a, $o), ' ';
function f545($a, $o) {
  return (new class(strtoupper('q')) { function __construct(public $p) {} })->p;
}
echo f545($a, $o), ' ';
function f546($a, $o) {
  return $o->fopen() . fopen();
}
echo f546($a, $o), ' ';
function f547($a, $o) {
  return $o->sleep() . sleep();
}
echo f547($a, $o), ' ';
function f548($a, $o) {
  return $o->usleep() . usleep();
}
echo f548($a, $o), ' ';
function f549($a, $o) {
  return $o->file_get_contents() . file_get_contents();
}
echo f549($a, $o), ' ';
function f550($a, $o) {
  return $o->stream_select() . stream_select();
}
echo f550($a, $o), ' ';
function f551($a, $o) {
  return $o->curl_exec() . curl_exec();
}
echo f551($a, $o), ' ';
function f552($a, $o) {
  return $o->strtoupper() . strtoupper();
}
echo f552($a, $o), ' ';
function f553($a, $o) {
  return <<<X
{$a[fopen(1)]}
X;
}
echo f553($a, $o), ' ';
function f554($a, $o) {
  return <<<X
{$a[sleep(1)]}
X;
}
echo f554($a, $o), ' ';
function f555($a, $o) {
  return <<<X
{$a[usleep(1)]}
X;
}
echo f555($a, $o), ' ';
function f556($a, $o) {
  return <<<X
{$a[file_get_contents(1)]}
X;
}
echo f556($a, $o), ' ';
function f557($a, $o) {
  return <<<X
{$a[stream_select(1)]}
X;
}
echo f557($a, $o), ' ';
function f558($a, $o) {
  return <<<X
{$a[curl_exec(1)]}
X;
}
echo f558($a, $o), ' ';
function f559($a, $o) {
  return <<<X
{$a[strtoupper(1)]}
X;
}
echo f559($a, $o), ' ';
function f560($a, $o) {
  return fopen('a');
}
echo f560($a, $o), ' ';
function f561($a, $o) {
  return sleep('a');
}
echo f561($a, $o), ' ';
function f562($a, $o) {
  return usleep('a');
}
echo f562($a, $o), ' ';
function f563($a, $o) {
  return file_get_contents('a');
}
echo f563($a, $o), ' ';
function f564($a, $o) {
  return stream_select('a');
}
echo f564($a, $o), ' ';
function f565($a, $o) {
  return curl_exec('a');
}
echo f565($a, $o), ' ';
function f566($a, $o) {
  return strtoupper('a');
}
echo f566($a, $o), ' ';
function f567($a, $o) {
  return \fopen('a');
}
echo f567($a, $o), ' ';
function f568($a, $o) {
  return \sleep('a');
}
echo f568($a, $o), ' ';
function f569($a, $o) {
  return \usleep('a');
}
echo f569($a, $o), ' ';
function f570($a, $o) {
  return \file_get_contents('a');
}
echo f570($a, $o), ' ';
function f571($a, $o) {
  return \stream_select('a');
}
echo f571($a, $o), ' ';
function f572($a, $o) {
  return \curl_exec('a');
}
echo f572($a, $o), ' ';
function f573($a, $o) {
  return \strtoupper('a');
}
echo f573($a, $o), ' ';
function f574($a, $o) {
  return (fopen(...))('a');
}
echo f574($a, $o), ' ';
function f575($a, $o) {
  return (sleep(...))('a');
}
echo f575($a, $o), ' ';
function f576($a, $o) {
  return (usleep(...))('a');
}
echo f576($a, $o), ' ';
function f577($a, $o) {
  return (file_get_contents(...))('a');
}
echo f577($a, $o), ' ';
function f578($a, $o) {
  return (stream_select(...))('a');
}
echo f578($a, $o), ' ';
function f579($a, $o) {
  return (curl_exec(...))('a');
}
echo f579($a, $o), ' ';
function f580($a, $o) {
  return (strtoupper(...))('a');
}
echo f580($a, $o), ' ';
function f581($a, $o) {
  return [fopen('a'), "{$a[fopen()]}"][0];
}
echo f581($a, $o), ' ';
function f582($a, $o) {
  return [sleep('a'), "{$a[sleep()]}"][0];
}
echo f582($a, $o), ' ';
function f583($a, $o) {
  return [usleep('a'), "{$a[usleep()]}"][0];
}
echo f583($a, $o), ' ';
function f584($a, $o) {
  return [file_get_contents('a'), "{$a[file_get_contents()]}"][0];
}
echo f584($a, $o), ' ';
function f585($a, $o) {
  return [stream_select('a'), "{$a[stream_select()]}"][0];
}
echo f585($a, $o), ' ';
function f586($a, $o) {
  return [curl_exec('a'), "{$a[curl_exec()]}"][0];
}
echo f586($a, $o), ' ';
function f587($a, $o) {
  return [strtoupper('a'), "{$a[strtoupper()]}"][0];
}
echo f587($a, $o), ' ';
function f588($a, $o) {
  return (fn() => (function() { return fopen(); })())();
}
echo f588($a, $o), ' ';
function f589($a, $o) {
  return (fn() => (function() { return sleep(); })())();
}
echo f589($a, $o), ' ';
function f590($a, $o) {
  return (fn() => (function() { return usleep(); })())();
}
echo f590($a, $o), ' ';
function f591($a, $o) {
  return (fn() => (function() { return file_get_contents(); })())();
}
echo f591($a, $o), ' ';
function f592($a, $o) {
  return (fn() => (function() { return stream_select(); })())();
}
echo f592($a, $o), ' ';
function f593($a, $o) {
  return (fn() => (function() { return curl_exec(); })())();
}
echo f593($a, $o), ' ';
function f594($a, $o) {
  return (fn() => (function() { return strtoupper(); })())();
}
echo f594($a, $o), ' ';
function f595($a, $o) {
  return match(true) { default => fopen() };
}
echo f595($a, $o), ' ';
function f596($a, $o) {
  return match(true) { default => sleep() };
}
echo f596($a, $o), ' ';
function f597($a, $o) {
  return match(true) { default => usleep() };
}
echo f597($a, $o), ' ';
function f598($a, $o) {
  return match(true) { default => file_get_contents() };
}
echo f598($a, $o), ' ';
function f599($a, $o) {
  return match(true) { default => stream_select() };
}
echo f599($a, $o), ' ';
function f600($a, $o) {
  return match(true) { default => curl_exec() };
}
echo f600($a, $o), ' ';
function f601($a, $o) {
  return match(true) { default => strtoupper() };
}
echo f601($a, $o), ' ';
function f602($a, $o) {
  return strtoupper /*x*/ ( # y
 fopen
 (1));
}
echo f602($a, $o), ' ';
function f603($a, $o) {
  return strtoupper /*x*/ ( # y
 sleep
 (1));
}
echo f603($a, $o), ' ';
function f604($a, $o) {
  return strtoupper /*x*/ ( # y
 usleep
 (1));
}
echo f604($a, $o), ' ';
function f605($a, $o) {
  return strtoupper /*x*/ ( # y
 file_get_contents
 (1));
}
echo f605($a, $o), ' ';
function f606($a, $o) {
  return strtoupper /*x*/ ( # y
 stream_select
 (1));
}
echo f606($a, $o), ' ';
function f607($a, $o) {
  return strtoupper /*x*/ ( # y
 curl_exec
 (1));
}
echo f607($a, $o), ' ';
function f608($a, $o) {
  return strtoupper /*x*/ ( # y
 strtoupper
 (1));
}
echo f608($a, $o), ' ';
function f609($a, $o) {
  return (new class(fopen('q')) { function __construct(public $p) {} })->p;
}
echo f609($a, $o), ' ';
function f610($a, $o) {
  return (new class(sleep('q')) { function __construct(public $p) {} })->p;
}
echo f610($a, $o), ' ';
function f611($a, $o) {
  return (new class(usleep('q')) { function __construct(public $p) {} })->p;
}
echo f611($a, $o), ' ';
function f612($a, $o) {
  return (new class(file_get_contents('q')) { function __construct(public $p) {} })->p;
}
echo f612($a, $o), ' ';
function f613($a, $o) {
  return (new class(stream_select('q')) { function __construct(public $p) {} })->p;
}
echo f613($a, $o), ' ';
function f614($a, $o) {
  return (new class(curl_exec('q')) { function __construct(public $p) {} })->p;
}
echo f614($a, $o), ' ';
function f615($a, $o) {
  return (new class(strtoupper('q')) { function __construct(public $p) {} })->p;
}
echo f615($a, $o), ' ';
function f616($a, $o) {
  return $o->fopen() . fopen();
}
echo f616($a, $o), ' ';
function f617($a, $o) {
  return $o->sleep() . sleep();
}
echo f617($a, $o), ' ';
function f618($a, $o) {
  return $o->usleep() . usleep();
}
echo f618($a, $o), ' ';
function f619($a, $o) {
  return $o->file_get_contents() . file_get_contents();
}
echo f619($a, $o), ' ';
function f620($a, $o) {
  return $o->stream_select() . stream_select();
}
echo f620($a, $o), ' ';
function f621($a, $o) {
  return $o->curl_exec() . curl_exec();
}
echo f621($a, $o), ' ';
function f622($a, $o) {
  return $o->strtoupper() . strtoupper();
}
echo f622($a, $o), ' ';
function f623($a, $o) {
  return <<<X
{$a[fopen(1)]}
X;
}
echo f623($a, $o), ' ';
function f624($a, $o) {
  return <<<X
{$a[sleep(1)]}
X;
}
echo f624($a, $o), ' ';
function f625($a, $o) {
  return <<<X
{$a[usleep(1)]}
X;
}
echo f625($a, $o), ' ';
function f626($a, $o) {
  return <<<X
{$a[file_get_contents(1)]}
X;
}
echo f626($a, $o), ' ';
function f627($a, $o) {
  return <<<X
{$a[stream_select(1)]}
X;
}
echo f627($a, $o), ' ';
function f628($a, $o) {
  return <<<X
{$a[curl_exec(1)]}
X;
}
echo f628($a, $o), ' ';
function f629($a, $o) {
  return <<<X
{$a[strtoupper(1)]}
X;
}
echo f629($a, $o), ' ';
function f630($a, $o) {
  return fopen('a');
}
echo f630($a, $o), ' ';
function f631($a, $o) {
  return sleep('a');
}
echo f631($a, $o), ' ';
function f632($a, $o) {
  return usleep('a');
}
echo f632($a, $o), ' ';
function f633($a, $o) {
  return file_get_contents('a');
}
echo f633($a, $o), ' ';
function f634($a, $o) {
  return stream_select('a');
}
echo f634($a, $o), ' ';
function f635($a, $o) {
  return curl_exec('a');
}
echo f635($a, $o), ' ';
function f636($a, $o) {
  return strtoupper('a');
}
echo f636($a, $o), ' ';
function f637($a, $o) {
  return \fopen('a');
}
echo f637($a, $o), ' ';
function f638($a, $o) {
  return \sleep('a');
}
echo f638($a, $o), ' ';
function f639($a, $o) {
  return \usleep('a');
}
echo f639($a, $o), ' ';
function f640($a, $o) {
  return \file_get_contents('a');
}
echo f640($a, $o), ' ';
function f641($a, $o) {
  return \stream_select('a');
}
echo f641($a, $o), ' ';
function f642($a, $o) {
  return \curl_exec('a');
}
echo f642($a, $o), ' ';
function f643($a, $o) {
  return \strtoupper('a');
}
echo f643($a, $o), ' ';
function f644($a, $o) {
  return (fopen(...))('a');
}
echo f644($a, $o), ' ';
function f645($a, $o) {
  return (sleep(...))('a');
}
echo f645($a, $o), ' ';
function f646($a, $o) {
  return (usleep(...))('a');
}
echo f646($a, $o), ' ';
function f647($a, $o) {
  return (file_get_contents(...))('a');
}
echo f647($a, $o), ' ';
function f648($a, $o) {
  return (stream_select(...))('a');
}
echo f648($a, $o), ' ';
function f649($a, $o) {
  return (curl_exec(...))('a');
}
echo f649($a, $o), ' ';
function f650($a, $o) {
  return (strtoupper(...))('a');
}
echo f650($a, $o), ' ';
function f651($a, $o) {
  return [fopen('a'), "{$a[fopen()]}"][0];
}
echo f651($a, $o), ' ';
function f652($a, $o) {
  return [sleep('a'), "{$a[sleep()]}"][0];
}
echo f652($a, $o), ' ';
function f653($a, $o) {
  return [usleep('a'), "{$a[usleep()]}"][0];
}
echo f653($a, $o), ' ';
function f654($a, $o) {
  return [file_get_contents('a'), "{$a[file_get_contents()]}"][0];
}
echo f654($a, $o), ' ';
function f655($a, $o) {
  return [stream_select('a'), "{$a[stream_select()]}"][0];
}
echo f655($a, $o), ' ';
function f656($a, $o) {
  return [curl_exec('a'), "{$a[curl_exec()]}"][0];
}
echo f656($a, $o), ' ';
function f657($a, $o) {
  return [strtoupper('a'), "{$a[strtoupper()]}"][0];
}
echo f657($a, $o), ' ';
function f658($a, $o) {
  return (fn() => (function() { return fopen(); })())();
}
echo f658($a, $o), ' ';
function f659($a, $o) {
  return (fn() => (function() { return sleep(); })())();
}
echo f659($a, $o), ' ';
function f660($a, $o) {
  return (fn() => (function() { return usleep(); })())();
}
echo f660($a, $o), ' ';
function f661($a, $o) {
  return (fn() => (function() { return file_get_contents(); })())();
}
echo f661($a, $o), ' ';
function f662($a, $o) {
  return (fn() => (function() { return stream_select(); })())();
}
echo f662($a, $o), ' ';
function f663($a, $o) {
  return (fn() => (function() { return curl_exec(); })())();
}
echo f663($a, $o), ' ';
function f664($a, $o) {
  return (fn() => (function() { return strtoupper(); })())();
}
echo f664($a, $o), ' ';
function f665($a, $o) {
  return match(true) { default => fopen() };
}
echo f665($a, $o), ' ';
function f666($a, $o) {
  return match(true) { default => sleep() };
}
echo f666($a, $o), ' ';
function f667($a, $o) {
  return match(true) { default => usleep() };
}
echo f667($a, $o), ' ';
function f668($a, $o) {
  return match(true) { default => file_get_contents() };
}
echo f668($a, $o), ' ';
function f669($a, $o) {
  return match(true) { default => stream_select() };
}
echo f669($a, $o), ' ';
function f670($a, $o) {
  return match(true) { default => curl_exec() };
}
echo f670($a, $o), ' ';
function f671($a, $o) {
  return match(true) { default => strtoupper() };
}
echo f671($a, $o), ' ';
function f672($a, $o) {
  return strtoupper /*x*/ ( # y
 fopen
 (1));
}
echo f672($a, $o), ' ';
function f673($a, $o) {
  return strtoupper /*x*/ ( # y
 sleep
 (1));
}
echo f673($a, $o), ' ';
function f674($a, $o) {
  return strtoupper /*x*/ ( # y
 usleep
 (1));
}
echo f674($a, $o), ' ';
function f675($a, $o) {
  return strtoupper /*x*/ ( # y
 file_get_contents
 (1));
}
echo f675($a, $o), ' ';
function f676($a, $o) {
  return strtoupper /*x*/ ( # y
 stream_select
 (1));
}
echo f676($a, $o), ' ';
function f677($a, $o) {
  return strtoupper /*x*/ ( # y
 curl_exec
 (1));
}
echo f677($a, $o), ' ';
function f678($a, $o) {
  return strtoupper /*x*/ ( # y
 strtoupper
 (1));
}
echo f678($a, $o), ' ';
function f679($a, $o) {
  return (new class(fopen('q')) { function __construct(public $p) {} })->p;
}
echo f679($a, $o), ' ';
function f680($a, $o) {
  return (new class(sleep('q')) { function __construct(public $p) {} })->p;
}
echo f680($a, $o), ' ';
function f681($a, $o) {
  return (new class(usleep('q')) { function __construct(public $p) {} })->p;
}
echo f681($a, $o), ' ';
function f682($a, $o) {
  return (new class(file_get_contents('q')) { function __construct(public $p) {} })->p;
}
echo f682($a, $o), ' ';
function f683($a, $o) {
  return (new class(stream_select('q')) { function __construct(public $p) {} })->p;
}
echo f683($a, $o), ' ';
function f684($a, $o) {
  return (new class(curl_exec('q')) { function __construct(public $p) {} })->p;
}
echo f684($a, $o), ' ';
function f685($a, $o) {
  return (new class(strtoupper('q')) { function __construct(public $p) {} })->p;
}
echo f685($a, $o), ' ';
function f686($a, $o) {
  return $o->fopen() . fopen();
}
echo f686($a, $o), ' ';
function f687($a, $o) {
  return $o->sleep() . sleep();
}
echo f687($a, $o), ' ';
function f688($a, $o) {
  return $o->usleep() . usleep();
}
echo f688($a, $o), ' ';
function f689($a, $o) {
  return $o->file_get_contents() . file_get_contents();
}
echo f689($a, $o), ' ';
function f690($a, $o) {
  return $o->stream_select() . stream_select();
}
echo f690($a, $o), ' ';
function f691($a, $o) {
  return $o->curl_exec() . curl_exec();
}
echo f691($a, $o), ' ';
function f692($a, $o) {
  return $o->strtoupper() . strtoupper();
}
echo f692($a, $o), ' ';
function f693($a, $o) {
  return <<<X
{$a[fopen(1)]}
X;
}
echo f693($a, $o), ' ';
function f694($a, $o) {
  return <<<X
{$a[sleep(1)]}
X;
}
echo f694($a, $o), ' ';
function f695($a, $o) {
  return <<<X
{$a[usleep(1)]}
X;
}
echo f695($a, $o), ' ';
function f696($a, $o) {
  return <<<X
{$a[file_get_contents(1)]}
X;
}
echo f696($a, $o), ' ';
function f697($a, $o) {
  return <<<X
{$a[stream_select(1)]}
X;
}
echo f697($a, $o), ' ';
function f698($a, $o) {
  return <<<X
{$a[curl_exec(1)]}
X;
}
echo f698($a, $o), ' ';
function f699($a, $o) {
  return <<<X
{$a[strtoupper(1)]}
X;
}
echo f699($a, $o), ' ';
function f700($a, $o) {
  return fopen('a');
}
echo f700($a, $o), ' ';
function f701($a, $o) {
  return sleep('a');
}
echo f701($a, $o), ' ';
function f702($a, $o) {
  return usleep('a');
}
echo f702($a, $o), ' ';
function f703($a, $o) {
  return file_get_contents('a');
}
echo f703($a, $o), ' ';
function f704($a, $o) {
  return stream_select('a');
}
echo f704($a, $o), ' ';
function f705($a, $o) {
  return curl_exec('a');
}
echo f705($a, $o), ' ';
function f706($a, $o) {
  return strtoupper('a');
}
echo f706($a, $o), ' ';
function f707($a, $o) {
  return \fopen('a');
}
echo f707($a, $o), ' ';
function f708($a, $o) {
  return \sleep('a');
}
echo f708($a, $o), ' ';
function f709($a, $o) {
  return \usleep('a');
}
echo f709($a, $o), ' ';
function f710($a, $o) {
  return \file_get_contents('a');
}
echo f710($a, $o), ' ';
function f711($a, $o) {
  return \stream_select('a');
}
echo f711($a, $o), ' ';
function f712($a, $o) {
  return \curl_exec('a');
}
echo f712($a, $o), ' ';
function f713($a, $o) {
  return \strtoupper('a');
}
echo f713($a, $o), ' ';
function f714($a, $o) {
  return (fopen(...))('a');
}
echo f714($a, $o), ' ';
function f715($a, $o) {
  return (sleep(...))('a');
}
echo f715($a, $o), ' ';
function f716($a, $o) {
  return (usleep(...))('a');
}
echo f716($a, $o), ' ';
function f717($a, $o) {
  return (file_get_contents(...))('a');
}
echo f717($a, $o), ' ';
function f718($a, $o) {
  return (stream_select(...))('a');
}
echo f718($a, $o), ' ';
function f719($a, $o) {
  return (curl_exec(...))('a');
}
echo f719($a, $o), ' ';
function f720($a, $o) {
  return (strtoupper(...))('a');
}
echo f720($a, $o), ' ';
function f721($a, $o) {
  return [fopen('a'), "{$a[fopen()]}"][0];
}
echo f721($a, $o), ' ';
function f722($a, $o) {
  return [sleep('a'), "{$a[sleep()]}"][0];
}
echo f722($a, $o), ' ';
function f723($a, $o) {
  return [usleep('a'), "{$a[usleep()]}"][0];
}
echo f723($a, $o), ' ';
function f724($a, $o) {
  return [file_get_contents('a'), "{$a[file_get_contents()]}"][0];
}
echo f724($a, $o), ' ';
function f725($a, $o) {
  return [stream_select('a'), "{$a[stream_select()]}"][0];
}
echo f725($a, $o), ' ';
function f726($a, $o) {
  return [curl_exec('a'), "{$a[curl_exec()]}"][0];
}
echo f726($a, $o), ' ';
function f727($a, $o) {
  return [strtoupper('a'), "{$a[strtoupper()]}"][0];
}
echo f727($a, $o), ' ';
function f728($a, $o) {
  return (fn() => (function() { return fopen(); })())();
}
echo f728($a, $o), ' ';
function f729($a, $o) {
  return (fn() => (function() { return sleep(); })())();
}
echo f729($a, $o), ' ';
function f730($a, $o) {
  return (fn() => (function() { return usleep(); })())();
}
echo f730($a, $o), ' ';
function f731($a, $o) {
  return (fn() => (function() { return file_get_contents(); })())();
}
echo f731($a, $o), ' ';
function f732($a, $o) {
  return (fn() => (function() { return stream_select(); })())();
}
echo f732($a, $o), ' ';
function f733($a, $o) {
  return (fn() => (function() { return curl_exec(); })())();
}
echo f733($a, $o), ' ';
function f734($a, $o) {
  return (fn() => (function() { return strtoupper(); })())();
}
echo f734($a, $o), ' ';
function f735($a, $o) {
  return match(true) { default => fopen() };
}
echo f735($a, $o), ' ';
function f736($a, $o) {
  return match(true) { default => sleep() };
}
echo f736($a, $o), ' ';
function f737($a, $o) {
  return match(true) { default => usleep() };
}
echo f737($a, $o), ' ';
function f738($a, $o) {
  return match(true) { default => file_get_contents() };
}
echo f738($a, $o), ' ';
function f739($a, $o) {
  return match(true) { default => stream_select() };
}
echo f739($a, $o), ' ';
function f740($a, $o) {
  return match(true) { default => curl_exec() };
}
echo f740($a, $o), ' ';
function f741($a, $o) {
  return match(true) { default => strtoupper() };
}
echo f741($a, $o), ' ';
function f742($a, $o) {
  return strtoupper /*x*/ ( # y
 fopen
 (1));
}
echo f742($a, $o), ' ';
function f743($a, $o) {
  return strtoupper /*x*/ ( # y
 sleep
 (1));
}
echo f743($a, $o), ' ';
function f744($a, $o) {
  return strtoupper /*x*/ ( # y
 usleep
 (1));
}
echo f744($a, $o), ' ';
function f745($a, $o) {
  return strtoupper /*x*/ ( # y
 file_get_contents
 (1));
}
echo f745($a, $o), ' ';
function f746($a, $o) {
  return strtoupper /*x*/ ( # y
 stream_select
 (1));
}
echo f746($a, $o), ' ';
function f747($a, $o) {
  return strtoupper /*x*/ ( # y
 curl_exec
 (1));
}
echo f747($a, $o), ' ';
function f748($a, $o) {
  return strtoupper /*x*/ ( # y
 strtoupper
 (1));
}
echo f748($a, $o), ' ';
function f749($a, $o) {
  return (new class(fopen('q')) { function __construct(public $p) {} })->p;
}
echo f749($a, $o), ' ';
function f750($a, $o) {
  return (new class(sleep('q')) { function __construct(public $p) {} })->p;
}
echo f750($a, $o), ' ';
function f751($a, $o) {
  return (new class(usleep('q')) { function __construct(public $p) {} })->p;
}
echo f751($a, $o), ' ';
function f752($a, $o) {
  return (new class(file_get_contents('q')) { function __construct(public $p) {} })->p;
}
echo f752($a, $o), ' ';
function f753($a, $o) {
  return (new class(stream_select('q')) { function __construct(public $p) {} })->p;
}
echo f753($a, $o), ' ';
function f754($a, $o) {
  return (new class(curl_exec('q')) { function __construct(public $p) {} })->p;
}
echo f754($a, $o), ' ';
function f755($a, $o) {
  return (new class(strtoupper('q')) { function __construct(public $p) {} })->p;
}
echo f755($a, $o), ' ';
function f756($a, $o) {
  return $o->fopen() . fopen();
}
echo f756($a, $o), ' ';
function f757($a, $o) {
  return $o->sleep() . sleep();
}
echo f757($a, $o), ' ';
function f758($a, $o) {
  return $o->usleep() . usleep();
}
echo f758($a, $o), ' ';
function f759($a, $o) {
  return $o->file_get_contents() . file_get_contents();
}
echo f759($a, $o), ' ';
function f760($a, $o) {
  return $o->stream_select() . stream_select();
}
echo f760($a, $o), ' ';
function f761($a, $o) {
  return $o->curl_exec() . curl_exec();
}
echo f761($a, $o), ' ';
function f762($a, $o) {
  return $o->strtoupper() . strtoupper();
}
echo f762($a, $o), ' ';
function f763($a, $o) {
  return <<<X
{$a[fopen(1)]}
X;
}
echo f763($a, $o), ' ';
function f764($a, $o) {
  return <<<X
{$a[sleep(1)]}
X;
}
echo f764($a, $o), ' ';
function f765($a, $o) {
  return <<<X
{$a[usleep(1)]}
X;
}
echo f765($a, $o), ' ';
function f766($a, $o) {
  return <<<X
{$a[file_get_contents(1)]}
X;
}
echo f766($a, $o), ' ';
function f767($a, $o) {
  return <<<X
{$a[stream_select(1)]}
X;
}
echo f767($a, $o), ' ';
function f768($a, $o) {
  return <<<X
{$a[curl_exec(1)]}
X;
}
echo f768($a, $o), ' ';
function f769($a, $o) {
  return <<<X
{$a[strtoupper(1)]}
X;
}
echo f769($a, $o), ' ';
function f770($a, $o) {
  return fopen('a');
}
echo f770($a, $o), ' ';
function f771($a, $o) {
  return sleep('a');
}
echo f771($a, $o), ' ';
function f772($a, $o) {
  return usleep('a');
}
echo f772($a, $o), ' ';
function f773($a, $o) {
  return file_get_contents('a');
}
echo f773($a, $o), ' ';
function f774($a, $o) {
  return stream_select('a');
}
echo f774($a, $o), ' ';
function f775($a, $o) {
  return curl_exec('a');
}
echo f775($a, $o), ' ';
function f776($a, $o) {
  return strtoupper('a');
}
echo f776($a, $o), ' ';
function f777($a, $o) {
  return \fopen('a');
}
echo f777($a, $o), ' ';
function f778($a, $o) {
  return \sleep('a');
}
echo f778($a, $o), ' ';
function f779($a, $o) {
  return \usleep('a');
}
echo f779($a, $o), ' ';
function f780($a, $o) {
  return \file_get_contents('a');
}
echo f780($a, $o), ' ';
function f781($a, $o) {
  return \stream_select('a');
}
echo f781($a, $o), ' ';
function f782($a, $o) {
  return \curl_exec('a');
}
echo f782($a, $o), ' ';
function f783($a, $o) {
  return \strtoupper('a');
}
echo f783($a, $o), ' ';
function f784($a, $o) {
  return (fopen(...))('a');
}
echo f784($a, $o), ' ';
function f785($a, $o) {
  return (sleep(...))('a');
}
echo f785($a, $o), ' ';
function f786($a, $o) {
  return (usleep(...))('a');
}
echo f786($a, $o), ' ';
function f787($a, $o) {
  return (file_get_contents(...))('a');
}
echo f787($a, $o), ' ';
function f788($a, $o) {
  return (stream_select(...))('a');
}
echo f788($a, $o), ' ';
function f789($a, $o) {
  return (curl_exec(...))('a');
}
echo f789($a, $o), ' ';
function f790($a, $o) {
  return (strtoupper(...))('a');
}
echo f790($a, $o), ' ';
function f791($a, $o) {
  return [fopen('a'), "{$a[fopen()]}"][0];
}
echo f791($a, $o), ' ';
function f792($a, $o) {
  return [sleep('a'), "{$a[sleep()]}"][0];
}
echo f792($a, $o), ' ';
function f793($a, $o) {
  return [usleep('a'), "{$a[usleep()]}"][0];
}
echo f793($a, $o), ' ';
function f794($a, $o) {
  return [file_get_contents('a'), "{$a[file_get_contents()]}"][0];
}
echo f794($a, $o), ' ';
function f795($a, $o) {
  return [stream_select('a'), "{$a[stream_select()]}"][0];
}
echo f795($a, $o), ' ';
function f796($a, $o) {
  return [curl_exec('a'), "{$a[curl_exec()]}"][0];
}
echo f796($a, $o), ' ';
function f797($a, $o) {
  return [strtoupper('a'), "{$a[strtoupper()]}"][0];
}
echo f797($a, $o), ' ';
function f798($a, $o) {
  return (fn() => (function() { return fopen(); })())();
}
echo f798($a, $o), ' ';
function f799($a, $o) {
  return (fn() => (function() { return sleep(); })())();
}
echo f799($a, $o), ' ';
function f800($a, $o) {
  return (fn() => (function() { return usleep(); })())();
}
echo f800($a, $o), ' ';
function f801($a, $o) {
  return (fn() => (function() { return file_get_contents(); })())();
}
echo f801($a, $o), ' ';
function f802($a, $o) {
  return (fn() => (function() { return stream_select(); })())();
}
echo f802($a, $o), ' ';
function f803($a, $o) {
  return (fn() => (function() { return curl_exec(); })())();
}
echo f803($a, $o), ' ';
function f804($a, $o) {
  return (fn() => (function() { return strtoupper(); })())();
}
echo f804($a, $o), ' ';
function f805($a, $o) {
  return match(true) { default => fopen() };
}
echo f805($a, $o), ' ';
function f806($a, $o) {
  return match(true) { default => sleep() };
}
echo f806($a, $o), ' ';
function f807($a, $o) {
  return match(true) { default => usleep() };
}
echo f807($a, $o), ' ';
function f808($a, $o) {
  return match(true) { default => file_get_contents() };
}
echo f808($a, $o), ' ';
function f809($a, $o) {
  return match(true) { default => stream_select() };
}
echo f809($a, $o), ' ';
function f810($a, $o) {
  return match(true) { default => curl_exec() };
}
echo f810($a, $o), ' ';
function f811($a, $o) {
  return match(true) { default => strtoupper() };
}
echo f811($a, $o), ' ';
function f812($a, $o) {
  return strtoupper /*x*/ ( # y
 fopen
 (1));
}
echo f812($a, $o), ' ';
function f813($a, $o) {
  return strtoupper /*x*/ ( # y
 sleep
 (1));
}
echo f813($a, $o), ' ';
function f814($a, $o) {
  return strtoupper /*x*/ ( # y
 usleep
 (1));
}
echo f814($a, $o), ' ';
function f815($a, $o) {
  return strtoupper /*x*/ ( # y
 file_get_contents
 (1));
}
echo f815($a, $o), ' ';
function f816($a, $o) {
  return strtoupper /*x*/ ( # y
 stream_select
 (1));
}
echo f816($a, $o), ' ';
function f817($a, $o) {
  return strtoupper /*x*/ ( # y
 curl_exec
 (1));
}
echo f817($a, $o), ' ';
function f818($a, $o) {
  return strtoupper /*x*/ ( # y
 strtoupper
 (1));
}
echo f818($a, $o), ' ';
function f819($a, $o) {
  return (new class(fopen('q')) { function __construct(public $p) {} })->p;
}
echo f819($a, $o), ' ';
function f820($a, $o) {
  return (new class(sleep('q')) { function __construct(public $p) {} })->p;
}
echo f820($a, $o), ' ';
function f821($a, $o) {
  return (new class(usleep('q')) { function __construct(public $p) {} })->p;
}
echo f821($a, $o), ' ';
function f822($a, $o) {
  return (new class(file_get_contents('q')) { function __construct(public $p) {} })->p;
}
echo f822($a, $o), ' ';
function f823($a, $o) {
  return (new class(stream_select('q')) { function __construct(public $p) {} })->p;
}
echo f823($a, $o), ' ';
function f824($a, $o) {
  return (new class(curl_exec('q')) { function __construct(public $p) {} })->p;
}
echo f824($a, $o), ' ';
function f825($a, $o) {
  return (new class(strtoupper('q')) { function __construct(public $p) {} })->p;
}
echo f825($a, $o), ' ';
function f826($a, $o) {
  return $o->fopen() . fopen();
}
echo f826($a, $o), ' ';
function f827($a, $o) {
  return $o->sleep() . sleep();
}
echo f827($a, $o), ' ';
function f828($a, $o) {
  return $o->usleep() . usleep();
}
echo f828($a, $o), ' ';
function f829($a, $o) {
  return $o->file_get_contents() . file_get_contents();
}
echo f829($a, $o), ' ';
function f830($a, $o) {
  return $o->stream_select() . stream_select();
}
echo f830($a, $o), ' ';
function f831($a, $o) {
  return $o->curl_exec() . curl_exec();
}
echo f831($a, $o), ' ';
function f832($a, $o) {
  return $o->strtoupper() . strtoupper();
}
echo f832($a, $o), ' ';
function f833($a, $o) {
  return <<<X
{$a[fopen(1)]}
X;
}
echo f833($a, $o), ' ';
function f834($a, $o) {
  return <<<X
{$a[sleep(1)]}
X;
}
echo f834($a, $o), ' ';
function f835($a, $o) {
  return <<<X
{$a[usleep(1)]}
X;
}
echo f835($a, $o), ' ';
function f836($a, $o) {
  return <<<X
{$a[file_get_contents(1)]}
X;
}
echo f836($a, $o), ' ';
function f837($a, $o) {
  return <<<X
{$a[stream_select(1)]}
X;
}
echo f837($a, $o), ' ';
function f838($a, $o) {
  return <<<X
{$a[curl_exec(1)]}
X;
}
echo f838($a, $o), ' ';
function f839($a, $o) {
  return <<<X
{$a[strtoupper(1)]}
X;
}
echo f839($a, $o), ' ';
echo "\n";
