<?php

namespace App\Module\Wallet\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $id
 * @property string $base_currency_id
 * @property int    $rate
 * @property string $target_currency_id
 */
class CurrencyExchangeRate extends Model
{
    use HasFactory;

    public $table = 'currency_exchange_rates';

    public function getRate(): float
    {
        return $this->rate === 0 ? 0 : $this->rate / 100;
    }
}
