<?php

namespace App\Home\Application\Service;

use App\Home\Domain\Entity\TypeSensor;
use App\Home\Domain\RepositoryInterface\TypeSensorRepositoryInterface;

class TypeSensorService
{
    private $typeSensorRepository;

    public function __construct(TypeSensorRepositoryInterface $typeSensorRepository)
    {
        $this->typeSensorRepository = $typeSensorRepository;
    }

    public function getAllTypeSensor(): array
    {
        $result = $this->typeSensorRepository->findByTypeSensor();

        return $result;
    }

}