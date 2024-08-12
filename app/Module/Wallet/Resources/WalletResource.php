<?php

declare(strict_types=1);

namespace App\Module\Wallet\Resources;

use App\Http\Resources\BaseJsonResource;
use App\Module\Wallet\Models\Wallet;
use Illuminate\Http\Request;

/**
 * @OA\Schema(
 *     @OA\Property(property="uuid", type="string", example="asdfasdf-234124", description="Wallet UUID"),
 *     @OA\Property(property="balance", type="number", example="100.00", description="Wallet balance"),
 * )
 * @property-read Wallet $resource
 */
final class WalletResource extends BaseJsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'uuid'    => $this->resource->uuid,
            'balance' => $this->resource->balance,
        ];
    }
}
