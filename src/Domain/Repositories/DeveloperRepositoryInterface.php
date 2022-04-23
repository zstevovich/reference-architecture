<?php declare(strict_types=1);

namespace Architecture\Domain\Repositories;

use Architecture\BuildingBlocks\RepositoryInterface;

interface DeveloperRepositoryInterface extends RepositoryInterface
{
    public function findByName(string $name) : array;
}