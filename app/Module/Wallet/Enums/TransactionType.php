<?php

namespace App\Module\Wallet\Enums;

use App\Traits\EnumCaseToValue;

enum TransactionType: string
{
    use EnumCaseToValue;

    case DEBIT  = 'debit';
    case CREDIT = 'credit';
}
