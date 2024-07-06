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

    public function findByTypeSensor(): array
    {
        return $this->createQueryBuilder('w')
                ->orderBy('w.id','ASC')
                ->getQuery()
                ->getResult()
        ;
    }

}

