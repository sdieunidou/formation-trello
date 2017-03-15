<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CategoryController extends Controller
{
    /**
     * @Route("/", name="app_category_list")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction()
    {
        return $this->render(':category:list.html.twig', [
            'categories' => $this->getCategoryManager()->all(),
        ]);
    }

    /**
     * @return \AppBundle\Manager\CategoryManager
     */
    private function getCategoryManager()
    {
        return $this->get('app.category_manager');
    }
}
