<?php

namespace Database\Seeders;

use App\Models\User;
use App\Module\Wallet\Models\CurrencyExchangeRate;
use Illuminate\Database\Seeder;

class CurrencyExchangeRateSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $dateTime = now();
        CurrencyExchangeRate::query()->insert([
            [
                'base_currency_id' => 1,
                'target_currency_id' => 2,
                'rate' => 1,
                'created_at' => $dateTime,
                'updated_at' => $dateTime,
            ],
            [
                'base_currency_id' => 2,
                'target_currency_id' => 1,
                'rate' => 10000,
                'created_at' => $dateTime,
                'updated_at' => $dateTime,
            ],
        ]);
    }
}
