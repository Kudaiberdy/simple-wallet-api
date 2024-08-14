<?php

declare(strict_types=1);

namespace App\Module\Wallet\DTO;

use App\Module\Wallet\Models\Transaction;

final class ProcessTransactionDTO
{
    public UpdateWalletAccountDTO $updateWalletAccountDTO;
    public Transaction $transaction;
}
