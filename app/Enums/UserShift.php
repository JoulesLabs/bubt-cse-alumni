<?php
declare(strict_types=1);
namespace App\Enums;

enum UserShift: int
{
    use EnumToArray;

    case DAY = 0;
    case EVENING = 1;
}
