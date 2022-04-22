<?php declare(strict_types=1);

namespace Architecture\Infrastructure\DataAccess\Repositories;

use Architecture\Domain\Repositories\DeveloperRepositoryInterface;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\ClassMetadata;

class DeveloperRepository extends BaseRepository implements DeveloperRepositoryInterface
{

    public function __construct(EntityManager $entityManager)
    {
        $entity = new ClassMetadata("Architecture\Domain\Entities\Developer");
        parent::__construct($entityManager,$entity);
    }
}