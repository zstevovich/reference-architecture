<?php declare(strict_types=1);

namespace Architecture\Infrastructure\DataAccess\Repositories;

use Architecture\Domain\Entities\Developer;
use Architecture\Domain\Repositories\DeveloperRepositoryInterface;

class DeveloperRepository implements DeveloperRepositoryInterface
{
    public function create(Developer $developer): Developer
    {
        return $developer;
    }
}