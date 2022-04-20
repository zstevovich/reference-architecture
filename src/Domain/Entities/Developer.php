<?php declare(strict_types=1);

namespace Architecture\Domain\Entities;

use Architecture\Domain\Entities\Enums\Graduate;
use Ramsey\Uuid\UuidInterface;

class Developer
{
    private UuidInterface $id;
    private string $name;
    private string $lastName;
    private Graduate $graduate;

    /**
     * @param UuidInterface $id
     * @param string $name
     * @param string $lastName
     * @param Graduate $graduate
     */
    public function __construct(UuidInterface $id, string $name, string $lastName, Graduate $graduate)
    {
        $this->id = $id;
        $this->name = $name;
        $this->lastName = $lastName;
        $this->graduate = $graduate;
    }

    /**
     * @return UuidInterface
     */
    public function getId(): UuidInterface
    {
        return $this->id;
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