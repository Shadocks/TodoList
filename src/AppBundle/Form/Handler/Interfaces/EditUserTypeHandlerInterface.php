<?php

namespace AppBundle\Form\Handler\Interfaces;

use AppBundle\Entity\User;
use Symfony\Component\Form\FormInterface;

/**
 * Interface EditUserTypeHandlerInterface.
 */
interface EditUserTypeHandlerInterface
{
    /**
     * @param FormInterface $form
     * @param User          $user
     *
     * @return bool
     */
    public function handle(FormInterface $form, User $user): bool;
}
