<?php declare(strict_types=1);

use Ramsey\Uuid\Lazy\LazyUuidFromString;

if (!function_exists('uuid_from_string')) {

    function uuid_from_string(mixed $uuid): ?LazyUuidFromString
    {
        if ($uuid instanceof LazyUuidFromString) return $uuid;
        return is_string($uuid) ? new LazyUuidFromString($uuid) : null;
    }
}
if (!function_exists('uuid_to_string')) {

    function uuid_to_string(mixed $uuid): ?string
    {
        if ($uuid instanceof LazyUuidFromString) return $uuid->toString();
        if (is_string($uuid)) return $uuid;
        return null;
    }
}