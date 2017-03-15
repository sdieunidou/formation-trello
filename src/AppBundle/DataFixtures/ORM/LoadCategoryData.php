<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Category;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadCategoryData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $datas = [
            'A faire',
            'En cours',
            'Fini',
            'Bug',
        ];

        foreach ($datas as $i => $categoryName) {
            $category = (new Category())
                ->setName($categoryName);

            $manager->persist($category);

            $this->addReference('category-'.$i, $category);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 10;
    }
}
