<?php

namespace AppBundle\Controller\Api;

use AppBundle\Entity\Category;
use AppBundle\Form\Type\CategoryType;
use FOS\RestBundle\Controller\Annotations as FOSRest;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * CategoryController.
 *
 * @FOSRest\Route(path="/api/categories")
 */
class CategoryController extends FOSRestController
{
    /**
     * @FOSRest\View()
     * @FOSRest\Get("/")
     *
     * @ApiDoc(
     *  section="Categories",
     *  description="Returns a collection of Categories"
     * )
     *
     * @return Category[]
     */
    public function cgetAction()
    {
        return $this->getCategoryManager()->all();
    }

    /**
     * @FOSRest\View()
     * @FOSRest\Get("/{id}")
     *
     * @ApiDoc(
     *  section="Categories",
     *  description="Get a Category",
     *  output="AppBundle\Entity\Category"
     * )
     *
     * @return Category
     */
    public function getAction(Category $category)
    {
        return $category;
    }

    /**
     * @FOSRest\Post("/")
     * @FOSRest\View(statusCode=201)
     *
     * @ApiDoc(
     *  section="Categories",
     *  description="Create a new Category",
     *  input="AppBundle\Form\Type\CategoryType",
     *  output="AppBundle\Entity\Category"
     * )
     *
     * @param Request $request
     *
     * @return Form|Category
     */
    public function postAction(Request $request)
    {
        $form = $this->get('form.factory')->createNamed('', CategoryType::class, $this->getCategoryManager()->create(), [
            'csrf_protection' => false,
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getCategoryManager()->save($form->getData());

            return $form->getData();
        }

        return new View($form->getErrors(), Response::HTTP_BAD_REQUEST);
    }

    /**
     * @return \AppBundle\Manager\CategoryManager
     */
    private function getCategoryManager()
    {
        return $this->get('app.category_manager');
    }
}
