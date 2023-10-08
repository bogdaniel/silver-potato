<?php

declare(strict_types=1);

namespace App\Disk\Presentation\Update\Http;

use App\Disk\Domain\UseCases\Update\Contract\UpdateDiskPresenterContract;
use App\Disk\Domain\UseCases\Update\UpdateDiskResponse;

final class UpdateDiskHtmlPresenter implements UpdateDiskPresenterContract
{
    private UpdateDiskHtmlViewModel $viewModel;

    public function present(UpdateDiskResponse $response): void
    {
        $this->viewModel = new UpdateDiskHtmlViewModel();
    }

    public function viewModel(): UpdateDiskHtmlViewModel
    {
        return $this->viewModel;
    }
}
