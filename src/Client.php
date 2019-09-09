<?php


namespace slavkluev\Bizon365;

use slavkluev\Bizon365\Api\WebinarApi;
use slavkluev\Bizon365\Exceptions\ModelException;

/**
 * Class Client
 * @package slavkluev\Bizon365
 * @property WebinarApi $webinar
 */
class Client
{
    private $api;

    public function __construct(string $token)
    {
        $this->api = new Api($token);
    }

    public function __get($name)
    {
        $class = 'slavkluev\\Bizon365\\Api\\' . ucfirst($name) . 'Api';
        if (!class_exists($class)) {
            throw new ModelException();
        }

        $api = new $class($this->api);
        return $api;
    }
}
