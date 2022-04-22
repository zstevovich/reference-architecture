<?php declare(strict_types=1);

use Ramsey\Uuid\Lazy\LazyUuidFromString;

if (!function_exists('UuidFromString')) {

    function UuidFromString(string $uuid): LazyUuidFromString
    {
        return new LazyUuidFromString($uuid);
    }
}