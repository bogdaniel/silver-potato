<?php

declare(strict_types=1);

namespace App\Disk\Domain\UseCases\Inspect\Contract;

use App\Disk\Domain\UseCases\Inspect\InspectDiskResponse;

interface InspectDiskPresenterContract
{
    public function present(InspectDiskResponse $response);
}
