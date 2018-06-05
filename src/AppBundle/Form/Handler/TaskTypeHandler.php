<?php

namespace AppBundle\Form\Handler;

use AppBundle\Entity\Task;
use AppBundle\Entity\User;
use AppBundle\Form\Handler\Interfaces\TaskTypeHandlerInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormInterface;

/**
 * Class TaskTypeHandler.
 */
class TaskTypeHandler implements TaskTypeHandlerInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * TaskTypeHandler constructor.
     *
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param FormInterface $form
     * @param Task $task
     * @param User $user
     *
     * @return bool
     */
    public function handle(FormInterface $form, Task $task, User $user)
    {
        if ($form->isSubmitted() && $form->isValid()) {
            $task->setUser($user);

            $this->entityManager->persist($task);
            $this->entityManager->flush();

            return true;
        }

        return false;
    }
}
