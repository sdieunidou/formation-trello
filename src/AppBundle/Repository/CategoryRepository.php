<?php

namespace AppBundle\Repository;

/**
 * CategoryRepository.
 */
class CategoryRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * @return array
     */
    public function getAll()
    {
        return $this->createQueryBuilder('c')
                    ->select('c')
                    ->orderBy('c.id', 'ASC')
                    ->getQuery()
                    ->getResult();
    }
}
