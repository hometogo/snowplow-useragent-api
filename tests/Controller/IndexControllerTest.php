<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class IndexControllerTest extends WebTestCase
{
    public function getTestIndexData(): array
    {
        // case 0: no user-agent
        $data[] = [
            400,
            '/'
        ];

        // case 1: empty user-agent
        $data[] = [
            400,
            '/?user-agent='
        ];

        // case 2: normal user-agent
        $data[] = [
            200,
            '/?user-agent=curl/7.60.0'
        ];

        return $data;
    }

    /**
     * @dataProvider getTestIndexData
     * @param $expected
     * @param $uri
     */
    public function testIndex($expected, $uri): void
    {
        $client = static::createClient();

        $client->request('GET', $uri);
        $this->assertEquals($expected, $client->getResponse()->getStatusCode());
    }
}
