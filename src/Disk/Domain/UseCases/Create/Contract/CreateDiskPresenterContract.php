<?php

declare(strict_types=1);

namespace App\Disk\Domain\UseCases\Create\Contract;

use App\Disk\Domain\UseCases\Create\CreateDiskResponse;

interface CreateDiskPresenterContract
{
    public function present(CreateDiskResponse $response);
}
