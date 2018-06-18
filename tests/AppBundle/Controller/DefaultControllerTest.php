<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testHomepage()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/login');

        $buttonCrawlerForm = $crawler->selectButton('Se connecter');

        $form = $buttonCrawlerForm->form();

        $client->submit($form, [
            '_username' => 'Mike',
            '_password' => 'storm'
        ]);

        $client->request('GET', '/');

        static::assertEquals(200, $client->getResponse()->getStatusCode());
    }
}