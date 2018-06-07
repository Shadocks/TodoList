<?php

namespace tests\Form;

use AppBundle\DTO\Task\NewTaskDTO;
use AppBundle\Form\Type\TaskType;
use Symfony\Component\Form\Test\TypeTestCase;

class TaskTypeTest extends TypeTestCase
{
    public function testDataPass()
    {
        $task = new NewTaskDTO('title', 'content');

        $form = $this->factory->create(TaskType::class, $task);

        static::assertTrue($form->isSynchronized());
        static::assertInstanceOf(NewTaskDTO::class, $form->getData());
    }
}
