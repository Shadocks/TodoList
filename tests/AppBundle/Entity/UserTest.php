<?php

namespace tests\Entity;

use AppBundle\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testInstantiation()
    {
        $user = new User();

        $user->setUsername('username');
        $user->setEmail('email');
        $user->setPassword('password');

        static::assertNull($user->getId());
        static::assertEquals('username', $user->getUsername());
        static::assertEquals('email', $user->getEmail());
        static::assertEquals('password', $user->getPassword());
        static::assertNull($user->getSalt());
        static::assertInternalType('array', $user->getRoles());
        static::assertEmpty($user->eraseCredentials());
        static::assertInstanceOf(ArrayCollection::class, $user->getTasks());
    }
}
