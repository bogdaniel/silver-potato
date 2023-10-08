<?php

declare(strict_types=1);

namespace App\Disk\Presentation\Create\Http;

final class CreateDiskHtmlViewModel
{
    public ?string $name = null;

    public ?array $violations = [];
}
