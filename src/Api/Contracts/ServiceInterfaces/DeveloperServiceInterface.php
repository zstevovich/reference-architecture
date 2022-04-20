<?php declare(strict_types=1);

namespace Architecture\Api\Contracts\ServiceInterfaces;

use Architecture\Api\Contracts\Dtos\InputDtos\NewDeveloperDto;
use Architecture\Api\Contracts\Dtos\OutputDtos\NewDeveloperResponseDto;

interface DeveloperServiceInterface
{
    public function AddNewDeveloper(NewDeveloperDto $newDeveloperDto) : NewDeveloperResponseDto;
}