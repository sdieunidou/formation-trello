<?php

namespace tests\AppBundle\Entity;

use AppBundle\Entity\Category;
use PHPUnit\Framework\TestCase;

class CategoryTest extends TestCase
{
    public function testInitialize()
    {
        $category = new Category();
        $this->assertNotNull($category->getCreatedAt());
    }
}
