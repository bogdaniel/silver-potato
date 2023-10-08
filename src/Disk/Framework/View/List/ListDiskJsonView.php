<?php

declare(strict_types=1);

namespace App\Disk\Framework\View\List;

use App\Disk\Presentation\List\Api\ListDiskJsonViewModel;
use Symfony\Component\HttpFoundation\JsonResponse;

final class ListDiskJsonView
{
    public function generateView(ListDiskJsonViewModel $viewModel): JsonResponse
    {
        if ($viewModel->violations) {
            return new JsonResponse($viewModel->violations, 400);
        }

        return new JsonResponse([]);
    }
}
