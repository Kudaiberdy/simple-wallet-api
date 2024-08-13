<?php

declare(strict_types=1);

namespace App\Module\Wallet\Contracts\Pipe;

use App\Module\Wallet\DTO\ProcessTransactionDTO;

interface TransactionProcessHandlerPipe
{
    public function handle(ProcessTransactionDTO $dto, callable $next): ProcessTransactionDTO;
}
