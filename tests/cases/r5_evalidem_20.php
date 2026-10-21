<?php
// eval'd code with \r line endings and CRLF: lines of warnings and __LINE__ stay
eval("echo __LINE__, ' ', strtoupper('a');\recho ' ', __LINE__;\r\necho ' ', __LINE__, \"\\n\";\r\r\$o = null; echo \$o?->x::who() ?? __LINE__, \"\\n\";");
eval("\r\n\r\n\$c = 'Orig\\Thing';\recho \"{\$c::who()}\", __LINE__, \"\\n\";\r\$u = \$undefined1;");
