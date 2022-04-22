<?php declare(strict_types=1);

namespace Architecture\Domain\Entities;

use Doctrine\DBAL\Types\Types;
use Ramsey\Uuid\Doctrine\UuidGenerator;
use Ramsey\Uuid\Lazy\LazyUuidFromString;
use Doctrine\ORM\Mapping as ORM;

#[ORM\MappedSuperclass]
abstract class BaseEntity
{
    #[ORM\Column(type: Types::GUID)]
    #[ORM\Id, ORM\GeneratedValue(strategy: 'CUSTOM'), ORM\CustomIdGenerator(class: UuidGenerator::class)]
    protected ?LazyUuidFromString $id;

    public function getId(): ?string
    {
        return $this->id?->toString();
    }
}