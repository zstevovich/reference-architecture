<?php declare(strict_types=1);

namespace Architecture\Infrastructure\DataAccess\Repositories;

use Architecture\BuildingBlocks\RepositoryInterface;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityNotFoundException;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\Mapping\Entity;
use PDOException;

class BaseRepository extends EntityRepository implements RepositoryInterface
{

    public function __construct(EntityManager $entityManager, ClassMetadata $metadata)
    {
        parent::__construct($entityManager, $metadata);
    }

    public function create(object $entity): object
    {
        $this->getEntityManager()->persist($entity);
        return $entity;
    }

    /**
     * @throws EntityNotFoundException
     */
    public function update(object $entity): object
    {
        $this->getById($entity->getId());
        $this->getEntityManager()->persist($entity);
        return $entity;
    }

    public function delete(object $entity): bool
    {
        try {
            $this->getEntityManager()->remove($entity);
            return true;
        } catch (PDOException) {
            return false;
        }
    }

    /**
     * @throws EntityNotFoundException
     */
    public function getById(int $id): object
    {
        $entity = $this->find($id);
        if ($entity) {
            return $entity;
        }
        throw new EntityNotFoundException("Entity not found");
    }
}