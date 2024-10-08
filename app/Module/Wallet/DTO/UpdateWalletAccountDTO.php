<?php

declare(strict_types=1);

namespace App\Module\Wallet\DTO;

use App\Module\Wallet\Enums\ReasonAccountChange;
use App\Module\Wallet\Enums\TransactionType;
use App\Module\Wallet\Models\Currency;
use App\Module\Wallet\Models\Wallet;

final class UpdateWalletAccountDTO
{
    public Wallet $wallet;
    public TransactionType $transactionType;
    public Currency $currency;
    public ReasonAccountChange $changeReason;
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
