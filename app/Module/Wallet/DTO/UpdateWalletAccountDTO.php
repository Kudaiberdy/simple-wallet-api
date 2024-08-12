<?php

declare(strict_types=1);

namespace App\Module\Wallet\DTO;

use App\Module\Wallet\Enums\ReasonAccountChange;
use App\Module\Wallet\Enums\TransactionType;

final class UpdateWalletAccountDTO
{
    public TransactionType $transactionType;
    public int $amount;
    public string $currency;
    public ReasonAccountChange $changeReason;

    public function getTransactionType(): TransactionType
    {
        return $this->transactionType;
    }

    public function setTransactionType(TransactionType $transactionType): void
    {
        $this->transactionType = $transactionType;
    }

    public function getAmount(): float
    {
        return $this->amount * 100;
    }

    public function setAmount(float $amount): void
    {
        $this->amount = (int)($amount * 100);
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }

    public function getChangeReason(): ReasonAccountChange
    {
        return $this->changeReason;
    }

    public function setChangeReason(ReasonAccountChange $changeReason): void
    {
        $this->changeReason = $changeReason;
    }
}
