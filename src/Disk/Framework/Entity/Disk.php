<?php

namespace App\Disk\Framework\Entity;

use App\Disk\Framework\Repository\DiskRepository;
use App\Traits\Doctrine\Entity\UuidTrait;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Doctrine\UuidGenerator;
use Ramsey\Uuid\UuidInterface;

#[ORM\Entity(repositoryClass: DiskRepository::class, readOnly: false)]
class Disk
{
    #[ORM\Id, ORM\Column(type: 'integer'), ORM\GeneratedValue(strategy: "IDENTITY")]
    private string $id;

    public function __construct(
        #[ORM\Column(type: "uuid", unique: true)]
        #[ORM\CustomIdGenerator(class: UuidGenerator::class)]
        public readonly null|UuidInterface|string $uuid,
        #[ORM\Column(type: 'string', length: 180, unique: true)]
        public readonly string $name,
        #[ORM\Column(type: 'string', length: 180, unique: true)]
        public readonly string $path,
        #[ORM\Column(type: 'json', nullable: true)]
        public readonly array $files = [],
    ) {
    }
}
