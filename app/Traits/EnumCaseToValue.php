<?php

namespace App\Traits;

use UnitEnum;

trait EnumCaseToValue
{
    public static function getValues(): array
    {
        return array_map(fn(UnitEnum $reason): string => $reason->value, self::cases());
    }
}
