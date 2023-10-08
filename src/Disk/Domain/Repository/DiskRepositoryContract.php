<?php

declare(strict_types=1);

namespace App\Disk\Domain\Repository;

use App\Disk\Domain\Entity\Disk;

interface DiskRepositoryContract
{
    public function add(Disk $domainDisk): void;

    public function remove(Disk $domainDisk, bool $flush = false): void;

    public function save(Disk $disk);
}
