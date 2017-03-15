<?php

namespace AppBundle\Controller\Api;

use AppBundle\Entity\Task;
use AppBundle\Form\Type\TaskType;
use FOS\RestBundle\Controller\Annotations as FOSRest;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Response;

/**
 * TaskController.
 *
 * @FOSRest\Route(path="/api/tasks")
 */
class TaskController extends FOSRestController
{
    /**
     * @FOSRest\View()
     * @FOSRest\Get("/")
     *
     * @ApiDoc(
     *  section="Tasks",
     *  description="Returns a collection of Tasks"
     * )
     *
     * @return Task[]
     */
    public function cgetAction()
    {
        return $this->getTaskManager()->all();
    }

    /**
     * @FOSRest\View()
     * @FOSRest\Get("/{id}")
     *
     * @ApiDoc(
     *  section="Tasks",
     *  description="Get a Task",
     *  output="AppBundle\Entity\Tasks"
     * )
     *
     * @return Task
     */
    public function getAction(Task $task)
    {
        return $task;
    }

    /**
     * @FOSRest\Post("/")
     * @FOSRest\View(statusCode=201)
     *
     * @ApiDoc(
     *  section="Tasks",
     *  description="Create a new Task",
     *  input="AppBundle\Form\Type\TaskType",
     *  output="AppBundle\Entity\Task"
     * )
     *
     * @param Request $request
     *
     * @return Form|Task
     */
    public function postAction(Request $request)
    {
        $form = $this->get('form.factory')->createNamed('', TaskType::class, $this->getTaskManager()->create(), [
            'csrf_protection' => false,
        ]);
        $form->submit($request->request->all());

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getTaskManager()->save($form->getData());

            return $form->getData();
        }

        return new View($form, Response::HTTP_BAD_REQUEST);
    }

    /**
     * @return \AppBundle\Manager\TaskManager
     */
    private function getTaskManager()
    {
        return $this->get('app.task_manager');
    }
}
