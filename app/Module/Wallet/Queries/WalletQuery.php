<?php

declare(strict_types=1);

namespace App\Module\Wallet\Queries;

use App\Module\Wallet\Models\Wallet;
use Illuminate\Database\Eloquent\ModelNotFoundException;

final class WalletQuery implements \App\Module\Wallet\Contracts\Queries\WalletQuery
{
    /**
     * @throws ModelNotFoundException
     */
    public function getWalletByUuid(string $uuid): Wallet
    {
        return Wallet::query()
            ->where('uuid', $uuid)
            ->firstOrFail();
    }
}
