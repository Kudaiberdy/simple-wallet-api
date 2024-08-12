<?php

declare(strict_types=1);

namespace App\Module\Wallet\Services;

use App\Module\Wallet\Contracts\Queries\WalletQuery;
use App\Module\Wallet\Contracts\Services\WalletService as WalletServiceContract;
use App\Module\Wallet\Models\Wallet;

final readonly class WalletService implements WalletServiceContract
{
    public function __construct(
        private WalletQuery $query
    ) {
    }

    public function getWalletByUuid(string $uuid): Wallet
    {
        return $this->query->getWalletByUuid($uuid);
    }
}
