<?php declare(strict_types=1);

namespace Architecture\Api\Contracts\ServiceInterfaces;

use Architecture\Api\Contracts\Dtos\InputDtos\NewDeveloperRequestDto;
use Architecture\Api\Contracts\Dtos\OutputDtos\DeveloperResponseDto;

interface DeveloperServiceInterface
{
    public function addNewDeveloper(NewDeveloperRequestDto $newDeveloperDto) : DeveloperResponseDto;
    public function updateDeveloper(NewDeveloperRequestDto $newDeveloperDto) : DeveloperResponseDto;
    public function getDeveloper(string $developerId) : DeveloperResponseDto;
    public function deleteDeveloper(string $developerId): bool;
    public function getAll(): DeveloperResponseDto;
    public function findByName(string $name): DeveloperResponseDto;
}