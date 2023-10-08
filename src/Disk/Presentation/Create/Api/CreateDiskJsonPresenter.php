<?php

declare(strict_types=1);

namespace App\Disk\Presentation\Create\Api;

use App\Disk\Domain\UseCases\Create\Contract\CreateDiskPresenterContract;
use App\Disk\Domain\UseCases\Create\CreateDiskResponse;

final class CreateDiskJsonPresenter implements CreateDiskPresenterContract
{
    private CreateDiskJsonViewModel $viewModel;

    public function present(CreateDiskResponse $response): void
    {
        $this->viewModel = new CreateDiskJsonViewModel();
    }

    public function viewModel(): CreateDiskJsonViewModel
    {
        return $this->viewModel;
    }
}
