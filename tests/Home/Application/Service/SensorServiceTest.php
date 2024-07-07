<?php

namespace App\Tests\Home\Application\Service;

use App\Home\Application\Service\SensorService;
use App\Home\Domain\Entity\Sensor;
use App\Auth\Domain\Entity\User;
use App\Home\Domain\Entity\TypeSensor;
use App\Home\Domain\Repository\SensorRepositoryInterface;
use App\Home\Domain\Repository\TypeSensorRepositoryInterface;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SensorServiceTest extends WebTestCase
{
    private $sensorRepository;
    private $typeSensorRepository;
    private $sensorService;

    protected function setUp(): void
    {
        $this->sensorRepository = $this->createMock(SensorRepositoryInterface::class);
        $this->typeSensorRepository = $this->createMock(TypeSensorRepositoryInterface::class);
        $this->sensorService = new SensorService($this->sensorRepository, $this->typeSensorRepository);
    }

    public function testAddSensor()
    {
        $userId = 1;
        $typeId = 1;
        $value = 20;
        $typeSensor = new TypeSensor();
        $typeSensor->setId($typeId);
        $typeSensor->setName('Temperature');

        $typeObject = $this->typeSensorRepository->expects($this->once())
            ->method('findById')
            ->with($typeId)
            ->willReturn($typeSensor);

        $this->sensorRepository->expects($this->once())
            ->method('save')
            ->with($this->isInstanceOf(Sensor::class));

        $this->sensorService->addSensor($userId, $typeObject, $value);
    }
}