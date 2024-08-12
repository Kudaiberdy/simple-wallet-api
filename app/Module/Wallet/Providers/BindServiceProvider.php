<?php

declare(strict_types=1);

namespace App\Module\Wallet\Providers;

use App\DataMappers\DataMapper;
use App\Module\Wallet\Contracts\Services\WalletService as WalletServiceContract;
use App\Module\Wallet\DataMappers\RequestToCreditToWalletDTOMapper;
use App\Module\Wallet\Services\WalletService;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Contracts\Pipeline\Pipeline as PipelineContract;
use Illuminate\Support\ServiceProvider;

final class BindServiceProvider extends ServiceProvider
{
    public array $bindings = [
        WalletServiceContract::class => WalletService::class,
        DataMapper::class            => RequestToCreditToWalletDTOMapper::class,
        PipelineContract::class      => Pipeline::class,
    ];
}
