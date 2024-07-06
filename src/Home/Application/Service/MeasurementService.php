<?php

namespace App\Home\Application\Service;

use App\Home\Domain\Entity\Measurement;
use App\Home\Domain\RepositoryInterface\MeasurementRepositoryInterface;

class MeasurementService
{
    private $measurementRepository;

    public function __construct(MeasurementRepositoryInterface $measurementRepository)
    {
        $this->measurementRepository = $measurementRepository;
    }

    public function addMeasurement($data): Measurement
    {

        // dd($data);
        // die();
        $measurement = new Measurement();
        $measurement->setUser($data['user']);
        $measurement->setYear($data['year']);
        $measurement->setVariety($data['variety']);
        $measurement->setType($data['type']);
        $measurement->setColor($data['color']);
        $measurement->setTemperature($data['temperature']);
        $measurement->setGraduation($data['graduation']);
        $measurement->setPh($data['ph']);
        $measurement->setObservations($data['observations']);
        $this->measurementRepository->save($measurement);

        return $measurement;
    }
}