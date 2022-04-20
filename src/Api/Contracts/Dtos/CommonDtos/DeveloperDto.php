<?php declare(strict_types=1);

namespace Architecture\Api\Contracts\Dtos\CommonDtos;

use Architecture\Domain\Entities\Enums\Graduate;

class DeveloperDto
{
    public string $name;
    public string $lastName;
    protected Graduate $graduate;

    /**
     * @param string $name
     * @param string $lastName
     * @param Graduate $graduate
     */
    protected function __construct(string $name, string $lastName, Graduate $graduate)
    {
        $this->name = $name;
        $this->lastName = $lastName;
        $this->graduate = $graduate;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return Graduate
     */
    public function getGraduate(): Graduate
    {
        return $this->graduate;
    }

}