<?php
declare(strict_types=1);
namespace App\Enums;

enum UserStatus: int
{
    case draft= 0;
    case approved = 1;
    case blocked = 2;
}
