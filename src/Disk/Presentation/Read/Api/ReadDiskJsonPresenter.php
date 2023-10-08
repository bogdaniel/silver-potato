<?php

declare(strict_types=1);

namespace App\Disk\Presentation\Read\Api;

use App\Disk\Domain\UseCases\Read\Contract\ReadDiskPresenterContract;
use App\Disk\Domain\UseCases\Read\ReadDiskResponse;

final class ReadDiskJsonPresenter implements ReadDiskPresenterContract
{
    private ReadDiskJsonViewModel $viewModel;

    public function present(ReadDiskResponse $response): void
    {
        $this->viewModel = new ReadDiskJsonViewModel();
    }

    public function viewModel(): ReadDiskJsonViewModel
    {
        return $this->viewModel;
    }
}
