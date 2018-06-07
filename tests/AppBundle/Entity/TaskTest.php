<?php

namespace tests\Entity;

use AppBundle\Entity\Task;
use AppBundle\Entity\User;
use PHPUnit\Framework\TestCase;

class TaskTest extends TestCase
{
    private $user;

    public function setUp()
    {
        $this->user = $this->createMock(User::class);
        $this->user->method('getId')
                   ->willReturn(1);
    }

    public function testInstantiation()
    {
        $task = new Task();

        $task->setTitle('Title');
        $task->setContent('Content');
        $task->setUser($this->user);
        $task->toggle(true);

        static::assertNull($task->getId());
        static::assertEquals('Title', $task->getTitle());
        static::assertEquals('Content', $task->getContent());
        static::assertInstanceOf(\DateTime::class, $task->getCreatedAt());
        static::assertEquals(1, $task->getUser()->getId());
        static::assertTrue($task->isDone());
    }
}
