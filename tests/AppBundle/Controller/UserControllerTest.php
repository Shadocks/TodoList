<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserControllerTest extends WebTestCase
{
    public function testListAction()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/login');

        $buttonCrawlerForm = $crawler->selectButton('Se connecter');

        $form = $buttonCrawlerForm->form();

        $client->submit($form, [
            '_username' => 'Moke',
            '_password' => 'storm'
        ]);

        $client->request('GET', '/users');

        static::assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testCreateActionReturnPage()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/login');

        $buttonCrawlerForm = $crawler->selectButton('Se connecter');

        $form = $buttonCrawlerForm->form();

        $client->submit($form, [
            '_username' => 'Moke',
            '_password' => 'storm'
        ]);

        $client->request('GET', '/users/create');

        static::assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testCreateAction()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/login');

        $buttonCrawlerForm = $crawler->selectButton('Se connecter');

        $form = $buttonCrawlerForm->form();

        $client->submit($form, [
            '_username' => 'Moke',
            '_password' => 'storm'
        ]);

        $crawler = $client->request('GET', '/users/create');

        $buttonCrawlerAddUser = $crawler->selectButton('Ajouter');
        $formUser = $buttonCrawlerAddUser->form();

        $client->submit($formUser, [
            'user[username]' => 'username'.rand(0, 1000),
            'user[password][first]' => 'password',
            'user[password][second]' => 'password',
            'user[email]' => rand(0, 1000).'email@gmail.com',
            'user[roles]' => 'ROLE_ADMIN'
        ]);

        static::assertEquals(302, $client->getResponse()->getStatusCode());
    }

    public function testEditActionReturnPage()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/login');

        $buttonCrawlerForm = $crawler->selectButton('Se connecter');

        $form = $buttonCrawlerForm->form();

        $client->submit($form, [
            '_username' => 'Moke',
            '_password' => 'storm'
        ]);

        $client->request('GET', '/users/1ec235c4-c3d7-4fcf-93db-0e35a553ff50/edit');

        static::assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testEditAction()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/login');

        $buttonCrawlerForm = $crawler->selectButton('Se connecter');

        $form = $buttonCrawlerForm->form();

        $client->submit($form, [
            '_username' => 'Moke',
            '_password' => 'storm'
        ]);

        $crawler = $client->request('GET', '/users/1ec235c4-c3d7-4fcf-93db-0e35a553ff50/edit');

        static::assertEquals(200, $client->getResponse()->getStatusCode());

        $buttonCrawlerEditUsers = $crawler->selectButton('Modifier');
        $formEditUsers = $buttonCrawlerEditUsers->form();

        $client->submit($formEditUsers, [
            'edit_user[roles]' => 'ROLE_ADMIN'
        ]);

        static::assertEquals(302, $client->getResponse()->getStatusCode());
    }
}
