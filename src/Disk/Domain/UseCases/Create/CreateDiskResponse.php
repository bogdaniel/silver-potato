<?php

declare(strict_types=1);

namespace App\Disk\Domain\UseCases\Create;

use App\Disk\Domain\Contract\DiskContract;
use App\Disk\Domain\Entity\Disk;

final class CreateDiskResponse
{
    private ?array $violations = [];

    private ?DiskContract $disk = null;

    public ?string $name = null;
    public ?string $path = null;

    /**
     * @return Disk|null
     */
    public function getDisk(): ?DiskContract
    {
        return $this->disk;
    }

    /**
     * @param Disk|null $disk
     */
    public function setDisk(?DiskContract $disk): void
    {
        $this->disk = $disk;
    }

    /**
     * @return array|null
     */
    public function getViolations(): ?array
    {
        return $this->violations;
    }

    /**
     * @param array|null $violations
     */
    public function setViolations(?array $violations): void
    {
        $this->violations = $violations;
    }
}
