<?php

namespace AppBundle\DTO\User;

/**
 * Class NewUserDTO.
 */
class NewUserDTO
{
    /**
     * @var string
     */
    public $username;

    /**
     * @var string
     */
    public $password;

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $roles;

    /**
     * NewUserDTO constructor.
     *
     * @param string $username
     * @param string $password
     * @param string $email
     * @param string $roles
     */
    public function __construct(
        string $username,
        string $password,
        string $email,
        string $roles
    ) {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->roles = $roles;
    }
}
