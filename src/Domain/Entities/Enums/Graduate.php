<?php declare(strict_types=1);

namespace Architecture\Domain\Entities\Enums;

enum Graduate : int
{
    case JUNIOR = 0;
    case INTERMEDIATE = 1;
    case SENIOR = 2;
}