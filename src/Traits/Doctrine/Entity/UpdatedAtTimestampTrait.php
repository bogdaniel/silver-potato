<?php

namespace App\Traits\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;
use Safe\DateTimeImmutable;

trait UpdatedAtTimestampTrait
{
    #[ORM\Column(type: 'datetime_immutable', options: ['default' => 'CURRENT_TIMESTAMP'])]
    public readonly ?DateTimeImmutable $updatedAt;
}
