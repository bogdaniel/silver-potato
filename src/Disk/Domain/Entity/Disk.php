<?php

namespace App\Disk\Domain\Entity;

use App\Disk\Domain\Contract\DiskContract;
use App\Traits\Doctrine\Entity\UuidTrait;
use Ramsey\Uuid\UuidInterface;

final class Disk implements DiskContract
{
    use UuidTrait;

    public ?string $name = null;

    public ?string $path = null;

    public array $files = [];
    public ?int $id = null;

    public function __construct(null|UuidInterface|string $uuid, ?string $name = null, ?string $path = null, array $files = [])
    {
        $this->uuid = $uuid;
        $this->name = $name;
        $this->path = $path;
        $this->files = $files;
    }

    public static function createDisk(null|UuidInterface|string $uuid, string $name, string $path, array $files): self
    {
        return new self($uuid, $name, $path, $files);
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(?string $path): void
    {
        $this->path = $path;
    }

    public function getFiles(): array
    {
        return $this->files;
    }

    public function setFiles(array $files): void
    {
        $this->files = $files;
    }
}
