<?php declare(strict_types=1);

namespace Architecture\Domain\Entities;

use Architecture\Domain\Entities\Enums\Graduate;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Column;

#[ORM\Entity(repositoryClass: 'Architecture\Infrastructure\DataAccess\Repositories\DeveloperRepository', readOnly: false)]
class Developer extends BaseEntity
{
    #[ORM\Column(type: Types::STRING)]
    private string $name;

    #[ORM\Column(type: Types::STRING)]
    private string $lastName;

    #[Column(type: 'integer', enumType: Graduate::class)]
    private Graduate $graduate;

    public function __construct(string $name, string $lastName, Graduate $graduate, ?string $id = null)
    {
        parent::__construct($id);
        $this->name = $name;
        $this->lastName = $lastName;
        $this->graduate = $graduate;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getGraduate(): Graduate
    {
        return $this->graduate;
    }
}