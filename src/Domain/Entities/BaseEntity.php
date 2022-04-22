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
    protected string|LazyUuidFromString|null $id;

    public function __construct(?string $id)
    {
        $this->id = $id ? new LazyUuidFromString($id) : null;
    }


    public function getId(): string|LazyUuidFromString|null
    {
        return $this->id;
    }

    /**
     * @param LazyUuidFromString|string|null $id
     */
    public function setId(string|LazyUuidFromString|null $id): void
    {
        $this->id = $id;
    }
}