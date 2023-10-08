<?php

declare(strict_types=1);

namespace App\Disk\Domain\UseCases\Read\Contract;

use App\Disk\Domain\UseCases\Read\ReadDiskResponse;

interface ReadDiskPresenterContract
{
    public function present(ReadDiskResponse $response);
}
