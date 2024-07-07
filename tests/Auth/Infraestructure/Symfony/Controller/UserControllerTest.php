<?php

namespace App\Tests\Auth\Infrastructure\Symfony\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class UserControllerTest extends WebTestCase
{
    private $client;

    protected function setUp(): void
    {
        self::bootKernel();
        $this->client = static::createClient();
    }

    public function testRegisterPageIsAccessible()
    {
        $this->client->request('GET', '/registry');
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Registrate');
    }

    public function testUserCanRegister()
    {
        $crawler = $this->client->request('POST', '/save');
        $form = $crawler->selectButton('button')->form([
            '_username' => 'test@example.com',
            '_password' => 'password',
        ]);
        $this->client->submit($form);

        $this->client->followRedirect();
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Login');
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }
}