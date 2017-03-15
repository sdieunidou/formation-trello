<?php

namespace AppBundle\Manager;

use AppBundle\Entity\Task;

/**
 * Class TaskManager.
 */
class TaskManager extends AbstractDoctrineManager
{
    /**
     * @return Task
     */
    public function create()
    {
        return new Task();
    }

    /**
     * @return \AppBundle\Repository\TaskRepository
     */
    protected function getRepository()
    {
        return $this->entityManager->getRepository(Task::class);
    }
}
