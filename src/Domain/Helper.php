<?php declare(strict_types=1);

use Ramsey\Uuid\Lazy\LazyUuidFromString;

if (!function_exists('UuidFromString')) {

    function UuidFromString(mixed $uuid): ?LazyUuidFromString
    {
        if ($uuid instanceof LazyUuidFromString) return $uuid;
        return is_string($uuid) ? new LazyUuidFromString($uuid) : null;
    }
}