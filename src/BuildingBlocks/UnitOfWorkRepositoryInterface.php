<?php declare(strict_types=1);

namespace Architecture\BuildingBlocks;

use Architecture\Domain\Repositories\DeveloperRepositoryInterface;

interface UnitOfWorkRepositoryInterface
{
    public function beginTransaction();
    public function commitTransaction();
    public function rollbackTransaction();
    public function saveChanges();
    public function clearTracker();

    public function developerRepository(): DeveloperRepositoryInterface;
}