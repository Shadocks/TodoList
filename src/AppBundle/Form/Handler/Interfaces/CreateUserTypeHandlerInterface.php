<?php

namespace AppBundle\Form\Handler\Interfaces;

use Symfony\Component\Form\FormInterface;

/**
 * Interface CreateUserTypeHandlerInterface.
 */
interface CreateUserTypeHandlerInterface
{
    /**
     * @param FormInterface $form
     *
     * @return mixed
     */
    public function handle(FormInterface $form): bool;
}
