<?php


namespace slavkluev\Bizon365\Api;

use GuzzleHttp\Exception\ClientException;
use slavkluev\Bizon365\Client;

abstract class AbstractApi
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param string $url
     * @return mixed
     * @throws ClientException
     */
    protected function get(string $url)
    {
        $guzzleClient = $this->client->getHttpClient();
        return $this->decodeJson($guzzleClient->get($url)->getBody());
    }

    /**
     * @param string $url
     * @param array $data
     * @return mixed
     * @throws ClientException
     */
    protected function post(string $url, array $data = [])
    {
        $guzzleClient = $this->client->getHttpClient();
        return $this->decodeJson($guzzleClient->post($url, ['json' => $data])->getBody());
    }

    protected function decodeJson(string $json)
    {
        return json_decode($json, true);
    }
}
