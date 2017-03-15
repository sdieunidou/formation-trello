<?php

namespace tests\AppBundle\Manager;

use AppBundle\Entity\Category;
use AppBundle\Manager\CategoryManager;
use AppBundle\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Framework\TestCase;

class CategoryManagerTest extends TestCase
{
    /**
     * @var CategoryManager
     */
    private $categoryManager;

    public function setUp()
    {
        $this->categoryManager = new CategoryManager(
            $this->createMock(EntityManagerInterface::class)
        );
    }

    public function testCreate()
    {
        $category = $this->categoryManager->create();

        $this->assertInstanceOf(Category::class, $category);
        $this->assertInstanceOf(\DateTime::class, $category->getCreatedAt());
    }

    public function testAll()
    {
        $data = [
            [
                'id' => 1,
                'name' => 'Category 1',
            ],
            [
                'id' => 2,
                'name' => 'Category 2',
            ],
        ];

        $repository = $this->createMock(CategoryRepository::class);
        $repository
            ->method('getAll')
            ->willReturn($data);

        $entityManager = $this->createMock(EntityManagerInterface::class);
        $entityManager
            ->method('getRepository')
            ->willReturn($repository);

        $categoryManager = new CategoryManager(
            $entityManager
        );

        $categories = $categoryManager->all();
        $this->assertSame($data, $categories);
    }
}
