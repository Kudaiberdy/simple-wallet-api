<?php

declare(strict_types=1);

namespace App\Http\Resources;

final class MessagesResource extends BaseJsonResource
{
    public function __construct($resource = null)
    {
        parent::__construct($resource);
    }

    public function toArray($request): array
    {
        return [
            'data' => $this->resource
        ];
    }
}
