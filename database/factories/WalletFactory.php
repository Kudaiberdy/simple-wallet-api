<?php

namespace Database\Factories;

use App\Module\Wallet\Models\Wallet;
use Illuminate\Database\Eloquent\Factories\Factory;

class WalletFactory extends Factory
{
    protected $model = Wallet::class;

    public function definition(): array
    {
        return [
            'uuid'        => $this->faker->uuid(),
            'balance'     => $this->faker->numberBetween(0, 1_000_000),
            'currency_id' => $this->faker->randomElement([1, 2]),
        ];
    }
}
