<?php declare(strict_types=1);

namespace Architecture\Api\Contracts\Dtos\OutputDtos;

use Architecture\Api\Contracts\Dtos\CommonDtos\DeveloperDto;

final class DeveloperResponseDto
{
    public ?string $error = null;
    public string $message;
    public ?string $graduateName;
    public ?DeveloperDto $developerDto;
    public array $developers = [];
    public function __construct(DeveloperDto $developerDto = null, ?string $error = null,string $message = "Information About developers!")
    {
        $this->developerDto = $developerDto;
        $this->message = $message;
        $this->graduateName = $developerDto?->graduate->name;
        $this->error = $error;
    }

    /**
     * @param array $developers
     */
    public function setDevelopers(array $developers): void
    {
        $this->developers = $developers;
    }

}