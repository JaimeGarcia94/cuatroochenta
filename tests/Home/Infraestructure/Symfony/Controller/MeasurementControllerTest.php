<?php

namespace App\Tests\Home\Infrastructure\Symfony\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MeasurementControllerTest extends WebTestCase
{
    public function testListMeasurements()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/measurements');

        $this->assertResponseIsSuccessful();
        $this->assertResponseHeaderSame('content-type', 'application/json; charset=utf-8');

        $responseContent = $client->getResponse()->getContent();
        $data = json_decode($responseContent, true);

        $this->assertIsArray($data);
    }
}