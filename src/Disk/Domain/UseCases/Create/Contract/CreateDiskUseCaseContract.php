<?php

declare(strict_types=1);

namespace App\Disk\Domain\UseCases\Create\Contract;

use App\Disk\Domain\UseCases\Create\CreateDiskRequest;

interface CreateDiskUseCaseContract
{
    public function execute(CreateDiskRequest $request, CreateDiskPresenterContract $presenter): void;
}
