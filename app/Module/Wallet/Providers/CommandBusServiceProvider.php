<?php

declare(strict_types=1);

namespace App\Module\Wallet\Providers;

use App\Module\Wallet\Commands\CreateTransactionCommand;
use App\Module\Wallet\Commands\UpdateWalletAccountCommand;
use App\Module\Wallet\Handlers\CreateTransactionHandler;
use App\Module\Wallet\Handlers\UpdateWalletAccountHandler;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\ServiceProvider;

final class CommandBusServiceProvider extends ServiceProvider
{
    private array $maps = [
        UpdateWalletAccountCommand::class => UpdateWalletAccountHandler::class,
        CreateTransactionCommand::class   => CreateTransactionHandler::class,
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
