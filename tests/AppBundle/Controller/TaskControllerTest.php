<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TaskControllerTest extends WebTestCase
{
    public function testListAction()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/login');

        $buttonCrawlerForm = $crawler->selectButton('Se connecter');

        $form = $buttonCrawlerForm->form();

        $client->submit($form, [
            '_username' => 'Mike',
            '_password' => 'storm'
        ]);

        $client->request('GET', '/tasks');

        static::assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testListTaskCompletedAction()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/login');

        $buttonCrawlerForm = $crawler->selectButton('Se connecter');

        $form = $buttonCrawlerForm->form();

        $client->submit($form, [
            '_username' => 'Mike',
            '_password' => 'storm'
        ]);

        $client->request('GET', '/tasks/completed');

        static::assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testCreateActionPage()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/login');

        $buttonCrawlerForm = $crawler->selectButton('Se connecter');

        $form = $buttonCrawlerForm->form();

        $client->submit($form, [
            '_username' => 'Mike',
            '_password' => 'storm'
        ]);

        $client->request('GET', '/tasks/create');

        static::assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testCreateAction()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/login');

        $buttonCrawlerForm = $crawler->selectButton('Se connecter');

        $form = $buttonCrawlerForm->form();

        $client->submit($form, [
            '_username' => 'Mike',
            '_password' => 'storm'
        ]);

        $crawler = $client->request('GET', '/tasks/create');

        $buttonCrawlerAddTask = $crawler->selectButton('Ajouter');
        $formTask = $buttonCrawlerAddTask->form();

        $client->submit($formTask, [
            'task[title]' => 'title',
            'task[content]' => 'content'
        ]);

        static::assertEquals(302, $client->getResponse()->getStatusCode());
    }

    public function testEditActionPage()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/login');

        $buttonCrawlerForm = $crawler->selectButton('Se connecter');

        $form = $buttonCrawlerForm->form();

        $client->submit($form, [
            '_username' => 'Mike',
            '_password' => 'storm'
        ]);

        $client->request('GET', '/tasks/417b3562-ee2f-4a4c-9a3b-9160844386f3/edit');

        static::assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testEditAction()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/login');

        $buttonCrawlerForm = $crawler->selectButton('Se connecter');

        $form = $buttonCrawlerForm->form();

        $client->submit($form, [
            '_username' => 'Mike',
            '_password' => 'storm'
        ]);

        $crawler = $client->request('GET', '/tasks/417b3562-ee2f-4a4c-9a3b-9160844386f3/edit');

        static::assertEquals(200, $client->getResponse()->getStatusCode());

        $buttonCrawlerEditTasks = $crawler->selectButton('Modifier');
        $formEditTasks = $buttonCrawlerEditTasks->form();

        $client->submit($formEditTasks, [
            'edit_task[title]' => 'testTitle',
            'edit_task[content]' => 'testContent'
        ]);

        static::assertEquals(302, $client->getResponse()->getStatusCode());
    }

    public function testToggleTaskAction()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/login');

        $buttonCrawlerForm = $crawler->selectButton('Se connecter');

        $form = $buttonCrawlerForm->form();

        $client->submit($form, [
            '_username' => 'Mike',
            '_password' => 'storm'
        ]);

        $client->request('GET', '/tasks/417b3562-ee2f-4a4c-9a3b-9160844386f3/toggle');

        static::assertEquals(302, $client->getResponse()->getStatusCode());

        $client->request('GET', '/tasks/417b3562-ee2f-4a4c-9a3b-9160844386f3/toggle');

        static::assertEquals(302, $client->getResponse()->getStatusCode());
    }

    public function testBadDeleteAction()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/login');

        $buttonCrawlerForm = $crawler->selectButton('Se connecter');

        $form = $buttonCrawlerForm->form();

        $client->submit($form, [
            '_username' => 'Moke',
            '_password' => 'storm'
        ]);

        $client->request('GET', '/tasks');

        static::assertEquals(200, $client->getResponse()->getStatusCode());

        $client->request('GET', 'tasks/3579bba3-160b-40f2-8c17-fba4f273db8e/delete');

        static::assertEquals(302, $client->getResponse()->getStatusCode());
    }

    public function testGoodDeleteAction()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/login');

        $buttonCrawlerForm = $crawler->selectButton('Se connecter');

        $form = $buttonCrawlerForm->form();

        $client->submit($form, [
            '_username' => 'Mike',
            '_password' => 'storm'
        ]);

        $client->request('GET', '/tasks');

        static::assertEquals(200, $client->getResponse()->getStatusCode());

        $client->request('GET', 'tasks/3579bba3-160b-40f2-8c17-fba4f273db8e/delete');

        static::assertEquals(302, $client->getResponse()->getStatusCode());
    }
}
