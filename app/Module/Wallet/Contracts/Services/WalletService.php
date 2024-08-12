<?php

declare(strict_types=1);

namespace App\Module\Wallet\Contracts\Services;

use App\Module\Wallet\Models\Wallet;

interface WalletService
{
    public function getWalletByUuid(string $uuid): Wallet;
}
