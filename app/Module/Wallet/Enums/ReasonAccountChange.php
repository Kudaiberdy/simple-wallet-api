<?php

namespace App\Module\Wallet\Enums;

use App\Traits\EnumCaseToValue;

enum ReasonAccountChange: string
{
    use EnumCaseToValue;

    case STOCK  = 'stock';
    case REFUND = 'refund';
}
