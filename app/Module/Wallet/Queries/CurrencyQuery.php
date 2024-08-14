<?php

declare(strict_types=1);

namespace App\Module\Wallet\Queries;

use App\Module\Wallet\Contracts\Queries\CurrencyQuery as CurrencyQueryContract;
use App\Module\Wallet\Models\Currency;
use Illuminate\Database\Eloquent\ModelNotFoundException;

final class CurrencyQuery implements CurrencyQueryContract
{
    /**
     * @throws ModelNotFoundException
     */
    public function getCurrencyByCode(string $code): Currency
    {
        return Currency::query()
            ->where('code', $code)
            ->firstOrFail();
    }

    /**
     * @throws ModelNotFoundException
     */
    public function getCurrencyById(int $id): Currency
    {
        return Currency::query()
            ->where('id', $id)
            ->firstOrFail();
    }
}
