<?php

namespace App\Module\Wallet\Enums;

use App\Module\Wallet\Pipes\CreateTransactionHandlerPipe;
use App\Traits\EnumCaseToValue;

enum HandlerTransactionPipe: string
{
    use EnumCaseToValue;

    case CreateTransactionHandlerPipe = CreateTransactionHandlerPipe::class;
}
