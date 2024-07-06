<?php

namespace App\Home\Domain\RepositoryInterface;

use App\Home\Domain\Entity\Measurement;

interface MeasurementRepositoryInterface
{
    public function save(Measurement $measurement): void;
}