<?php
namespace Other { function sleep($x) { return 'O-sleep'; } function fopen($x) { return 'O-fopen'; } function usleep($x) { return 'O-usleep'; }
  function strtoupper() { return 'O-up'; } }
namespace Other\Sub { function sleep($x) { return 'OS-sleep'; } function fopen() { return 'OS-fopen'; } }
namespace g {
    use function \Other\{sleep, fopen as /* c */ fo,};
    use function Other\{
        usleep,   // trailing
        Sub\sleep as ss,
        Sub\fopen as sf
    };
    use function
        /* before */ Other\strtoupper
        as
        up;
    echo sleep(1), fo(1), usleep(1), ss(1), sf(), up(), strtoupper('a'), "\n";
}
