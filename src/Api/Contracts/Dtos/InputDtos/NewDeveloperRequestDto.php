<?php declare(strict_types=1);

namespace Architecture\Api\Contracts\Dtos\InputDtos;

use Architecture\Api\Contracts\Dtos\CommonDtos\DeveloperDto;
use Architecture\Domain\Entities\Enums\Graduate;
use Ramsey\Uuid\Lazy\LazyUuidFromString;

final class NewDeveloperRequestDto extends DeveloperDto
{
    public function __construct(string $name, string $lastName, Graduate $graduate, ?LazyUuidFromString $id = null)
    {
        parent::__construct($id, $name, $lastName, $graduate);
    }
}