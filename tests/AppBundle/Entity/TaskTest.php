<?php

namespace tests\AppBundle\Entity;

use AppBundle\Entity\Task;
use PHPUnit\Framework\TestCase;

class TaskTest extends TestCase
{
    public function testInitialize()
    {
        $task = new Task();
        $this->assertNotNull($task->getCreatedAt());
    }

    public function testHasDescription()
    {
        $task = new Task();
        $this->assertFalse($task->hasDescription());

        $task->setDescription('123');
        $this->assertTrue($task->hasDescription());
    }
}
