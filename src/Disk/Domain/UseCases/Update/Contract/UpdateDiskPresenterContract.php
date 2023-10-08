<?php

declare(strict_types=1);

namespace App\Disk\Domain\UseCases\Update\Contract;

use App\Disk\Domain\UseCases\Update\UpdateDiskResponse;

interface UpdateDiskPresenterContract
{
    public function present(UpdateDiskResponse $response);
}
