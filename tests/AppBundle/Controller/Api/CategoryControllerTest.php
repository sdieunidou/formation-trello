<?php

namespace tests\AppBundle\Controller\Api;

use AppBundle\Test\WebTestCase;

class CategoryControllerTest extends WebTestCase
{
    public function testCget()
    {
        $client = $this->createUserClient(true);
        $crawler = $client->request('GET', '/api/categories/');

        $response = $client->getResponse();
        $content = json_decode($response->getContent(), true);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertInternalType('array', $content);
    }
}
