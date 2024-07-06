<?php

namespace App\Home\Domain\RepositoryInterface;

use App\Home\Domain\Entity\Sensor;

interface SensorRepositoryInterface
{
    public function save(Sensor $sensor): void;
}