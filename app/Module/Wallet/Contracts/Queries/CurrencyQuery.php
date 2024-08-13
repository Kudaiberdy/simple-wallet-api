<?php

declare(strict_types=1);

namespace App\Module\Wallet\Contracts\Queries;

use App\Module\Wallet\Models\Currency;
use Illuminate\Database\Eloquent\ModelNotFoundException;

interface CurrencyQuery
{
    /**
     * @throws ModelNotFoundException
     */
    public function getCurrencyByCode(string $code): Currency;
}
