<?php


namespace slavkluev\Bizon365;

use PHPUnit\Framework\TestCase;
use slavkluev\Bizon365\Api\CourseApi;
use slavkluev\Bizon365\Api\KassaApi;
use slavkluev\Bizon365\Api\WebinarApi;

class ClientTest extends TestCase
{
    protected $client;

    protected function setUp()
    {
        $this->client = new Client('testToken');
    }

    public function testConstructor()
    {
        $this->assertInstanceOf(Client::class, $this->client);
        $this->assertInstanceOf(WebinarApi::class, $this->client->getWebinarApi());
        $this->assertInstanceOf(KassaApi::class, $this->client->getKassaApi());
        $this->assertInstanceOf(CourseApi::class, $this->client->getCourseApi());
    }

    public function testBaseUri()
    {
        $this->assertEquals(
            'https://online.bizon365.ru/api/v1/',
            $this->client->getHttpClient()->getConfig('base_uri')
        );
    }

    public function testBaseUriWithCustomConfig()
    {
        $client = new Client('testToken', ['base_uri' => 'test.com']);
        $this->assertEquals(
            'https://online.bizon365.ru/api/v1/',
            $client->getHttpClient()->getConfig('base_uri')
        );
    }

    public function testHeaders()
    {
        $this->assertEquals(
            'testToken',
            $this->client->getHttpClient()->getConfig('headers')['X-Token']
        );
    }
}
