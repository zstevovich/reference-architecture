<?php declare(strict_types=1);

namespace Architecture\Api\Contracts\Dtos\Mappers;

use Architecture\Api\Contracts\Dtos\CommonDtos\DeveloperDto;
use Architecture\Domain\Entities\Developer;

class DeveloperMapper
{
    public static function toEntity(DeveloperDto $developerDto): Developer
    {
        return new Developer($developerDto->name, $developerDto->lastName, $developerDto->getGraduate(),$developerDto->id);
    }

    public static function toDto(Developer $developer): DeveloperDto
    {
        return new DeveloperDto(
            $developer->getId(), $developer->getName(), $developer->getLastName(),$developer->getGraduate()
        );
    }
}