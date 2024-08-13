<?php

declare(strict_types=1);

namespace App\Module\Wallet\DataMappers;

use App\DataMappers\DataMapper;
use App\Module\Wallet\DTO\StoreTransactionDTO;
use App\Module\Wallet\DTO\UpdateWalletAccountDTO;

final readonly class StoreTransactionDTOMapper implements DataMapper
{
    /**
     * @param UpdateWalletAccountDTO $dataFromMap
     * @param class-string           $classToMap
     *
     * @return UpdateWalletAccountDTO
     */
    public function map(mixed $dataFromMap, string $classToMap = StoreTransactionDTO::class): object
    {
        $dto = new $classToMap();

        $dto->walletId   = $dataFromMap->wallet->id;
        $dto->currencyId = $dataFromMap->currency->id;
        $dto->type       = $dataFromMap->transactionType;
        $dto->reason     = $dataFromMap->changeReason;
        $dto->setAmount($dataFromMap->getAmount());

        return $dto;
    }
}
