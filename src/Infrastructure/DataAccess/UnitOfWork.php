<?php declare(strict_types=1);

namespace Architecture\Infrastructure\DataAccess;

use Architecture\BuildingBlocks\UnitOfWorkRepositoryInterface;
use Architecture\Domain\Repositories\DeveloperRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Support\Facades\App;

class UnitOfWork implements UnitOfWorkRepositoryInterface
{
    protected EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em){
        $this->em = $em;
    }
    public function beginTransaction()
    {
        $this->em->beginTransaction();
    }

    public function commitTransaction()
    {
        $this->em->commit();
    }

    public function rollbackTransaction()
    {
        $this->em->rollback();
    }

    public function saveChanges()
    {
        $this->em->flush();
    }

    public function clearTracker()
    {
        $this->em->clear();
    }

    public function developerRepository(): DeveloperRepositoryInterface
    {
       return App::make('Architecture\Domain\Repositories\DeveloperRepositoryInterface');
    }


}