<?php

declare(strict_types=1);

namespace App\Disk\Domain\UseCases\Inspect;

use App\Disk\Domain\UseCases\Inspect\Contract\InspectDiskUseCaseContract;
use App\Disk\Domain\UseCases\Inspect\Contract\InspectDiskPresenterContract;

final class InspectDiskUseCase implements InspectDiskUseCaseContract
{
    public function execute(InspectDiskRequest $request, InspectDiskPresenterContract $presenter): void
    {
        $response = new InspectDiskResponse();

        // TODO: Run validations
        // TODO: Save Entity
        // TODO: Implement execute() method.

        $presenter->present($response);
    }
}
