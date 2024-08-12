<?php

declare(strict_types=1);

namespace App\Module\Wallet\DataMappers;

use App\DataMappers\DataMapper;
use App\Module\Wallet\DTO\UpdateWalletAccountDTO;
use App\Module\Wallet\Enums\ReasonAccountChange;
use App\Module\Wallet\Enums\TransactionType;
use Illuminate\Http\Request;

final class RequestToCreditToWalletDTOMapper implements DataMapper
{
    /**
     * @param Request      $dataFromMap
     * @param class-string $classToMap
     *
     * @return UpdateWalletAccountDTO
     */
    public function map(mixed $dataFromMap, string $classToMap = UpdateWalletAccountDTO::class): object
    {
        $dto = new $classToMap();

        $dto->setTransactionType($dataFromMap->enum('transactionType', TransactionType::class));
        $dto->setAmount($dataFromMap->float('amount'));
        $dto->setCurrency($dataFromMap->get('currency'));
        $dto->setChangeReason($dataFromMap->enum('changeReason', ReasonAccountChange::class));

        return $dto;
    }
}
