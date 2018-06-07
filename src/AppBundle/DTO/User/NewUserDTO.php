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
     * NewUserDTO constructor.
     *
     * @param string $username
     * @param string $password
     * @param string $email
     */
    public function __construct(
        string $username,
        string $password,
        string $email
    ) {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
    }
}
