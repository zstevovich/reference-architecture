<?php declare(strict_types=1);

namespace Architecture\Api\Contracts\Dtos\OutputDtos;

use Architecture\Api\Contracts\Dtos\CommonDtos\DeveloperDto;
use Architecture\Domain\Entities\Enums\Graduate;

class DeveloperDeleteResponseDto extends DeveloperDto
{
    public ?string $error = null;
    public string $message;
    public string $graduateName;
    public function __construct(
        string $id, string $name, string $lastName, Graduate $graduate, ?string $error = null,
        string $message = "Developer has been deleted!"
    )
    {
        parent::__construct($id, $name, $lastName, $graduate);
        $this->message = $message;
        $this->graduateName = $graduate->name;
        $this->error = $error;
    }
}