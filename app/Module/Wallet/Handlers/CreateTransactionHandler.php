<?php

declare(strict_types=1);

namespace App\Module\Wallet\Handlers;

use App\Module\Wallet\Commands\CreateTransactionCommand;
use App\Module\Wallet\Contracts\Repositories\StoreTransactionRepository;
use App\Module\Wallet\Models\Transaction;

final readonly class CreateTransactionHandler
{
    public function __construct(private StoreTransactionRepository $repository)
    {
    }

    public function handle(CreateTransactionCommand $command): Transaction
    {
        $transaction = new Transaction();

        $transaction->type        = $command->dto->type;
        $transaction->reason      = $command->dto->reason;
        $transaction->wallet_id   = $command->dto->walletId;
        $transaction->currency_id = $command->dto->currencyId;
        $transaction->setAmount($command->dto->getAmount());

        $this->repository->store($transaction);

        return $transaction;
    }

}
