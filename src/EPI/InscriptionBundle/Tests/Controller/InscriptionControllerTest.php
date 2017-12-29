<?php

namespace EPI\InscriptionBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class InscriptionControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/accueil');
    }

    public function testVoir()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/voir/{id}');
    }

    public function testAjouter()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/ajouter');
    }

    public function testSupprimer()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/supprimer/{id}');
    }

}
