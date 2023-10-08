<?php

declare(strict_types=1);

namespace App\Disk\Domain\UseCases\List;

use App\Disk\Domain\Repository\DiskRepositoryContract;
use App\Disk\Domain\UseCases\List\Contract\ListDiskUseCaseContract;
use App\Disk\Domain\UseCases\List\Contract\ListDiskPresenterContract;

final class ListDiskUseCase implements ListDiskUseCaseContract
{
    private DiskRepositoryContract $diskRepositoryContract;

    public function __construct(DiskRepositoryContract $diskRepositoryContract)
    {

        $this->diskRepositoryContract = $diskRepositoryContract;
    }
    public function execute(ListDiskRequest $request, ListDiskPresenterContract $presenter): void
    {
        $response = new ListDiskResponse();
        $response->disks = $this->listDisk();
        $presenter->present($response);
    }

    public function listDisk() {
        return $this->diskRepositoryContract->getDiskList();
    }
}
