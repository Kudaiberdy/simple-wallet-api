<?php

declare(strict_types=1);

namespace App\Module\Wallet\Providers;

use App\Module\Wallet\Contracts\Repositories\StoreTransactionRepository;
use App\Module\Wallet\Contracts\Repositories\UpdateWalletRepository;
use App\Module\Wallet\Repositories\TransactionRepository;
use App\Module\Wallet\Repositories\WalletRepository;
use Illuminate\Support\ServiceProvider;

final class RepositoryServiceProvider extends ServiceProvider
{
    public array $bindings = [
        StoreTransactionRepository::class => TransactionRepository::class,
        UpdateWalletRepository::class     => WalletRepository::class,
    ];
}
