<?php

namespace tests\Entity;

use AppBundle\Entity\Task;
use AppBundle\Entity\User;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class TaskTest extends TestCase
{
    private $user;

    public function setUp()
    {
        $this->user = new User();
    }

    public function testInstantiation()
    {
        $task = new Task();

        $task->setTitle('Title');
        $task->setContent('Content');
        $task->setUser($this->user);
        $task->toggle(true);

        static::assertInstanceOf(UuidInterface::class, $task->getId());
        static::assertEquals('Title', $task->getTitle());
        static::assertEquals('Content', $task->getContent());
        static::assertInstanceOf(\DateTime::class, $task->getCreatedAt());
        static::assertInstanceOf(UuidInterface::class, $task->getUser()->getId());
        static::assertTrue($task->isDone());
    }
}
