<?php


namespace slavkluev\Bizon365\Api;

use slavkluev\Bizon365\Api;
use slavkluev\Bizon365\Helpers\UrlHelper;
use slavkluev\Bizon365\Models\ArrayOfViewers;
use slavkluev\Bizon365\Models\ArrayOfWebinars;

class WebinarApi
{
    const METHODS = [
        'getList' => 'https://online.bizon365.ru/api/v1/webinars/reports/getlist',
        'get' => 'https://online.bizon365.ru/api/v1/webinars/reports/get',
        'getViewers' => 'https://online.bizon365.ru/api/v1/webinars/reports/getviewers',
    ];

    /**
     * @var Api
     */
    private $api;

    public function __construct($api)
    {
        $this->api = $api;
    }

    public function getAll()
    {
        //TODO
    }

    public function getList(
        string $webinarId,
        int $skip = 0,
        int $limit = 20,
        bool $liveWebinars = true,
        bool $autoWebinars = true
    ) {
        $url = UrlHelper::build(self::METHODS['getList'], [
            'webinarId' => $webinarId,
            'skip' => $skip,
            'limit' => $limit,
            'LiveWebinars' => $liveWebinars,
            'AutoWebinars' => $autoWebinars,
        ]);
        return ArrayOfWebinars::fromResponse($this->api->call($url));
    }

    public function get(string $webinarId)
    {
        //TODO
        $this->api->call(UrlHelper::build(self::METHODS['get'], ['webinarId' => $webinarId]));
    }

    public function getAllViewers(string $webinarId)
    {
        //TODO
    }

    public function getViewers(
        string $webinarId,
        int $skip = 0,
        int $limit = 1000
    ) {
        $url = UrlHelper::build(self::METHODS['getViewers'], [
            'webinarId' => $webinarId,
            'skip' => $skip,
            'limit' => $limit,
        ]);
        return ArrayOfViewers::fromResponse($this->api->call($url));
    }
}
