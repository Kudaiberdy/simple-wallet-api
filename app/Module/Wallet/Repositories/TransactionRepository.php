<?php

declare(strict_types=1);

namespace App\Module\Wallet\Repositories;

use App\Module\Wallet\Contracts\Repositories\StoreTransactionRepository;
use App\Module\Wallet\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Throwable;

final class TransactionRepository implements StoreTransactionRepository
{
    /**
     * @throws Throwable
     */
    public function store(Transaction $transaction): void
    {
        DB::transaction(function () use ($transaction): void {
            $transaction->saveOrFail();
        });
    }
}
