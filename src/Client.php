<?php


namespace slavkluev\Bizon365;

/**
 * Class Client
 * @package slavkluev\Bizon365
 */
class Client
{
    use ApiMethodsTrait;

    const BASE_URI = 'https://online.bizon365.ru/api/v1/';

    /**
     * Stores the HTTP Client
     * @var \GuzzleHttp\Client
     */
    private $httpClient;

    /**
     * Stores the token
     * @var string
     */
    private $token;

    public function __construct(string $token)
    {
        $this->token = $token;
        $this->constructHttpClient();
    }

    protected function constructHttpClient()
    {
        $this->httpClient = new \GuzzleHttp\Client([
            'base_uri' => self::BASE_URI,
            'headers' => ['X-Token' => $this->token]
        ]);
    }

    /**
     * @return \GuzzleHttp\Client
     */
    public function getHttpClient()
    {
        return $this->httpClient;
    }

    /**
     * @param \GuzzleHttp\Client $httpClient
     */
    public function setHttpClient($httpClient): void
    {
        $this->httpClient = $httpClient;
    }
}
