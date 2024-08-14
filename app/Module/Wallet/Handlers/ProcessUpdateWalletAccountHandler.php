<?php

declare(strict_types=1);

namespace App\Module\Wallet\Handlers;

use App\Module\Wallet\Commands\ProcessUpdateWalletAccountCommand;
use App\Module\Wallet\Contracts\Pipe\TransactionProcessHandlerPipe;
use App\Module\Wallet\DTO\ProcessTransactionDTO;
use Illuminate\Contracts\Pipeline\Pipeline;

final readonly class ProcessUpdateWalletAccountHandler
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

    public function handle(ProcessUpdateWalletAccountCommand $command): void
    {
        $this->pipeline->send($this->prepareDTO($command))
            ->through($this->pipes)
            ->then(fn (ProcessTransactionDTO $dto): ProcessTransactionDTO => $dto);
    }

    private function prepareDTO(ProcessUpdateWalletAccountCommand $command): ProcessTransactionDTO
    {
        $dto = new ProcessTransactionDTO();

        $dto->updateWalletAccountDTO = $command->dto;

        return $dto;
    }
}
