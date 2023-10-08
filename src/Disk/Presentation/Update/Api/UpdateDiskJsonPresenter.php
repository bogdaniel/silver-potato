<?php

declare(strict_types=1);

namespace App\Disk\Presentation\Update\Api;

use App\Disk\Domain\UseCases\Update\Contract\UpdateDiskPresenterContract;
use App\Disk\Domain\UseCases\Update\UpdateDiskResponse;

final class UpdateDiskJsonPresenter implements UpdateDiskPresenterContract
{
    private UpdateDiskJsonViewModel $viewModel;

    public function present(UpdateDiskResponse $response): void
    {
        $this->viewModel = new UpdateDiskJsonViewModel();
    }

    public function viewModel(): UpdateDiskJsonViewModel
    {
        return $this->viewModel;
    }
}
