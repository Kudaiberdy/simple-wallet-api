<?php

declare(strict_types=1);

namespace App\DataMappers;

interface DataMapper
{
    /**
     * @template T
     * @param mixed           $dataFromMap
     * @param class-string<T> $classToMap
     *
     * @return T
     */
    public function map(mixed $dataFromMap, string $classToMap): object;
}
