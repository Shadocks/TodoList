<?php

namespace AppBundle\Form\Handler\Interfaces;

use Symfony\Component\Form\FormInterface;

/**
 * Interface EditTaskTypeHandlerInterface.
 */
interface EditTaskTypeHandlerInterface
{
    /**
     * @param FormInterface $form
     *
     * @return bool
     */
    public function handle(FormInterface $form): bool;
}
