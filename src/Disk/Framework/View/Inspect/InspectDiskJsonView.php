<?php

declare(strict_types=1);

namespace App\Disk\Framework\View\Inspect;

use App\Disk\Presentation\Inspect\Api\InspectDiskJsonViewModel;
use Symfony\Component\HttpFoundation\JsonResponse;

final class InspectDiskJsonView
{
    public function generateView(InspectDiskJsonViewModel $viewModel): JsonResponse
    {
        if ($viewModel->violations) {
            return new JsonResponse($viewModel->violations, 400);
        }

        return new JsonResponse([]);
    }
}
