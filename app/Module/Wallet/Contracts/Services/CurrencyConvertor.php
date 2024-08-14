<?php

declare(strict_types=1);

namespace App\Module\Wallet\Contracts\Services;

use App\Module\Wallet\Models\Currency;

interface CurrencyConvertor
{
    public function convert(float $amount, Currency $fromCurrency, Currency $toCurrency): float;
}
