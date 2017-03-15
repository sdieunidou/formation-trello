<?php

namespace AppBundle\Manager;

use AppBundle\Entity\Category;

/**
 * Class CategoryManager.
 */
class CategoryManager extends AbstractDoctrineManager
{
    /**
     * @return array
     */
    public function all()
    {
        return $this->getRepository()->getAll();
    }

    /**
     * @return Category
     */
    public function create()
    {
        return new Category();
    }

    /**
     * @return \AppBundle\Repository\CategoryRepository
     */
    protected function getRepository()
    {
        return $this->entityManager->getRepository(Category::class);
    }
}
