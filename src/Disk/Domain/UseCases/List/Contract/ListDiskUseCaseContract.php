<?php

declare(strict_types=1);

namespace App\Disk\Domain\UseCases\List\Contract;

use App\Disk\Domain\UseCases\List\ListDiskRequest;

interface ListDiskUseCaseContract
{
    public function execute(ListDiskRequest $request, ListDiskPresenterContract $presenter): void;
}
