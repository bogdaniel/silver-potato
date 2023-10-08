<?php

declare(strict_types=1);

namespace App\Disk\Domain\UseCases\Read;

use App\Disk\Domain\UseCases\Read\Contract\ReadDiskUseCaseContract;
use App\Disk\Domain\UseCases\Read\Contract\ReadDiskPresenterContract;

final class ReadDiskUseCase implements ReadDiskUseCaseContract
{
    public function execute(ReadDiskRequest $request, ReadDiskPresenterContract $presenter): void
    {
        $response = new ReadDiskResponse();

        // TODO: Run validations
        // TODO: Save Entity
        // TODO: Implement execute() method.

        $presenter->present($response);
    }
}
