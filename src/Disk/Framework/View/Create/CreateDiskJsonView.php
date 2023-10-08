<?php

declare(strict_types=1);

namespace App\Disk\Framework\View\Create;

use App\Disk\Presentation\Create\Api\CreateDiskJsonViewModel;
use Symfony\Component\HttpFoundation\JsonResponse;

final class CreateDiskJsonView
{
    public function generateView(CreateDiskJsonViewModel $viewModel): JsonResponse
    {
        if ($viewModel->violations) {
            return new JsonResponse($viewModel->violations, 400);
        }

        return new JsonResponse([]);
    }
}
