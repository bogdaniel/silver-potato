<?php

declare(strict_types=1);

namespace App\Disk\Domain\UseCases\Update;

use App\Disk\Domain\UseCases\Update\Contract\UpdateDiskUseCaseContract;
use App\Disk\Domain\UseCases\Update\Contract\UpdateDiskPresenterContract;

final class UpdateDiskUseCase implements UpdateDiskUseCaseContract
{
    public function execute(UpdateDiskRequest $request, UpdateDiskPresenterContract $presenter): void
    {
        $response = new UpdateDiskResponse();

        // TODO: Run validations
        // TODO: Save Entity
        // TODO: Implement execute() method.

        $presenter->present($response);
    }
}
