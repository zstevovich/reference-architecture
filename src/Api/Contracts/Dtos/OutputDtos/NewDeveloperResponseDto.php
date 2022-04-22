<?php declare(strict_types=1);

namespace Architecture\Api\Contracts\Dtos\OutputDtos;

use Architecture\Api\Contracts\Dtos\CommonDtos\DeveloperDto;
use Architecture\Domain\Entities\Enums\Graduate;

final class NewDeveloperResponseDto extends DeveloperDto
{
    public ?string $error = null;
    public string $message;
    public string $graduateName;
    public function __construct(string $id, string $name, string $lastName, Graduate $graduate, ?string $error = null)
    {
        parent::__construct($id, $name, $lastName, $graduate);
        $this->message = "Developer has been created!";
        $this->graduateName = $graduate->name;
        $this->error = $error;
    }
}