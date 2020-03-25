<?php

namespace slavkluev\Bizon365\Api;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use slavkluev\Bizon365\Client;

class WebinarApiTest extends TestCase
{
    protected $webinarApi;
    protected $mockHandler;

    protected function setUp(): void
    {
        $this->mockHandler = new MockHandler();

        $httpClient = new GuzzleClient([
            'handler' => $this->mockHandler,
        ]);

        $client = new Client('token');
        $client->setHttpClient($httpClient);
        $this->webinarApi = $client->getWebinarApi();
    }

    public function testGetList()
    {
        $this->mockHandler->append(new Response(200, [], $this->getFixture('get_list.json')));

        $list = $this->webinarApi->getList();

        $this->assertIsArray($list);
        $this->assertCount(2, $list['list']);
    }

    public function testGetWebinar()
    {
        $this->mockHandler->append(new Response(200, [], $this->getFixture('get_webinar.json')));

        $webinar = $this->webinarApi->getWebinar('test webinar id');

        $this->assertIsArray($webinar);
        $this->assertEquals('test webinar id', $webinar['report']['webinarId']);
    }

    public function testGetViewers()
    {
        $this->mockHandler->append(new Response(200, [], $this->getFixture('get_viewers.json')));

        $viewers = $this->webinarApi->getViewers('test webinar id');

        $this->assertIsArray($viewers);
        $this->assertCount(1, $viewers['viewers']);
        $this->assertEquals(1, $viewers['total']);
    }

    public function testGetSubpages()
    {
        $this->mockHandler->append(new Response(200, [], $this->getFixture('get_subpages.json')));

        $subpages = $this->webinarApi->getSubpages();

        $this->assertIsArray($subpages);
        $this->assertCount(1, $subpages['pages']);
        $this->assertEquals(1, $subpages['total']);
    }

    public function testGetSubscribers()
    {
        $this->mockHandler->append(new Response(200, [], $this->getFixture('get_subscribers.json')));

        $subscribers = $this->webinarApi->getSubscribers('test_page_id');

        $this->assertIsArray($subscribers);
        $this->assertCount(1, $subscribers['list']);
        $this->assertEquals(1, $subscribers['total']);
    }

    public function testAddSubscriber()
    {
        $this->mockHandler->append(new Response(200, [], $this->getFixture('add_subscriber.json')));

        $subscriber = $this->webinarApi->addSubscriber([
            'pageId' => 'test_page_id',
            'email' => 'test@test.com',
        ]);

        $this->assertIsArray($subscriber);
        $this->assertIsString($subscriber['hash']);
    }

    public function testRemoveSubscriber()
    {
        $this->mockHandler->append(new Response(200, [], $this->getFixture('remove_subscriber.json')));

        $result = $this->webinarApi->removeSubscriber('test_page_id', 'test@test.com');

        $this->assertIsArray($result);
        $this->assertEquals(1, $result['deleted']);
    }

    protected function getFixture($fileName)
    {
        return file_get_contents(implode(DIRECTORY_SEPARATOR, [
            __DIR__,
            '..',
            'fixtures',
            'webinar',
            $fileName,
        ]));
    }
}
