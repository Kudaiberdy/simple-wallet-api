<?php

declare(strict_types=1);

namespace App\Module\Wallet\Providers;

use App\Module\Wallet\Contracts\Queries\WalletQuery as WalletQueryContract;
use App\Module\Wallet\Queries\WalletQuery;
use Illuminate\Support\ServiceProvider;

final class QueryServiceProvider extends ServiceProvider
{
    public array $bindings = [
        WalletQueryContract::class => WalletQuery::class,
    ];
}
