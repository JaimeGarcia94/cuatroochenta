<?php

namespace App\Home\Application\Service;

use App\Home\Domain\Entity\Sensor;
use App\Home\Domain\RepositoryInterface\SensorRepositoryInterface;
use App\Home\Domain\RepositoryInterface\TypeSensorRepositoryInterface;

class SensorService
{
    private $sensorRepository;
    private $typeSensorRepository;

    public function __construct(SensorRepositoryInterface $sensorRepository, TypeSensorRepositoryInterface $typeSensorRepository)
    {
        $this->sensorRepository = $sensorRepository;
        $this->typeSensorRepository = $typeSensorRepository;
    }

    public function addSensor($data): Sensor
    {
        $objectTypeSensor = $this->typeSensorRepository->findById($data['typeSensor']);

        $sensor = new Sensor();
        $sensor->setUser($data['user']);
        $sensor->setValue($data['value']);
        $sensor->setTypeSensor($objectTypeSensor);
        $this->sensorRepository->save($sensor);

        return $sensor;
    }
}