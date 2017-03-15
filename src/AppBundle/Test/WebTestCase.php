<?php

namespace AppBundle\Test;

use AppBundle\DataFixtures\ORM\LoadCategoryData;
use AppBundle\DataFixtures\ORM\LoadTaskData;
use Liip\FunctionalTestBundle\Test\WebTestCase as BaseWebTestCase;

class WebTestCase extends BaseWebTestCase
{
    /**
     * @var array
     */
    protected $fixturesLoaded;

    /**
     * @var EntityManagerInterface
     */
    protected $objectManager;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->objectManager = $this->getContainer()->get('doctrine')->getManager();
        $this->fixturesLoaded = $this->loadFixtures([
            LoadCategoryData::class,
            LoadTaskData::class,
        ]);
    }

    /**
     * @return Client
     */
    protected function createAnonymousClient()
    {
        return $this->makeClient(false, [
            'CONTENT_TYPE' => 'application/json',
        ]);
    }

    /**
     * @return Client
     */
    protected function createUserClient()
    {
        return $this->makeClient(true, [
            'CONTENT_TYPE' => 'application/json',
        ]);
    }
}
