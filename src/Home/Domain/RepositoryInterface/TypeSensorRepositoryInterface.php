<?php

namespace App\Home\Domain\RepositoryInterface;

use App\Home\Domain\Entity\TypeSensor;

interface TypeSensorRepositoryInterface
{
    public function findById($id): TypeSensor;
    public function findByTypeSensor(): array;
}