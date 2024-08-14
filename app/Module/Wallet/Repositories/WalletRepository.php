<?php

declare(strict_types=1);

namespace App\Module\Wallet\Repositories;

use App\Module\Wallet\Contracts\Repositories\UpdateWalletRepository;
use App\Module\Wallet\Models\Wallet;
use Throwable;

final readonly class WalletRepository implements UpdateWalletRepository
{
    /**
     * @throws Throwable
     */
    public function update(Wallet $wallet): void
    {
        $wallet->saveOrFail();
    }
}
