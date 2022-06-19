<?php

declare(strict_types=1);

namespace App\Enums;

enum AlumniRole: string
{
    case president= "President";
    case secretary = "General Secretary";
    case member = "General Member";
}
