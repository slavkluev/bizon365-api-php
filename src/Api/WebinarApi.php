<?php


namespace slavkluev\Bizon365\Api;

use slavkluev\Bizon365\Api;
use slavkluev\Bizon365\Helpers\UrlHelper;
use slavkluev\Bizon365\Models\ArrayOfViewers;
use slavkluev\Bizon365\Models\ArrayOfWebinars;
use slavkluev\Bizon365\Models\Viewer;
use slavkluev\Bizon365\Models\Webinar;

class WebinarApi
{
    const METHODS = [
        'get' => 'https://online.bizon365.ru/api/v1/webinars/reports/get',
        'get.list' => 'https://online.bizon365.ru/api/v1/webinars/reports/getlist',
        'get.viewers' => 'https://online.bizon365.ru/api/v1/webinars/reports/getviewers',
    ];

    /**
     * @var Api
     */
    private $api;

    public function __construct($api)
    {
        $this->api = $api;
    }

    /**
     * @return Webinar[]
     * @throws \slavkluev\Bizon365\Exceptions\HttpException
     */
    public function getAll()
    {
        $result = [];

        $start = 0;
        $step = 100;

        do {
            $arrayOfWebinars = $this->getList($start, $step);
            $result = array_merge($result, $arrayOfWebinars->getWebinars());
            $start += $step;
        } while ($arrayOfWebinars->getTotal() > $start);

        return $result;
    }

    /**
     * @param int $skip
     * @param int $limit
     * @param bool $liveWebinars
     * @param bool $autoWebinars
     * @return ArrayOfWebinars
     * @throws \slavkluev\Bizon365\Exceptions\HttpException
     */
    public function getList(
        int $skip = 0,
        int $limit = 20,
        bool $liveWebinars = true,
        bool $autoWebinars = true
    ) {
        $url = UrlHelper::build(self::METHODS['get.list'], [
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
//        $url = UrlHelper::build(self::METHODS['get'], [
//            'webinarId' => $webinarId,
//        ]);
//        $this->api->call($url);
    }

    /**
     * @param string $webinarId
     * @return Viewer[]
     * @throws \slavkluev\Bizon365\Exceptions\HttpException
     */
    public function getAllViewers(string $webinarId)
    {
        $result = [];

        $start = 0;
        $step = 1000;

        do {
            $arrayOfViewers = $this->getViewers($webinarId, $start, $step);
            $result = array_merge($result, $arrayOfViewers->getViewers());
            $start += $step;
        } while ($arrayOfViewers->getTotal() > $start);

        return $result;
    }

    /**
     * @param string $webinarId
     * @param int $skip
     * @param int $limit
     * @return ArrayOfViewers
     * @throws \slavkluev\Bizon365\Exceptions\HttpException
     */
    public function getViewers(
        string $webinarId,
        int $skip = 0,
        int $limit = 1000
    ) {
        $url = UrlHelper::build(self::METHODS['get.viewers'], [
            'webinarId' => $webinarId,
            'skip' => $skip,
            'limit' => $limit,
        ]);
        return ArrayOfViewers::fromResponse($this->api->call($url));
    }
}
