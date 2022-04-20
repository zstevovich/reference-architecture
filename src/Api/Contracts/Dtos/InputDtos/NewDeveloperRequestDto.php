<?php declare(strict_types=1);

namespace Architecture\Api\Contracts\Dtos\InputDtos;

use Architecture\Api\Contracts\Dtos\CommonDtos\DeveloperDto;
use Architecture\Domain\Entities\Enums\Graduate;

final class NewDeveloperRequestDto extends DeveloperDto
{
    public function __construct(string $name, string $lastName, Graduate $graduate)
    {
        parent::__construct(null, $name, $lastName, $graduate);
    }
}