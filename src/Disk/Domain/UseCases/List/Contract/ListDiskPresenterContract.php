<?php

declare(strict_types=1);

namespace App\Disk\Domain\UseCases\List\Contract;

use App\Disk\Domain\UseCases\List\ListDiskResponse;

interface ListDiskPresenterContract
{
    public function present(ListDiskResponse $response);
}
