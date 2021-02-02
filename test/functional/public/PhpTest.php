<?php

namespace adamcameron\techtest\tests\functional\public;

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Response;

class PhpTest extends TestCase
{
    /** @coversNothing */
    public function testHelloWorldPhpReturnsExpectedContent()
    {
        $client = new Client([
            'base_uri' => 'http://techTest.backend/'
        ]);

        $response = $client->get('helloWorld.php');

        $this->assertEquals(Response::HTTP_OK, $response->getStatusCode());

        $content = $response->getBody()->getContents();

        $this->assertSame("Hello world!", $content);
    }
}
