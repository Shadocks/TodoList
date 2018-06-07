<?php

namespace AppBundle\Form;

use AppBundle\Entity\Task;
use AppBundle\Form\Type\EditTaskType;
use Symfony\Component\Form\Test\TypeTestCase;

class EditTaskTypeTest extends TypeTestCase
{
    public function testDataPass()
    {
        $task = new Task();

        $form = $this->factory->create(EditTaskType::class, $task);

        static::assertTrue($form->isSynchronized());
        static::assertInstanceOf(Task::class, $form->getData());
    }
}