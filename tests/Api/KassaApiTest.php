<?php

namespace slavkluev\Bizon365\Api;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use slavkluev\Bizon365\Client;
use Tarampampam\GuzzleUrlMock\UrlsMockHandler;

class KassaApiTest extends TestCase
{
    protected $kassaApi;
    protected $mockHandler;

    protected function setUp()
    {
        $this->mockHandler = new UrlsMockHandler;

        $httpClient = new GuzzleClient([
            'handler' => HandlerStack::create($this->mockHandler),
        ]);

        $client = new Client('token');
        $client->setHttpClient($httpClient);
        $this->kassaApi = $client->getKassaApi();
    }

    public function testGetOrders()
    {
        $this->mockHandler->onUriRequested(
            'kassa/orders/getorders',
            'get',
            new Response(200, [], $this->getFixture('get_orders.json'))
        );

        $orders = $this->kassaApi->getOrders();

        $this->assertIsArray($orders);
        $this->assertEquals(1, $orders['total']);
        $this->assertCount(1, $orders['list']);
    }

    public function testGetOrdersBySearch()
    {
        $this->mockHandler->onUriRequested(
            'kassa/orders/getorders?search=test',
            'get',
            new Response(200, [], $this->getFixture('get_orders_by_search.json'))
        );

        $orders = $this->kassaApi->getOrdersBySearch('test');

        $this->assertIsArray($orders);
        $this->assertEquals(1, $orders['total']);
        $this->assertCount(1, $orders['list']);
        $this->assertEquals('test', $orders['search']);
    }

    public function testGetOrdersByDays()
    {
        $this->mockHandler->onUriRequested(
            'kassa/orders/getorders?days=1',
            'get',
            new Response(200, [], $this->getFixture('get_orders_by_days.json'))
        );

        $orders = $this->kassaApi->getOrdersByDays(1);

        $this->assertIsArray($orders);
        $this->assertEquals(1, $orders['total']);
        $this->assertCount(1, $orders['list']);
        $this->assertEquals('25.03.2020', $orders['dateBegin']);
        $this->assertEquals('26.03.2020', $orders['dateEnd']);
    }

    public function testGetOrdersByDate()
    {
        $this->mockHandler->onUriRequested(
            'kassa/orders/getorders?dateBegin=2015-03-01&dateEnd=2017-05-01',
            'get',
            new Response(200, [], $this->getFixture('get_orders_by_date.json'))
        );

        $orders = $this->kassaApi->getOrdersByDate('2015-03-01', '2017-05-01');

        $this->assertIsArray($orders);
        $this->assertEquals(1, $orders['total']);
        $this->assertCount(1, $orders['list']);
        $this->assertEquals('01.03.2015', $orders['dateBegin']);
        $this->assertEquals('01.05.2017', $orders['dateEnd']);
    }

    protected function getFixture($fileName)
    {
        return file_get_contents(implode(DIRECTORY_SEPARATOR, [
            __DIR__,
            '..',
            'fixtures',
            'kassa',
            $fileName,
        ]));
    }
}
