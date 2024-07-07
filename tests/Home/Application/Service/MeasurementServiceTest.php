<?php

namespace App\Tests\Home\Application\Service;

use App\Home\Application\Service\MeasurementService;
use App\Home\Domain\Entity\Measurement;
use App\Home\Domain\Repository\MeasurementRepositoryInterface;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MeasurementServiceTest extends WebTestCase
{
    private $measurementRepository;
    private $measurementService;

    protected function setUp(): void
    {
        $this->measurementRepository = $this->createMock(MeasurementRepositoryInterface::class);
        $this->measurementService = new MeasurementService($this->measurementRepository);
    }

    public function testAddMeasurement()
    {
        $data = [
            'user' => 1,
            'year' => 1950,
            'variety' => 'Albariño',
            'type' => 'Dulce',
            'color' => 'Blanco',
            'temperature' => 12.5,
            'graduation' => 8,
            'ph' => 8,
            'observations' => null,
        ];

        $this->measurementRepository->expects($this->once())
            ->method('save')
            ->with($this->isInstanceOf(Measurement::class));

        $this->measurementService->addMeasurement($data);
    }

    public function testGetMeasurementsByUser()
    {
        $userId = 1;
        $measurements = [
            new Measurement($userId, 1950, 'Albariño', 'Dulce', 'Blanco', 12.5, 8, 8, null),
            new Measurement($userId, 1950, 'Merlot', 'Orange', 'Blanco', 11.5, 7, 6, 'Vino de origen francés')
        ];

        $this->measurementRepository->expects($this->once())
            ->method('findByMeasurements')
            ->with($userId);

        $result = $this->measurementService->getAllMeasurements($userId);

        $this->assertSame($measurements, $result);
    }
}