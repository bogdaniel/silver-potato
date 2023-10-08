<?php

declare(strict_types=1);

namespace App\Disk\Presentation\List\Api;

use App\Disk\Domain\UseCases\List\Contract\ListDiskPresenterContract;
use App\Disk\Domain\UseCases\List\ListDiskResponse;

final class ListDiskJsonPresenter implements ListDiskPresenterContract
{
    private ListDiskJsonViewModel $viewModel;

    public function present(ListDiskResponse $response): void
    {
        $this->viewModel = new ListDiskJsonViewModel();
    }

    public function viewModel(): ListDiskJsonViewModel
    {
        return $this->viewModel;
    }
}
