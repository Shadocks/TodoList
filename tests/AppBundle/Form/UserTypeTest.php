<?php

namespace AppBundle\Form;

use AppBundle\Form\Type\UserType;
use Symfony\Component\Form\Extension\Validator\ValidatorExtension;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\Test\TypeTestCase;
use Symfony\Component\Validator\ConstraintViolationList;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class UserTypeTest extends TypeTestCase
{
    private $validator;

    protected function getExtensions()
    {
        $this->validator = $this->createMock(ValidatorInterface::class);

        $this->validator
             ->method('validate')
             ->will($this->returnValue(new ConstraintViolationList()));

        $this->validator
             ->method('getMetadataFor')
             ->will($this->returnValue(new ClassMetadata(Form::class)));

        return [
            new ValidatorExtension($this->validator)
        ];
    }

    public function testWithGoodData()
    {
        $form = $this->factory->create(UserType::class);

        $form->submit([
            'username' => 'username',
            'password' => [
                'first' => 'password',
                'second' => 'password'
            ],
            'email' => 'email@gmail.com',
            'roles' => 'ROLE_USER'
        ]);

        static::assertTrue($form->isSubmitted());
    }
}
