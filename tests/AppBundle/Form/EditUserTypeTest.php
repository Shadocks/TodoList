<?php

namespace AppBundle\Form;


use AppBundle\Form\Type\EditUserType;
use Symfony\Component\Form\Test\TypeTestCase;

class EditUserTypeTest extends TypeTestCase
{
    public function testWithGoodData()
    {
        $form = $this->factory->create(EditUserType::class);

        $form->submit([
            'roles' => 'ROLE_USER'
        ]);

        static::assertTrue($form->isSubmitted());
    }
}
