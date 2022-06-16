<?php
declare(strict_types=1);
namespace App\Enums;

enum UserStatus: int
{
    use EnumToArray;

    case PENDING= 0;
    case ACCEPT = 1;
    case DECLINE = 2;
}
