<?php declare(strict_types=1);

namespace Architecture\Api\Contracts\Dtos\CommonDtos;

use Architecture\Domain\Entities\Enums\Graduate;
use Ramsey\Uuid\Lazy\LazyUuidFromString;

class DeveloperDto
{
    public ?string $id;
    public string $name;
    public string $lastName;
    public Graduate $graduate;

    public function __construct(string|LazyUuidFromString|null $id, string $name, string $lastName, Graduate $graduate)
    {
        $this->name = $name;
        $this->lastName = $lastName;
        $this->graduate = $graduate;
        $this->id = uuid_to_string($id);
    }
}