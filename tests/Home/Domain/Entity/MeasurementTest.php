<?php

namespace App\Tests\Home\Domain\Entity;

use App\Home\Domain\Entity\Measurement;
use App\Auth\Domain\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MeasurementTest extends WebTestCase
{   
    public function testGettersAndSetters()
    {
        $measurement = new Measurement();

        $user = $this->getUser();
        $measurement->setUser($user);
        $this->assertSame($user, $measurement->getUser());

        $year = 1950;
        $measurement->setYear($year);
        $this->assertEquals($year, $measurement->getYear());

        $variety = 'Albariño';
        $measurement->setVariety($variety);
        $this->assertEquals($variety, $measurement->getVariety());

        $type = 'Dulce';
        $measurement->setType($type);
        $this->assertEquals($type, $measurement->getType());

        $color = 'Blanco';
        $measurement->setColor($color);
        $this->assertEquals($color, $measurement->getColor());

        $temperature = 12.5;
        $measurement->setTemperature($temperature);
        $this->assertEquals($temperature, $measurement->getTemperature());

        $graduation = 8;
        $measurement->setGraduation($graduation);
        $this->assertEquals($graduation, $measurement->getGraduation());

        $ph = 8;
        $measurement->setPh($ph);
        $this->assertEquals($ph, $measurement->getPh());

        $observations = 'Este vino procede de España';
        $measurement->setObservations($observations);
        $this->assertEquals($observations, $measurement->getObservations());
    }
}