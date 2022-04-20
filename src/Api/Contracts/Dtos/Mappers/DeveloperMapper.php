<?php declare(strict_types=1);

namespace Architecture\Api\Contracts\Dtos\Mappers;

use Architecture\Api\Contracts\Dtos\CommonDtos\DeveloperDto;
use Architecture\Domain\Entities\Developer;
use Illuminate\Support\Str;

class DeveloperMapper
{
    public static function toDeveloperDTO(DeveloperDto $developerDto): Developer
    {
        return new Developer(Str::uuid(), $developerDto->getName(), $developerDto->getLastName(), $developerDto->getGraduate());
    }
}