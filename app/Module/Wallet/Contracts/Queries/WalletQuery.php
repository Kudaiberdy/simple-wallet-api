<?php

declare(strict_types=1);

namespace App\Module\Wallet\Contracts\Queries;

use App\Module\Wallet\Models\Wallet;
use Illuminate\Database\Eloquent\ModelNotFoundException;

interface WalletQuery
{
    /**
     * @throws ModelNotFoundException
     */
    public function getWalletByUuid(string $uuid): Wallet;
}
