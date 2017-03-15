<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Task;
use AppBundle\Form\Type\TaskType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class TaskController.
 */
class TaskController extends Controller
{
    /**
     * @Route("/task/new", name="app_task_new")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newAction(Request $request)
    {
        $form = $this->createForm(TaskType::class, $this->getTaskManager()->create());
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->getTaskManager()->save($form->getData());

            $this->addFlash('success', $this->get('translator')->trans('task_create.success', [], 'app'));

            return $this->redirectToRoute('app_task_edit', [
                'id' => $form->getData()->getId(),
            ]);
        }

        return $this->render(':task:new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/task/{id}", name="app_task_edit")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Request $request, Task $task)
    {
        $form = $this->createForm(TaskType::class, $task);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->getTaskManager()->save($form->getData());

            $this->addFlash('success', $this->get('translator')->trans('task_edit.success', [
                '%name%' => $task->getName(),
            ], 'app'));

            return $this->redirectToRoute('app_task_edit', [
                'id' => $task->getId(),
            ]);
        }

        return $this->render(':task:edit.html.twig', [
            'form' => $form->createView(),
            'task' => $form->getData(),
        ]);
    }

    /**
     * @return TaskManager
     */
    private function getTaskManager()
    {
        return $this->get('app.task_manager');
    }
}
