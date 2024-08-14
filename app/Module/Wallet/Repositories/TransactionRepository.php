<?php

declare(strict_types=1);

namespace App\Module\Wallet\Repositories;

use App\Module\Wallet\Contracts\Repositories\StoreTransactionRepository;
use App\Module\Wallet\Models\Transaction;
use Throwable;

final class TransactionRepository implements StoreTransactionRepository
{
    /**
     * @throws Throwable
     */
    public function store(Transaction $transaction): void
    {
        $transaction->saveOrFail();
    }
}
