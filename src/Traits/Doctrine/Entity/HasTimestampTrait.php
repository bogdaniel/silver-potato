<?php

namespace App\Traits\Doctrine\Entity;

trait HasTimestampTrait
{
    use CreatedAtTimestampTrait;
    use UpdatedAtTimestampTrait;
}
