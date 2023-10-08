<?php

declare(strict_types=1);

namespace App\Disk\Domain\UseCases\Create;

use App\Traits\Doctrine\Entity\IdTrait;
use App\Traits\Doctrine\Entity\UuidTrait;
use Ramsey\Uuid\UuidInterface;

final class CreateDiskRequest
{
    use IdTrait;
    use UuidTrait;

    public function __construct(
        public readonly UuidInterface|string|null $uuid = null,
        public readonly ?string $name = null,
        public readonly ?string $path = null,
        public readonly array $files = [],
        public readonly ?array $violations = null,
        public readonly bool $isPosted = false
    ) {
    }
}
