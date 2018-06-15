<?php

namespace AppBundle\Form;

use AppBundle\Form\Type\EditTaskType;
use Symfony\Component\Form\Test\TypeTestCase;

class EditTaskTypeTest extends TypeTestCase
{
    public function testWithGoodData()
    {
        $form = $this->factory->create(EditTaskType::class);

        $form->submit([
            'title' => 'title',
            'content' => 'content'
        ]);

        static::assertTrue($form->isSubmitted());
    }
}