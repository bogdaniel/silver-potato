<?php

declare(strict_types=1);

namespace App\Disk\Presentation\List\Http;

use App\Disk\Domain\UseCases\List\Contract\ListDiskPresenterContract;
use App\Disk\Domain\UseCases\List\ListDiskResponse;

final class ListDiskHtmlPresenter implements ListDiskPresenterContract
{
    private ListDiskHtmlViewModel $viewModel;

    public function present(ListDiskResponse $response): void
    {
        $this->viewModel = new ListDiskHtmlViewModel();
        $this->viewModel->disks = $response->disks;
    }

    public function viewModel(): ListDiskHtmlViewModel
    {
        return $this->viewModel;
    }
}
