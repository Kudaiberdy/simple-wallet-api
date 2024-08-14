<?php

declare(strict_types=1);

namespace App\Module\Wallet\Commands;

use App\Module\Wallet\DTO\StoreTransactionDTO;

final readonly class CreateTransactionCommand
{
    public function __construct(public StoreTransactionDTO $dto)
    {
    }
}
