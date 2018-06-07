<?php

namespace AppBundle\Form;

use AppBundle\DTO\User\EditUserDTO;
use AppBundle\Form\Type\EditUserType;
use Symfony\Component\Form\Test\TypeTestCase;

class EditUserTypeTest extends TypeTestCase
{
    public function testDataPass()
    {
        $user = new EditUserDTO('ROLE_ADMIN');

        $form = $this->factory->create(EditUserType::class, $user);

        static::assertTrue($form->isSynchronized());
        static::assertInstanceOf(EditUserDTO::class, $form->getData());
    }
}
