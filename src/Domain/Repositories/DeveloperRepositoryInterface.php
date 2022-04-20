<?php declare(strict_types=1);

namespace Architecture\Domain\Repositories;

use Architecture\Domain\Entities\Developer;

interface DeveloperRepositoryInterface
{
    public function create(Developer $developer): Developer;
}