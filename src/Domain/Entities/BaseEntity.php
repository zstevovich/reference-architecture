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
        $this->id = $id ? new LazyUuidFromString("7b71ba24-9772-478c-90a8-37a86c1e9cad") : null;
    }


    public function getId(): string|LazyUuidFromString|null
    {
        return $this->id;
    }
}