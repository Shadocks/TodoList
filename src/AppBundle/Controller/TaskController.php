<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Task;
use AppBundle\Form\Type\EditTaskType;
use AppBundle\Form\Type\TaskType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class TaskController.
 */
class TaskController extends Controller
{
    /**
     * @Route(
     *     path="/tasks",
     *     name="task_list",
     *     methods={"GET"}
     * )
     *
     * @return Response
     */
    public function listAction()
    {
        return $this->render(
            'task/list.html.twig',
            [
                'tasks' => $this->getDoctrine()->getRepository('AppBundle:Task')
                                               ->findBy(['isDone' => 0]),
            ]
        );
    }

    /**
     * @Route(
     *     path="/tasks/completed",
     *     name="task_list_completed",
     *     methods={"GET"}
     * )
     *
     * @return Response
     */
    public function listTaskCompletedAction()
    {
        return $this->render(
            'task/list_completed.html.twig',
            [
                'tasks' => $this->getDoctrine()->getRepository('AppBundle:Task')
                                               ->findBy(['isDone' => 1]),
            ]
        );
    }

    /**
     * @Route(
     *     path="/tasks/create",
     *     name="task_create",
     *     methods={"GET", "POST"}
     * )
     *
     * @param Request $request
     *
     * @return Response
     */
    public function createAction(Request $request)
    {
        $user = $this->getUser();

        $form = $this->createForm(TaskType::class)
                     ->handleRequest($request);

        $taskTypeHandler = $this->get('task_type_handler');

        if ($taskTypeHandler->handle($form, $user)) {
            $this->addFlash('success', 'La tâche a été bien été ajoutée.');

            return $this->redirectToRoute('task_list');
        }

        return $this->render('task/create.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @Route(
     *     path="/tasks/{id}/edit",
     *     name="task_edit",
     *     methods={"GET", "POST"}
     * )
     *
     * @param Task    $task
     * @param Request $request
     *
     * @return Response
     */
    public function editAction(Task $task, Request $request)
    {
        $form = $this->createForm(EditTaskType::class, $task)
                     ->handleRequest($request);

        $editTaskTypeHandler = $this->get('edit_task_type_handler');

        if ($editTaskTypeHandler->handle($form)) {
            $this->addFlash('success', 'La tâche a bien été modifiée.');

            return $this->redirectToRoute('task_list');
        }

        return $this->render('task/edit.html.twig', [
            'form' => $form->createView(),
            'task' => $task,
        ]);
    }

    /**
     * @Route(
     *     path="/tasks/{id}/toggle",
     *     name="task_toggle",
     *     methods={"GET"}
     * )
     *
     * @param Task $task
     *
     * @return RedirectResponse
     */
    public function toggleTaskAction(Task $task)
    {
        if (!$task->isDone()){
            $task->toggle(!$task->isDone());
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash(
                'success',
                sprintf('La tâche "%s" a bien été marquée comme faite.', $task->getTitle())
            );
            return $this->redirectToRoute('task_list');
        } else {
            $task->toggle(!$task->isDone());
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash(
                'success',
                sprintf('La tâche "%s" a bien été marquée comme non faite.', $task->getTitle())
            );
            return $this->redirectToRoute('task_list_completed');
        }
    }

    /**
     * @Route(
     *     path="/tasks/{id}/delete",
     *     name="task_delete",
     *     methods={"GET"}
     * )
     *
     * @param Task $task
     *
     * @return RedirectResponse|Response
     */
    public function deleteTaskAction(Task $task)
    {
        if ($task->getUser()->getId() === $this->getUser()->getId()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($task);
            $em->flush();

            $this->addFlash('success', 'La tâche a bien été supprimée.');

            return $this->redirectToRoute('task_list');
        } else {
            $this->addFlash('failed', 'Vous n\'ête pas autorisé à supprimer cette tâche.');

            return $this->redirectToRoute('homepage');
        }
    }
}
