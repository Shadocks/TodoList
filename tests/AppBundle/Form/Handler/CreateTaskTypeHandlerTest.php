<?php

namespace AppBundle\Form\Handler;

use AppBundle\Entity\User;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Form\FormInterface;

class CreateTaskTypeHandlerTest extends KernelTestCase
{
    private $entityManager;

    private $formInterface;


    public function setUp()
    {
        static::bootKernel();

        $this->entityManager = $this->createMock(EntityManager::class);
        $this->formInterface = $this->createMock(FormInterface::class);
    }

    public function testConstruct()
    {
        $taskTypeHandler = new CreateTaskTypeHandler($this->entityManager);

        static::assertInstanceOf(CreateTaskTypeHandler::class, $taskTypeHandler);
    }

    public function testHandle()
    {
        $user = new User();
        $taskTypeHandler = new CreateTaskTypeHandler($this->entityManager);

        static::assertFalse($taskTypeHandler->handle($this->formInterface, $user));
    }
}
