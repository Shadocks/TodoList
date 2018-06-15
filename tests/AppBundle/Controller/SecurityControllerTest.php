<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SecurityControllerTest extends WebTestCase
{
    public function testLoginPage()
    {
        $client = static::createClient();

        $client->request('GET', '/login');

        static::assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testLogin()
    {
        $securityController = new SecurityController();

        static::assertNull($securityController->loginCheck());
    }

    public function testLogout()
    {
        $securityController = new SecurityController();

        static::assertNull($securityController->logoutCheck());
    }
}
