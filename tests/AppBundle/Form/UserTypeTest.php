<?php

namespace AppBundle\Form;

use AppBundle\DTO\User\NewUserDTO;
use AppBundle\Form\Type\UserType;
use Symfony\Component\Form\Test\TypeTestCase;

class UserTypeTest extends TypeTestCase
{
    public function testDataPass()
    {
        $task = new NewUserDTO('u', 'p', 'email@gmail.com', 'ROLE_USER');

        $form = $this->factory->create(UserType::class, $task);

        static::assertTrue($form->isSynchronized());
        static::assertInstanceOf(NewUserDTO::class, $form->getData());
    }
}
