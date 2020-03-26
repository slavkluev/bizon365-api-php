<?php

namespace slavkluev\Bizon365\Api;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use slavkluev\Bizon365\Client;
use Tarampampam\GuzzleUrlMock\UrlsMockHandler;

class CourseApiTest extends TestCase
{
    protected $courseApi;
    protected $mockHandler;

    protected function setUp()
    {
        $this->mockHandler = new UrlsMockHandler;

        $httpClient = new GuzzleClient([
            'handler' => HandlerStack::create($this->mockHandler),
        ]);

        $client = new Client('token');
        $client->setHttpClient($httpClient);
        $this->courseApi = $client->getCourseApi();
    }

    public function testAddStudent()
    {
        $this->mockHandler->onUriRequested(
            'course/student/add',
            'post',
            new Response(200, [], $this->getFixture('add_student.json'))
        );

        $result = $this->courseApi->addStudent([
            'email' => 'test@test.com',
            'username' => 'test',
            'pwd' => 'test',
        ]);

        $this->assertIsArray($result);
        $this->assertEquals(1, $result['ok']);
    }

    protected function getFixture($fileName)
    {
        return file_get_contents(implode(DIRECTORY_SEPARATOR, [
            __DIR__,
            '..',
            'fixtures',
            'course',
            $fileName,
        ]));
    }
}
