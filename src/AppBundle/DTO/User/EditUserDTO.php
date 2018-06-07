<?php

namespace AppBundle\DTO\User;

/**
 * Class EditUserDTO.
 */
class EditUserDTO
{
    /**
     * @var string
     */
    public $roles;

    /**
     * NewUserDTO constructor.
     *
     * @param string $roles
     */
    public function __construct(
        string $roles
    ) {
        $this->roles = $roles;
    }
}
