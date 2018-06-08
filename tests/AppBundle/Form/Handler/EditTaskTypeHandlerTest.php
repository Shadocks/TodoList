<?php

namespace AppBundle\Form\Handler;

use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Form\FormInterface;

class EditTaskTypeHandlerTest extends KernelTestCase
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
        $editTaskTypeHandler = new EditTaskTypeHandler($this->entityManager);

        static::assertInstanceOf(EditTaskTypeHandler::class, $editTaskTypeHandler);
    }

    public function testHandle()
    {
        $editTaskTypeHandler = new EditTaskTypeHandler($this->entityManager);

        static::assertFalse($editTaskTypeHandler->handle($this->formInterface));
    }
}
