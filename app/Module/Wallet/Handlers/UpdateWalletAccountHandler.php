<?php

declare(strict_types=1);

namespace App\Module\Wallet\Handlers;

use App\Module\Wallet\Commands\UpdateWalletAccountCommand;
use App\Module\Wallet\Contracts\Queries\CurrencyQuery;
use App\Module\Wallet\Contracts\Repositories\UpdateWalletRepository;
use App\Module\Wallet\Contracts\Services\CurrencyConvertor;
use App\Module\Wallet\Enums\TransactionType;
use App\Module\Wallet\Models\Wallet;
use Throwable;

final readonly class UpdateWalletAccountHandler
{
    public function __construct(
        private UpdateWalletRepository $walletRepository,
        private CurrencyConvertor $convertor,
        private CurrencyQuery $currencyQuery,
    ) {
    }

    /**
     * @throws Throwable
     */
    public function handle(UpdateWalletAccountCommand $command): void
    {
        $transactionAmount = $this->convertor->convert(
            $command->transaction->getAmount(),
            $this->currencyQuery->getCurrencyById($command->wallet->getCurrencyId()),
            $this->currencyQuery->getCurrencyById($command->transaction->getCurrencyId()),
        );

        $this->handleAmount($command->transaction->getType(), $command->wallet, $transactionAmount);
    }

    /**
     * @throws Throwable
     */
    private function handleAmount(TransactionType $type, Wallet $wallet, float $amount): void
    {
        match ($type) {
            TransactionType::CREDIT => $wallet->setBalance($wallet->getBalance() + $amount),
            default => $wallet->setBalance($wallet->getBalance() - $amount),
        };

        $this->walletRepository->update($wallet);
    }
}
