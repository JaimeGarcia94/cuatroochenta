<?php

namespace App\Tests\Home\Domain\Entity;

use App\Home\Domain\Entity\Sensor;
use App\Home\Domain\Entity\TypeSensor;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SensorTest extends WebTestCase
{
    public function testGettersAndSetters()
    {
        $sensor = new Sensor();

        $user = $this->getUser();
        $sensor->setUser($user);
        $this->assertEquals($user, $sensor->getUser());

        $typeSensor = new TypeSensor();
        $sensor->setTypeSensor($typeSensor);
        $this->assertSame($typeSensor, $sensor->getTypeSensor());
        
        $value = '20';
        $sensor->setValue($value);
        $this->assertEquals($value, $sensor->getValue());

    }
}