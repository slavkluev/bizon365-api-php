<?php


namespace slavkluev\Bizon365;

use PHPUnit\Framework\TestCase;
use slavkluev\Bizon365\Api\KassaApi;
use slavkluev\Bizon365\Api\WebinarApi;

class ClientTest extends TestCase
{
    public function testConstructor()
    {
        $client = new Client('testToken');

        $this->assertInstanceOf(Client::class, $client);
        $this->assertInstanceOf(WebinarApi::class, $client->getWebinarApi());
        $this->assertInstanceOf(KassaApi::class, $client->getKassaApi());
    }
}
