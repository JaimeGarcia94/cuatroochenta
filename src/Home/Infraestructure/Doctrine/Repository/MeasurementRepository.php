<?php

namespace App\Home\Infraestructure\Doctrine\Repository;

use App\Home\Domain\Entity\Measurement;
use App\Home\Domain\RepositoryInterface\MeasurementRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

class MeasurementRepository extends EntityRepository implements MeasurementRepositoryInterface
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;

        $class = $entityManager->getClassMetadata(Measurement::class);
        parent::__construct($entityManager, $class);
    }

    public function findByMeasurements($user): array
    {
        return $this->createQueryBuilder('w')
                ->andWhere('w.user = :user')
                ->orderBy('w.id','DESC')
                ->setParameter('user', $user)
                ->getQuery()
                ->getResult()
        ;
    }

    public function save(Measurement $measurement): void
    {
        $this->entityManager->persist($measurement);
        $this->entityManager->flush();
    }
}

