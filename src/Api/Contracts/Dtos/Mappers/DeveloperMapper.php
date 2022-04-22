<?php declare(strict_types=1);

namespace Architecture\Api\Contracts\Dtos\Mappers;

use Architecture\Api\Contracts\Dtos\CommonDtos\DeveloperDto;
use Architecture\Api\Contracts\Dtos\OutputDtos\NewDeveloperResponseDto;
use Architecture\Domain\Entities\Developer;

class DeveloperMapper
{
    public static function toEntity(DeveloperDto $developerDto): Developer
    {
        return new Developer($developerDto->id,$developerDto->name, $developerDto->lastName, $developerDto->graduate);
    }

    public static function toDto(Developer $developer): DeveloperDto
    {
        return new DeveloperDto(
            $developer->getId(), $developer->getName(), $developer->getLastName(),$developer->getGraduate()
        );
    }

    public static function toDeveloperResponse(Developer $developer, ?string $error, string $message = "Developer has been created!") : NewDeveloperResponseDto
    {
        return new NewDeveloperResponseDto(
            $developer->getId()->toString(),$developer->getName(),$developer->getLastName(),$developer->getGraduate(), $error, $message
        );
    }

    public static function toDeveloperDtoStream(array $developers) : array
    {
        /** @var Developer $developer */
        $stream = [];
        if(empty($developers)) return [];
        foreach ($developers as $developer){
            $stream[] = self::toDto($developer);
        }
        return $stream;
    }
}