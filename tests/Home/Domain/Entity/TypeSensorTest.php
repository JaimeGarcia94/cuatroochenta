<?php

namespace App\Tests\Home\Domain\Entity;

use App\Home\Domain\Entity\TypeSensor;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TypeSensorTest extends WebTestCase
{
    public function testGettersAndSetters()
    {
        $typeSensor = new TypeSensor();

        $name = 'Temperatura';
        $typeSensor->setName($name);
        $this->assertEquals($name, $typeSensor->getName());
    }
}