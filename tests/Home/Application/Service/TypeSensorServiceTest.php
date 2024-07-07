<?php

namespace App\Tests\Home\Application\Service;

use App\Home\Application\Service\TypeSensorService;
use App\Home\Domain\Entity\TypeSensor;
use App\Home\Domain\Repository\TypeSensorRepositoryInterface;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TypeSensorServiceTest extends WebTestCase
{
    private $typeSensorRepository;
    private $typeSensorService;

    protected function setUp(): void
    {
        $this->typeSensorRepository = $this->createMock(TypeSensorRepositoryInterface::class);
        $this->typeSensorService = new TypeSensorService($this->typeSensorRepository);
    }

    public function testGetAllTypeSensors()
    {
        $typeSensors = [
            new TypeSensor(1, 'Temperatura'),
            new TypeSensor(2, 'Ph'),
            new TypeSensor(3, 'Color'),
            new TypeSensor(4, 'Graduacion'),
        ];

        $this->typeSensorRepository->expects($this->once())
            ->method('findByTypeSensor')
            ->willReturn($typeSensors);

        $result = $this->typeSensorService->getAllTypeSensor();

        $this->assertSame($typeSensors, $result);
    }
}