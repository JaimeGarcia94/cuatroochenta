<?php

namespace App\Home\Infraestructure\Doctrine\Repository;

use App\Home\Domain\Entity\TypeSensor;
use App\Home\Domain\RepositoryInterface\TypeSensorRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

class TypeSensorRepository extends EntityRepository implements TypeSensorRepositoryInterface
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;

        $class = $entityManager->getClassMetadata(TypeSensor::class);
        parent::__construct($entityManager, $class);
    }

    public function findById($id): TypeSensor
    {
        return $this->createQueryBuilder('w')
           ->andWhere('w.id = :id')
           ->setMaxResults(1)
           ->setParameter('id', $id)
           ->getQuery()
           ->getOneOrNullResult()
       ;
    }

    public function findByTypeSensor(): array
    {
        return $this->createQueryBuilder('w')
                ->orderBy('w.id','ASC')
                ->getQuery()
                ->getResult()
        ;
    }

}

