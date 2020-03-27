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

    /**
     * Client constructor.
     *
     * @param string $token  Token
     * @param array  $config GuzzleClient configuration settings.
     */
    public function __construct(string $token, array $config = [])
    {
        $this->token = $token;
        $this->constructHttpClient($config);
    }

    protected function constructHttpClient($config)
    {
        $config = array_merge($config, [
            'base_uri' => self::BASE_URI,
            'headers' => ['X-Token' => $this->token]
        ]);
        $this->httpClient = new \GuzzleHttp\Client($config);
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
