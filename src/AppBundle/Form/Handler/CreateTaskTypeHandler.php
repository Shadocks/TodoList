<?php

namespace AppBundle\Form\Handler;

use AppBundle\Entity\Task;
use AppBundle\Entity\User;
use AppBundle\Form\Handler\Interfaces\CreateTaskTypeHandlerInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormInterface;

/**
 * Class TaskTypeHandler.
 */
class CreateTaskTypeHandler implements CreateTaskTypeHandlerInterface
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
     * @param User $user
     *
     * @return bool
     */
    public function handle(FormInterface $form, User $user): bool
    {
        if ($form->isSubmitted() && $form->isValid()) {
            $task = new Task();
            $task->setTitle($form->getData()->title);
            $task->setContent($form->getData()->content);
            $task->setUser($user);

            $this->entityManager->persist($task);
            $this->entityManager->flush();

            return true;
        }

        return false;
    }
}
