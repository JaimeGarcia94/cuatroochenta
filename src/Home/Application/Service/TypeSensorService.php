<?php

namespace App\Home\Application\Service;

use App\Home\Domain\Entity\TypeSensor;
use App\Home\Domain\RepositoryInterface\TypeSensorRepositoryInterface;

class TypeSensorService
{
    private $typeSensorRepositoryInterface;

    public function __construct(TypeSensorRepositoryInterface $typeSensorRepositoryInterface)
    {
        $this->typeSensorRepositoryInterface = $typeSensorRepositoryInterface;
    }

    public function getAllTypeSensor(): array
    {
        $result = $this->typeSensorRepositoryInterface->findByTypeSensor();

        return $result;
    }

}