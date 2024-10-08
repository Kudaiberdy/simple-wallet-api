<?php

declare(strict_types=1);

namespace App\Module\Wallet\Providers;

use App\Module\Wallet\Commands\CreateTransactionCommand;
use App\Module\Wallet\Commands\ProcessUpdateWalletAccountCommand;
use App\Module\Wallet\Commands\UpdateWalletAccountCommand;
use App\Module\Wallet\Handlers\CreateTransactionHandler;
use App\Module\Wallet\Handlers\ProcessUpdateWalletAccountHandler;
use App\Module\Wallet\Handlers\UpdateWalletAccountHandler;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\ServiceProvider;

final class CommandBusServiceProvider extends ServiceProvider
{
    private array $maps = [
        ProcessUpdateWalletAccountCommand::class => ProcessUpdateWalletAccountHandler::class,
        CreateTransactionCommand::class          => CreateTransactionHandler::class,
        UpdateWalletAccountCommand::class        => UpdateWalletAccountHandler::class,
    ];

    public function boot(): void
    {
        $this->registerCommandHandlers();
    }

    private function registerCommandHandlers(): void
    {
        Bus::map($this->maps);
    }
}
