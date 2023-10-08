<?php

declare(strict_types=1);

namespace App\Disk\Framework\Repository;

use App\Disk\Domain\Entity\Disk as DomainDisk;
use App\Disk\Domain\Repository\DiskRepositoryContract;
use App\Disk\Framework\Entity\Disk;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Disk>
 *
 * @method DomainDisk|null find($id, $lockMode = null, $lockVersion = null)
 * @method DomainDisk|null findOneBy(array $criteria, array $orderBy = null)
 * @method DomainDisk[]    findAll()
 * @method DomainDisk[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
final class DiskRepository extends ServiceEntityRepository implements DiskRepositoryContract
{
    public function __construct(ManagerRegistry $registry,)
    {
        parent::__construct($registry, Disk::class);
    }

    public function add(DomainDisk $domainDisk): void
    {
        $disk = new Disk(
            $domainDisk->uuid->toString(),
            $domainDisk->name,
            $domainDisk->path,
            $domainDisk->files
        );

        $this->getEntityManager()->persist($disk);
        $this->getEntityManager()->flush();
    }

    public function remove(DomainDisk $domainDisk, bool $flush = false): void
    {
        // TODO: Implement remove() method.
    }

    public function save(DomainDisk $disk)
    {
        // TODO: Implement save() method.
    }

    public function getDiskList()
    {
        foreach ($this->findAll([], ['name' => 'ASC']) as $disk) {
            yield new DomainDisk($disk->uuid, $disk->name, $disk->path, $disk->files);
        }
    }
}
