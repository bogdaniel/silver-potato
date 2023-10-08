<?php

declare(strict_types=1);

namespace App\Disk\Presentation\Read\Http;

use App\Disk\Domain\UseCases\Read\Contract\ReadDiskPresenterContract;
use App\Disk\Domain\UseCases\Read\ReadDiskResponse;

final class ReadDiskHtmlPresenter implements ReadDiskPresenterContract
{
    private ReadDiskHtmlViewModel $viewModel;

    public function present(ReadDiskResponse $response): void
    {
        $this->viewModel = new ReadDiskHtmlViewModel();
    }

    public function viewModel(): ReadDiskHtmlViewModel
    {
        return $this->viewModel;
    }
}
