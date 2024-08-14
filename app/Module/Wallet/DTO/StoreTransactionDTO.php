<?php

declare(strict_types=1);

namespace App\Module\Wallet\DTO;

use App\Module\Wallet\Enums\ReasonAccountChange;
use App\Module\Wallet\Enums\TransactionType;

final class StoreTransactionDTO
{
    public int $walletId;
    public int $currencyId;
    public TransactionType $type;
    public ReasonAccountChange $reason;
    private int $amount;

    public function getAmount(): float
    {
        return $this->amount / 100;
    }

    public function setAmount(float $amount): void
    {
        $this->amount = convert_to_cents($amount);
    }
}
