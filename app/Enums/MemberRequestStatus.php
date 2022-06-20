<?php

declare(strict_types=1);

namespace App\Enums;

enum MemberRequestStatus: int
{
    case pending= 0;
    case referer_accept = 2;
    case approved = 1;
    case declined = 3;
}
