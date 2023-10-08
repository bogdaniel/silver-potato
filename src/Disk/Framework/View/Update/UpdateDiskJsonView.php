<?php

declare(strict_types=1);

namespace App\Disk\Framework\View\Update;

use App\Disk\Presentation\Update\Api\UpdateDiskJsonViewModel;
use Symfony\Component\HttpFoundation\JsonResponse;

final class UpdateDiskJsonView
{
    public function generateView(UpdateDiskJsonViewModel $viewModel): JsonResponse
    {
        if ($viewModel->violations) {
            return new JsonResponse($viewModel->violations, 400);
        }

        return new JsonResponse([]);
    }
}
