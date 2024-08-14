<?php

declare(strict_types=1);

namespace App\Module\Wallet\Contracts\Queries;

use App\Module\Wallet\Models\CurrencyExchangeRate;

interface ExchangeRateQuery
{
    public function getCurrencyPair(int $fromCurrencyId, int $toCurrencyId): CurrencyExchangeRate;
}
