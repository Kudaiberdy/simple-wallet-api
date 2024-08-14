<?php

declare(strict_types=1);

namespace App\Module\Wallet\Queries;

use App\Module\Wallet\Contracts\Queries\ExchangeRateQuery as ExchangeRateQueryContract;
use App\Module\Wallet\Models\CurrencyExchangeRate;

final class ExchangeRateQuery implements ExchangeRateQueryContract
{
    public function getCurrencyPair(int $fromCurrencyId, int $toCurrencyId): CurrencyExchangeRate
    {
        return CurrencyExchangeRate::query()
            ->where('base_currency_id', $fromCurrencyId)
            ->where('target_currency_id', $toCurrencyId)
            ->firstOrFail();
    }
}
