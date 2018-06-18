<?php

namespace AppBundle\Form\Handler;

use AppBundle\Entity\User;
use AppBundle\Form\Handler\Interfaces\EditUserTypeHandlerInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class EditUserTypeHandler.
 */
class EditUserTypeHandler implements EditUserTypeHandlerInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    /**
     * CreateUserTypeHandler constructor.
     *
     * @param EntityManagerInterface       $entityManager
     * @param UserPasswordEncoderInterface $passwordEncoder
     */
    public function __construct(
        EntityManagerInterface $entityManager,
        UserPasswordEncoderInterface $passwordEncoder
    ) {
        $this->entityManager = $entityManager;
        $this->passwordEncoder = $passwordEncoder;
    }

    /**
     * @param FormInterface $form
     * @param User          $user
     *
     * @return bool
     */
    public function handle(FormInterface $form, User $user): bool
    {
        if ($form->isSubmitted() && $form->isValid()) {
            $user->changeRoles($form->getData()->roles);

            $this->entityManager->flush();

            return true;
        }

        return false;
    }
}
