<?php

declare(strict_types=1);

namespace App\Module\Wallet\Providers;

use App\Module\Wallet\Contracts\Services\WalletService as WalletServiceContract;
use App\Module\Wallet\Services\WalletService;
use Illuminate\Support\ServiceProvider;

final class BindServiceProvider extends ServiceProvider
{
    public array $bindings = [
        WalletServiceContract::class => WalletService::class,
    ];
}
