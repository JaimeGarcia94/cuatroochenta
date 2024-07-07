<?php

namespace App\Tests\Auth\Infrastructure\Symfony\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class AuthControllerTest extends WebTestCase
{
    private $client;

    protected function setUp(): void
    {
        self::bootKernel();
        $this->client = static::createClient();
    }

    public function testLoginPageIsAccessible()
    {
        $this->client->request('GET', '/login');
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Login');
    }

    public function testUserCanLogin()
    {
        // Primero registramos un usuario
        $this->client->request('POST', '/register', [
            'email' => 'login@example.com',
            'password' => 'password',
            'confirm_password' => 'password',
        ]);

        // Ahora intentamos iniciar sesión
        $crawler = $this->client->request('GET', '/login');
        $form = $crawler->selectButton('Login')->form([
            '_username' => 'login@example.com',
            '_password' => 'password',
        ]);
        $this->client->submit($form);

        $this->client->followRedirect();
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Home');
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        // Limpiar la base de datos o realizar otras tareas de limpieza si es necesario
    }
}