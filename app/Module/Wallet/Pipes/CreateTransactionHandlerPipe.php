<?php

declare(strict_types=1);

namespace App\Module\Wallet\Pipes;

use App\DataMappers\DataMapper;
use App\Module\Wallet\Commands\CreateTransactionCommand;
use App\Module\Wallet\Contracts\Pipe\TransactionProcessHandlerPipe;
use App\Module\Wallet\DTO\ProcessTransactionDTO;
use App\Module\Wallet\DTO\StoreTransactionDTO;
use App\Module\Wallet\Models\Transaction;

final readonly class CreateTransactionHandlerPipe implements TransactionProcessHandlerPipe
{
    public function __construct(private DataMapper $mapper)
    {
    }

    public function handle(ProcessTransactionDTO $dto, callable $next): ProcessTransactionDTO
    {
        /** @var Transaction $transaction */
        $transaction = dispatch_sync(
            new CreateTransactionCommand($this->mapper->map($dto->updateWalletAccountDTO, StoreTransactionDTO::class))
        );

        $dto->transaction = $transaction;

        return $next($dto);
    }
}
