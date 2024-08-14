<?php

declare(strict_types=1);

namespace App\Module\Wallet\Contracts\Repositories;

use App\Module\Wallet\Models\Wallet;
use Throwable;

interface UpdateWalletRepository
{
    /**
     * @throws Throwable
     */
    public function update(Wallet $wallet): void;
}
