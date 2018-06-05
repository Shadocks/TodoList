<?php

namespace AppBundle\Form\Handler\Interfaces;

use AppBundle\Entity\Task;
use AppBundle\Entity\User;
use Symfony\Component\Form\FormInterface;

/**
 * Class TaskTypeHandlerInterface.
 */
interface TaskTypeHandlerInterface
{
    /**
     * @param FormInterface $form
     * @param Task          $task
     * @param User          $user
     */
    public function handle(FormInterface $form, Task $task, User $user);
}
