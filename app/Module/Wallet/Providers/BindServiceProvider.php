<?php

declare(strict_types=1);

namespace App\Module\Wallet\Providers;

use App\DataMappers\DataMapper;
use App\Module\Wallet\Contracts\Services\CurrencyConvertor as CurrencyConvertorContract;
use App\Module\Wallet\Contracts\Services\WalletService as WalletServiceContract;
use App\Module\Wallet\DataMappers\UpdateWalletAccountDTOMapper;
use App\Module\Wallet\DataMappers\StoreTransactionDTOMapper;
use App\Module\Wallet\Enums\HandlerTransactionPipe;
use App\Module\Wallet\Handlers\ProcessUpdateWalletAccountHandler;
use App\Module\Wallet\Pipes\CreateTransactionHandlerPipe;
use App\Module\Wallet\Services\CurrencyConvertor;
use App\Module\Wallet\Services\WalletService;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Contracts\Pipeline\Pipeline as PipelineContract;
use Illuminate\Support\ServiceProvider;

final class BindServiceProvider extends ServiceProvider
{
    public array $bindings = [
        WalletServiceContract::class     => WalletService::class,
        DataMapper::class                => UpdateWalletAccountDTOMapper::class,
        PipelineContract::class          => Pipeline::class,
        CurrencyConvertorContract::class => CurrencyConvertor::class,
    ];

    public function register(): void
    {
        $this->app->tag(HandlerTransactionPipe::getValues(), 'transactionHandlerPipes');

        $this->app->when(ProcessUpdateWalletAccountHandler::class)
            ->needs('$pipes')
            ->giveTagged('transactionHandlerPipes');

        $this->app->when(CreateTransactionHandlerPipe::class)
            ->needs(DataMapper::class)
            ->give(StoreTransactionDTOMapper::class);
    }
}
