<?php

namespace App\Traits\Doctrine\Entity;

trait SoftDeleteTrait
{
    use IsDeletedTrait;
    use DeletedAtTrait;
}
