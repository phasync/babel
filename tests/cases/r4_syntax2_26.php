<?php
// A reserved word is a valid namespace name (`namespace List;`, `namespace Fn { }`): names inside it
// resolve in that namespace.
namespace List;
class PDO { }
function fopen($x) { return __FUNCTION__; }
echo fopen(1), ' ', \get_class(new PDO), ' ', PDO::class, "\n";

namespace Fn;
echo fopen(1), ' ', PDO::class, "\n";
