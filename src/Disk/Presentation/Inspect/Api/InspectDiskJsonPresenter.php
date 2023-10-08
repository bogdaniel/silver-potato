<?php

declare(strict_types=1);

namespace App\Disk\Presentation\Inspect\Api;

use App\Disk\Domain\UseCases\Inspect\Contract\InspectDiskPresenterContract;
use App\Disk\Domain\UseCases\Inspect\InspectDiskResponse;

final class InspectDiskJsonPresenter implements InspectDiskPresenterContract
{
    private InspectDiskJsonViewModel $viewModel;

    public function present(InspectDiskResponse $response): void
    {
        $this->viewModel = new InspectDiskJsonViewModel();
    }

    public function viewModel(): InspectDiskJsonViewModel
    {
        return $this->viewModel;
    }
}
