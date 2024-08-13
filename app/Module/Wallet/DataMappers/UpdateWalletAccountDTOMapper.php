<?php

declare(strict_types=1);

namespace App\Module\Wallet\DataMappers;

use App\DataMappers\DataMapper;
use App\Module\Wallet\Contracts\Queries\CurrencyQuery;
use App\Module\Wallet\Contracts\Queries\WalletQuery;
use App\Module\Wallet\DTO\UpdateWalletAccountDTO;
use App\Module\Wallet\Enums\ReasonAccountChange;
use App\Module\Wallet\Enums\TransactionType;
use Illuminate\Http\Request;

final readonly class UpdateWalletAccountDTOMapper implements DataMapper
{
    public function __construct(
        private WalletQuery $walletQuery,
        private CurrencyQuery $currencyQuery
    ) {
    }

    /**
     * @param Request      $dataFromMap
     * @param class-string $classToMap
     *
     * @return UpdateWalletAccountDTO
     */
    public function map(mixed $dataFromMap, string $classToMap = UpdateWalletAccountDTO::class): object
    {
        $dto = new $classToMap();

        $dto->wallet          = $this->walletQuery->getWalletByUuid((string)$dataFromMap->offsetGet('uuid'));
        $dto->transactionType = $dataFromMap->enum('transactionType', TransactionType::class);
        $dto->currency        = $this->currencyQuery->getCurrencyByCode($dataFromMap->string('currency')->value());
        $dto->changeReason    = $dataFromMap->enum('changeReason', ReasonAccountChange::class);
        $dto->setAmount($dataFromMap->float('amount'));

        return $dto;
    }
}
