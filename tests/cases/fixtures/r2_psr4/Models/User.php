<?php
declare(strict_types=1);

namespace App\Models;

use Orig\Base;
use Orig\Thing;

final class User extends Base
{
    public const FILE = __FILE__;
    public function thing(): Thing { return new Thing; }
    public function io(): string { return fopen('x', 'r') . ' ' . basename(__DIR__); }
}
