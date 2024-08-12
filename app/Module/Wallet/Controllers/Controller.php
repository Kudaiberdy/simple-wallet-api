<?php

declare(strict_types=1);

namespace App\Module\Wallet\Controllers;

use App\Http\Controllers\Controller as BaseController;
use App\Module\Wallet\Contracts\Services\WalletService;
use App\Module\Wallet\Resources\WalletResource;
use Symfony\Component\HttpFoundation\Response;

final class Controller extends BaseController
{
    public function __construct(
        private readonly WalletService $service
    ) {
    }

    public function show(string $uuid): WalletResource
    {
        return (new WalletResource($this->service->getWalletByUuid($uuid)))
            ->setStatusCode(Response::HTTP_OK);
    }
}
