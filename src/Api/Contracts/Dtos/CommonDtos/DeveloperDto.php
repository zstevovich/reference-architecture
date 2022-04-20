<?php declare(strict_types=1);

namespace Architecture\Api\Contracts\Dtos\CommonDtos;

use Architecture\Domain\Entities\Enums\Graduate;
use Ramsey\Uuid\Guid\Guid;
use Ramsey\Uuid\UuidInterface;

class DeveloperDto
{
    public ?string $id;
    public string $name;
    public string $lastName;
    protected Graduate $graduate;

    protected function __construct(?string $id, string $name, string $lastName, Graduate $graduate)
    {
        $this->name = $name;
        $this->lastName = $lastName;
        $this->graduate = $graduate;
        $this->id = $id;
    }

    public function getGraduate(): Graduate
    {
        return $this->graduate;
    }

}