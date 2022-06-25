<?php

declare(strict_types=1);

namespace App\Enums;

enum MemberRequestStatus: int
{
    case pending= 0;
    case referer_accepted = 2;
    case referer_declined = 3;
    case approved = 1;
    case declined = 4;
}
