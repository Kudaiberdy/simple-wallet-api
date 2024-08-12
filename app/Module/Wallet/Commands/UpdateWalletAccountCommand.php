<?php

declare(strict_types=1);

namespace App\Module\Wallet\Commands;

use App\Module\Wallet\DTO\UpdateWalletAccountDTO;

final readonly class UpdateWalletAccountCommand
{
    public function __construct(
        public string $uuid,
        public UpdateWalletAccountDTO $dto
    ) {
    }
}
