<?php

namespace App\Home\Infraestructure\Doctrine\Repository;

use App\Home\Domain\Entity\Sensor;
use App\Home\Domain\RepositoryInterface\SensorRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

class SensorRepository extends EntityRepository implements SensorRepositoryInterface
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;

        $class = $entityManager->getClassMetadata(Sensor::class);
        parent::__construct($entityManager, $class);
    }

    public function save(Sensor $sensor): void
    {
        $this->entityManager->persist($sensor);
        $this->entityManager->flush();
    }
}

