<?php

namespace tests\Form;

use AppBundle\Form\Type\TaskType;
use Symfony\Component\Form\Test\TypeTestCase;

class TaskTypeTest extends TypeTestCase
{
    public function testWithGoodData()
    {
        $form = $this->factory->create(TaskType::class);

        $form->submit([
            'title' => 'title',
            'content' => 'content'
        ]);

        static::assertTrue($form->isSubmitted());
    }
}
