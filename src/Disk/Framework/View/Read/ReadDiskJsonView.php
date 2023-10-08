<?php

declare(strict_types=1);

namespace App\Disk\Framework\View\Read;

use App\Disk\Presentation\Read\Api\ReadDiskJsonViewModel;
use Symfony\Component\HttpFoundation\JsonResponse;

final class ReadDiskJsonView
{
    public function generateView(ReadDiskJsonViewModel $viewModel): JsonResponse
    {
        if ($viewModel->violations) {
            return new JsonResponse($viewModel->violations, 400);
        }

        return new JsonResponse([]);
    }
}
