<?php declare(strict_types=1);

namespace Architecture\Infrastructure\DataAccess\Repositories;

use Architecture\Domain\Entities\Developer;
use Architecture\Domain\Repositories\DeveloperRepositoryInterface;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;
use Exception;
use RuntimeException;

class DeveloperRepository extends EntityRepository implements DeveloperRepositoryInterface
{
    private string $entity = "Architecture\Domain\Entities\Developer";

    public function __construct(EntityManager $entityManager)
    {
        $metadata = new ClassMetadata($this->entity);
        parent::__construct($entityManager, $metadata);
    }

    public function create(Developer $developer): Developer
    {
        $this->getEntityManager()->beginTransaction();
        try {
            $this->getEntityManager()->persist($developer);
            $this->getEntityManager()->flush();
            $this->getEntityManager()->commit();
        } catch (Exception $e) {
            $this->getEntityManager()->rollback();
            throw new RuntimeException($e->getMessage());
        }
        return $developer;
    }
}