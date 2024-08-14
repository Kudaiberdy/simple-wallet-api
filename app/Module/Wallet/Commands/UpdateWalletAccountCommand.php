<?php

declare(strict_types=1);

namespace App\Module\Wallet\Commands;

use App\Module\Wallet\Models\Transaction;
use App\Module\Wallet\Models\Wallet;

final readonly class UpdateWalletAccountCommand
{
    public function __construct(
        public Wallet $wallet,
        public Transaction $transaction
    ) {
    }
}
