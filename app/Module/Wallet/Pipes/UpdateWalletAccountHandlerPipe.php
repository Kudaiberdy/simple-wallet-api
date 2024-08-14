<?php

declare(strict_types=1);

namespace App\Module\Wallet\Pipes;

use App\Module\Wallet\Commands\UpdateWalletAccountCommand;
use App\Module\Wallet\Contracts\Pipe\TransactionProcessHandlerPipe;
use App\Module\Wallet\DTO\ProcessTransactionDTO;

final class UpdateWalletAccountHandlerPipe implements TransactionProcessHandlerPipe
{
    public function handle(ProcessTransactionDTO $dto, callable $next): ProcessTransactionDTO
    {
        dispatch_sync(
            new UpdateWalletAccountCommand($dto->updateWalletAccountDTO->wallet, $dto->transaction)
        );

        return $next($dto);
    }
}
