<?php

declare(strict_types=1);

namespace App\Module\Wallet\Providers;

use App\Module\Wallet\Contracts\Repositories\StoreTransactionRepository;
use App\Module\Wallet\Repositories\TransactionRepository;
use Illuminate\Support\ServiceProvider;

final class RepositoryServiceProvider extends ServiceProvider
{
    public array $bindings = [
        StoreTransactionRepository::class => TransactionRepository::class,
    ];
}
