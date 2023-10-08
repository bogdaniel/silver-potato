<?php

declare(strict_types=1);

namespace App\Disk\Domain\UseCases\Create;

use App\Disk\Domain\Entity\Disk;
use App\Disk\Domain\Repository\DiskRepositoryContract;
use App\Disk\Domain\UseCases\Create\Contract\CreateDiskPresenterContract;
use App\Disk\Domain\UseCases\Create\Contract\CreateDiskUseCaseContract;
use JetBrains\PhpStorm\NoReturn;
use PHPUnit\Exception;

final class CreateDiskUseCase implements CreateDiskUseCaseContract
{
    private DiskRepositoryContract $diskRepositoryContract;

    public function __construct(DiskRepositoryContract $diskRepositoryContract)
    {

        $this->diskRepositoryContract = $diskRepositoryContract;
    }

    /**
     * @param CreateDiskRequest $request
     * @param CreateDiskPresenterContract $presenter
     */
    #[NoReturn]
    public function execute(CreateDiskRequest $request, CreateDiskPresenterContract $presenter): void
    {
        $response = new CreateDiskResponse();
        $response->setViolations(null);
        $response->setDisk(null);

        if ($request->violations) {
            $response->setViolations($request->violations);
        }

        if ($request->isPosted && null === $request->violations) {
            $disk = $this->saveDisk($request);
            $response->setDisk($disk);
        }

        $presenter->present($response);
    }
    public function saveDisk(CreateDiskRequest $createDiskRequest): Disk
    {
        $disk = Disk::createDisk(
            $createDiskRequest->uuid,
            $createDiskRequest->name,
            $createDiskRequest->path,
            $createDiskRequest->files
        );

        $this->diskRepositoryContract->add($disk);

        return $disk;
    }
}
