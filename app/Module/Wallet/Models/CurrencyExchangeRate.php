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
}
