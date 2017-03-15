<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Category;
use AppBundle\Entity\Task;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadTaskData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $datas = [
            [
                'name' => 'Création fixtures User',
                'desc' => 'Création de la fixtures pour les utilisateurs, dans la classe LoadUserData',
                'category' => $this->getReference('category-0'),
                'status' => Task::STATUS_OPEN,
            ],
            [
                'name' => 'Création fixtures Task',
                'desc' => 'Création de la fixtures pour les tâches, dans la classe LoadTaskData',
                'category' => $this->getReference('category-0'),
                'status' => Task::STATUS_OPEN,
            ],
            [
                'name' => 'Création fixtures Category',
                'desc' => 'Création de la fixtures pour les catégories, dans la classe LoadCategoryData',
                'category' => $this->getReference('category-1'),
                'status' => Task::STATUS_CLOSED,
            ],
            [
                'name' => 'Exemple tâche terminée',
                'desc' => 'Best desc ever',
                'category' => $this->getReference('category-2'),
                'status' => Task::STATUS_CLOSED,
            ],
            [
                'name' => 'Bug utilisateurs',
                'desc' => 'Impossible de se connecter',
                'category' => $this->getReference('category-3'),
                'status' => Task::STATUS_OPEN,
            ],
        ];

        foreach ($datas as $data) {
            $task = (new Task())
                ->setName($data['name'])
                ->setDescription($data['desc'])
                ->setCategory($data['category'])
                ->setStatus($data['status'])
            ;

            $manager->persist($task);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 20;
    }
}
