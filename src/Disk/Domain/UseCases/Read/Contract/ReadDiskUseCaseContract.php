<?php

declare(strict_types=1);

namespace App\Disk\Domain\UseCases\Read\Contract;

use App\Disk\Domain\UseCases\Read\ReadDiskRequest;

interface ReadDiskUseCaseContract
{
    public function execute(ReadDiskRequest $request, ReadDiskPresenterContract $presenter): void;
}
