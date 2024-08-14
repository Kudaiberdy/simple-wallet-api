<?php

declare(strict_types=1);

namespace App\Module\Wallet\Contracts\Repositories;

use App\Module\Wallet\Models\Transaction;

interface StoreTransactionRepository
{
    public function store(Transaction $transaction): void;
}
