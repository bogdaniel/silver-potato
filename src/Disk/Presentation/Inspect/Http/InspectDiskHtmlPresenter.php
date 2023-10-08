<?php

declare(strict_types=1);

namespace App\Disk\Presentation\Inspect\Http;

use App\Disk\Domain\UseCases\Inspect\Contract\InspectDiskPresenterContract;
use App\Disk\Domain\UseCases\Inspect\InspectDiskResponse;

final class InspectDiskHtmlPresenter implements InspectDiskPresenterContract
{
    private InspectDiskHtmlViewModel $viewModel;

    public function present(InspectDiskResponse $response): void
    {
        $this->viewModel = new InspectDiskHtmlViewModel();
    }

    public function viewModel(): InspectDiskHtmlViewModel
    {
        return $this->viewModel;
    }
}
