<?php

namespace AppBundle\Form\Handler;

use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class CreateUserTypeHandlerTest extends KernelTestCase
{
    private $entityManager;

    private $formInterface;

    private $userPasswordEncoder;

    public function setUp()
    {
        static::bootKernel();

        $this->entityManager = $this->createMock(EntityManager::class);
        $this->userPasswordEncoder = $this->createMock(UserPasswordEncoderInterface::class);
        $this->formInterface = $this->createMock(FormInterface::class);
    }

    public function testConstruct()
    {
        $userTypeHandler = new CreateUserTypeHandler($this->entityManager, $this->userPasswordEncoder);

        static::assertInstanceOf(CreateUserTypeHandler::class, $userTypeHandler);
    }

    public function testHandle()
    {
        $userTypeHandler = new CreateUserTypeHandler($this->entityManager, $this->userPasswordEncoder);

        static::assertFalse($userTypeHandler->handle($this->formInterface));
    }
}
