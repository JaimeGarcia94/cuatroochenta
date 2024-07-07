<?php

namespace App\Tests\Auth\Domain\Entity;

use App\Auth\Domain\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserTest extends WebTestCase
{
    public function testGettersAndSetters()
    {
        $user = new User();
        $user->setEmail('test@example.com');
        $user->setPassword('password');

        $this->assertEquals('test@example.com', $user->getEmail());
        $this->assertEquals('password', $user->getPassword());
    }
}