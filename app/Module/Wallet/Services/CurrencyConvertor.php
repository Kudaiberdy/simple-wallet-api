<?php

declare(strict_types=1);

namespace App\Module\Wallet\Services;

use App\Module\Wallet\Contracts\Queries\ExchangeRateQuery;
use App\Module\Wallet\Contracts\Services\CurrencyConvertor as CurrencyConvertorContract;
use App\Module\Wallet\Models\Currency;

final readonly class CurrencyConvertor implements CurrencyConvertorContract
{
    public function __construct(private ExchangeRateQuery $exchangeRateService)
    {
    }

    public function convert(float $amount, Currency $fromCurrency, Currency $toCurrency): float
    {
        if ($fromCurrency->id === $toCurrency->id) {
            return $amount;
        }

        $exchangeRate = $this->exchangeRateService->getCurrencyPair($fromCurrency->id, $toCurrency->id);

        return $amount * $exchangeRate->getRate();
    }
}
