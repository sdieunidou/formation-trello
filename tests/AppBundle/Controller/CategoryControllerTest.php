<?php

namespace tests\AppBundle\Controller;

use AppBundle\Test\WebTestCase;

class CategoryControllerTest extends WebTestCase
{
    public function testAccessDenied()
    {
        $client = $this->createAnonymousClient();
        $crawler = $client->request('GET', '/');

        $this->assertEquals(401, $client->getResponse()->getStatusCode());
    }

    public function test()
    {
        $client = $this->createUserClient(true);
        $crawler = $client->request('GET', '/');

        $response = $client->getResponse();

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}
