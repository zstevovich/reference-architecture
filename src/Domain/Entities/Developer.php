<?php declare(strict_types=1);

namespace Architecture\Domain\Entities;

use Architecture\Domain\Entities\Enums\Graduate;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Column;
use Ramsey\Uuid\Doctrine\UuidGenerator;
use Ramsey\Uuid\Lazy\LazyUuidFromString;


#[ORM\Entity(repositoryClass: 'Architecture\Infrastructure\DataAccess\Repositories\DeveloperRepository', readOnly: false)]
class Developer
{
    #[ORM\Column(type: Types::GUID)]
    #[ORM\Id, ORM\GeneratedValue(strategy: 'CUSTOM'), ORM\CustomIdGenerator(class: UuidGenerator::class)]
    private ?LazyUuidFromString $id;

    #[ORM\Column(type: Types::STRING)]
    private string $name;

    #[ORM\Column(type: Types::STRING)]
    private string $lastName;

    #[Column(type: 'string', enumType: Graduate::class)]
    private Graduate $graduate;

    public function __construct(string $name, string $lastName, Graduate $graduate)
    {
        $this->name = $name;
        $this->lastName = $lastName;
        $this->graduate = $graduate;
        $this->id = null;
    }

    public function getId(): ?string
    {
        return $this->id?->toString();
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