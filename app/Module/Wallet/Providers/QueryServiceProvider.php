<?php

declare(strict_types=1);

namespace App\Module\Wallet\Providers;

use App\Module\Wallet\Contracts\Queries\CurrencyQuery as CurrencyQueryContract;
use App\Module\Wallet\Contracts\Queries\ExchangeRateQuery as ExchangeRateQueryContract;
use App\Module\Wallet\Contracts\Queries\WalletQuery as WalletQueryContract;
use App\Module\Wallet\Queries\CurrencyQuery;
use App\Module\Wallet\Queries\ExchangeRateQuery;
use App\Module\Wallet\Queries\WalletQuery;
use Illuminate\Support\ServiceProvider;

final class QueryServiceProvider extends ServiceProvider
{
    public array $bindings = [
        WalletQueryContract::class       => WalletQuery::class,
        CurrencyQueryContract::class     => CurrencyQuery::class,
        ExchangeRateQueryContract::class => ExchangeRateQuery::class,
    ];
}
