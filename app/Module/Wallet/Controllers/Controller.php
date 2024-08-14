<?php

declare(strict_types=1);

namespace App\Module\Wallet\Controllers;

use App\DataMappers\DataMapper;
use App\Http\Controllers\Controller as BaseController;
use App\Http\Resources\MessagesResource;
use App\Module\Wallet\Commands\ProcessUpdateWalletAccountCommand;
use App\Module\Wallet\Contracts\Services\WalletService;
use App\Module\Wallet\DTO\UpdateWalletAccountDTO;
use App\Module\Wallet\Requests\UpdateAccountRequest;
use App\Module\Wallet\Resources\WalletResource;
use Illuminate\Bus\Dispatcher;
use Symfony\Component\HttpFoundation\Response;

final class Controller extends BaseController
{
    public function __construct(
        private readonly Dispatcher $dispatcher,
        private readonly WalletService $service
    ) {
    }

    public function show(string $uuid): WalletResource
    {
        return (new WalletResource($this->service->getWalletByUuid($uuid)))
            ->setStatusCode(Response::HTTP_OK);
    }

    public function updateAccount(string $uuid, UpdateAccountRequest $request, DataMapper $mapper): MessagesResource
    {
        $this->dispatcher->dispatch(
            new ProcessUpdateWalletAccountCommand(
                $uuid,
                $mapper->map($request, UpdateWalletAccountDTO::class)
            )
        );

        return (new MessagesResource())
            ->setStatusCode(Response::HTTP_CREATED)
            ->setMessage('Wallet account updated successfully');
    }
}
