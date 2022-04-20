<?php declare(strict_types=1);

namespace Architecture\Api\Contracts\Dtos\OutputDtos;

use Architecture\Api\Contracts\Dtos\CommonDtos\DeveloperDto;
use Architecture\Domain\Entities\Enums\Graduate;
use JetBrains\PhpStorm\Pure;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

final class NewDeveloperResponseDto extends DeveloperDto
{
    public string $message;
    public string $graduateName;
    #[Pure] public function __construct(string $id, string $name, string $lastName, Graduate $graduate)
    {
        parent::__construct($id, $name, $lastName, $graduate);
        $this->message = "Developer has been created!";
        $this->graduateName = $graduate->name;
    }
}