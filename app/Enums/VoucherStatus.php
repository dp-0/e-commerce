<?php

namespace App\Enums;

enum VoucherStatus: string
{
    case ACTIVATED = 'activated';
    case DEACTIVATED = 'deactivated';
}
