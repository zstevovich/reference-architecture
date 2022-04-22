<?php declare(strict_types=1);

namespace Architecture\BuildingBlocks;

use Doctrine\ORM\Mapping\Entity;
use Ramsey\Uuid\Lazy\LazyUuidFromString;

interface RepositoryInterface
{
    public function create(object $entity) : object;
    public function update(object $entity) : object;
    public function delete(object $entity) : bool;
    public function getById(LazyUuidFromString $id) : object;
}