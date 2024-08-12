<?php

declare(strict_types=1);

namespace App\Module\Wallet\Handlers;

use App\Module\Wallet\Commands\UpdateWalletAccountCommand;
use App\Module\Wallet\Contracts\Queries\WalletQuery;
use Illuminate\Contracts\Pipeline\Pipeline;

final readonly class UpdateWalletAccountHandler
{
    public function __construct(
        private WalletQuery $walletQuery,
        private Pipeline $pipeline
    ) {
    }

    public function handle(UpdateWalletAccountCommand $command): void
    {
        $wallet = $this->walletQuery->getWalletByUuid($command->uuid);
    }
}
