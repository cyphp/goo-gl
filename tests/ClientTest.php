<?php

use Cyphp\Goo\Gl\Client;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    public function testClientResponse()
    {
        $client = new Client(getenv('GOO_GL_API_KEY'));

        $url = $client->shorten('https://developers.google.com/url-shortener/v1/getting_started?authuser=0');

        $this->assertRegExp('/goo\.gl/', $url);
    }
}
