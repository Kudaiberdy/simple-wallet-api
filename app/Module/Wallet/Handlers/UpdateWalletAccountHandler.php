<?php

declare(strict_types=1);

namespace App\Module\Wallet\Handlers;

use App\Module\Wallet\Commands\UpdateWalletAccountCommand;
use App\Module\Wallet\Contracts\Pipe\TransactionProcessHandlerPipe;
use App\Module\Wallet\DTO\ProcessTransactionDTO;
use Illuminate\Contracts\Pipeline\Pipeline;

final readonly class UpdateWalletAccountHandler
{
    /**
     * @param Pipeline                             $pipeline
     * @param array<TransactionProcessHandlerPipe> $pipes
     */
    public function __construct(
        private Pipeline $pipeline,
        private array $pipes,
    ) {
    }

    public function handle(UpdateWalletAccountCommand $command): void
    {
        $this->pipeline->send($this->prepareDTO($command))
            ->through($this->pipes)
            ->thenReturn();
    }

    private function prepareDTO(UpdateWalletAccountCommand $command): ProcessTransactionDTO
    {
        $dto = new ProcessTransactionDTO();

        $dto->updateWalletAccountDTO = $command->dto;

        return $dto;
    }
}
