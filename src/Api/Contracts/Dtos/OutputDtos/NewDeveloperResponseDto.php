<?php declare(strict_types=1);

namespace Architecture\Api\Contracts\Dtos\OutputDtos;

use Architecture\Api\Contracts\Dtos\CommonDtos\DeveloperDto;
use Architecture\Domain\Entities\Enums\Graduate;
use JetBrains\PhpStorm\Pure;

final class NewDeveloperResponseDto extends DeveloperDto
{
    public string $message;
    public string $graduateName;
    #[Pure] public function __construct(string $name, string $lastName, Graduate $graduate)
    {
        parent::__construct($name, $lastName, $graduate);
        $this->message = "Developer has been created!";
        $this->graduateName = $graduate->name;
    }
}