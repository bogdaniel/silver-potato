<?php

declare(strict_types=1);

namespace App\Disk\Domain\UseCases\Inspect\Contract;

use App\Disk\Domain\UseCases\Inspect\InspectDiskRequest;

interface InspectDiskUseCaseContract
{
    public function execute(InspectDiskRequest $request, InspectDiskPresenterContract $presenter): void;
}
