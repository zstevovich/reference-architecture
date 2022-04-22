<?php declare(strict_types=1);

namespace Architecture\Api\Contracts\ServiceInterfaces;

use Architecture\Api\Contracts\Dtos\InputDtos\NewDeveloperRequestDto;
use Architecture\Api\Contracts\Dtos\OutputDtos\NewDeveloperResponseDto;

interface DeveloperServiceInterface
{
    public function addNewDeveloper(NewDeveloperRequestDto $newDeveloperDto) : NewDeveloperResponseDto;
    public function updateDeveloper(NewDeveloperRequestDto $newDeveloperDto) : NewDeveloperResponseDto;
}