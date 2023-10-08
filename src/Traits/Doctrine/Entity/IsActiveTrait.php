<?php

namespace App\Traits\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

trait IsActiveTrait
{
    #[ORM\Column(options: ['default' => false])]
    public readonly bool $isActive;
}
