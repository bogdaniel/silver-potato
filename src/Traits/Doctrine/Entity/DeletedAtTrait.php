<?php

namespace App\Traits\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;
use Safe\DateTimeImmutable;

trait DeletedAtTrait
{
    #[ORM\Column(type: 'datetime_immutable')]
    public readonly ?DateTimeImmutable $deletedAt;
}
