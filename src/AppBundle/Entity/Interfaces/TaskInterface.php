<?php

namespace AppBundle\Entity\Interfaces;

use AppBundle\Entity\User;

/**
 * Interface TaskInterface.
 */
interface TaskInterface
{
    /**
     * @return int|null
     */
    public function getId(): ?int;

    /**
     * @return \Datetime
     */
    public function getCreatedAt(): \DateTime;

    /**
     * @return string
     */
    public function getTitle(): ?string;

    /**
     * @param $title
     */
    public function setTitle($title);

    /**
     * @return string
     */
    public function getContent(): ?string;

    /**
     * @param $content
     */
    public function setContent($content);

    /**
     * @return User
     */
    public function getUser(): User;

    /**
     * @param User $user
     */
    public function setUser(User $user);

    /**
     * @return bool
     */
    public function isDone(): bool;

    /**
     * @param $flag
     */
    public function toggle($flag);
}
