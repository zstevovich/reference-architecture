<?php declare(strict_types=1);

namespace Architecture\Infrastructure\DataAccess\Repositories;

use Architecture\Domain\Entities\Developer;
use Architecture\Domain\Repositories\DeveloperRepositoryInterface;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;
use Exception;

class DeveloperRepository extends EntityRepository implements DeveloperRepositoryInterface
{
    public function __construct(EntityManager $entityManager)
    {
        $metadata = new ClassMetadata('Architecture\Domain\Entities\Developer');
        parent::__construct($entityManager, $metadata);
    }

    /**
     * @throws Exception
     */
    public function create(Developer $developer): Developer
    {
        $this->getEntityManager()->getUnitOfWork()->persist($developer);
        $this->getEntityManager()->getUnitOfWork()->commit();
        return $developer;
    }
}