<?php

namespace AppBundle\DTO;

use AppBundle\DTO\User\NewUserDTO;
use Symfony\Component\Form\Test\TypeTestCase;

class NewUserDTOTest extends TypeTestCase
{
    public function testInstantiation()
    {
        $newUserDTO = new NewUserDTO('u', 'p', 'email@gmail.com', 'ROLE_USER');

        static::assertInstanceOf(NewUserDTO::class, $newUserDTO);
    }
}
