<?php

declare(strict_types=1);

namespace App\Disk\Domain\UseCases\Update\Contract;

use App\Disk\Domain\UseCases\Update\UpdateDiskRequest;

interface UpdateDiskUseCaseContract
{
    public function execute(UpdateDiskRequest $request, UpdateDiskPresenterContract $presenter): void;
}
