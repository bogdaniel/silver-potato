<?php

declare(strict_types=1);

namespace App\Disk\Presentation\Create\Http;

use App\Disk\Domain\UseCases\Create\Contract\CreateDiskPresenterContract;
use App\Disk\Domain\UseCases\Create\CreateDiskResponse;

final class CreateDiskHtmlPresenter implements CreateDiskPresenterContract
{
    private CreateDiskHtmlViewModel $viewModel;

    public function present(CreateDiskResponse $response): void
    {
        $this->viewModel = new CreateDiskHtmlViewModel();
        $this->viewModel->name = $response->getDisk()?->getName();
        $this->viewModel->violations = $response->getViolations();
    }

    public function viewModel(): CreateDiskHtmlViewModel
    {
        return $this->viewModel;
    }
}
