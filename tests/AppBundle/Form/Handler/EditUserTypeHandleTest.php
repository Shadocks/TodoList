<?php

namespace AppBundle\Form\Handler;


use AppBundle\Entity\User;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\Test\TypeTestCase;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class EditUserTypeHandleTest extends TypeTestCase
{
    private $entityManager;

    private $userPasswordEncoder;

    private $formInterface;

    public function setUp()
    {
        $this->entityManager = $this->createMock(EntityManager::class);
        $this->userPasswordEncoder = $this->createMock(UserPasswordEncoderInterface::class);
        $this->formInterface = $this->createMock(FormInterface::class);
    }

    public function testConstruct()
    {
        $editUserTypeHandler = new EditUserTypeHandler($this->entityManager, $this->userPasswordEncoder);

        static::assertInstanceOf(EditUserTypeHandler::class, $editUserTypeHandler);
    }

    public function testHandle()
    {
        $editUserTypeHandler = new EditUserTypeHandler($this->entityManager, $this->userPasswordEncoder);
        $user = new User();

        static::assertFalse($editUserTypeHandler->handle($this->formInterface, $user));
    }
}