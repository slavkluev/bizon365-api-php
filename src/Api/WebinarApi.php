<?php


namespace slavkluev\Bizon365\Api;

use slavkluev\Bizon365\Helpers\UrlHelper;

class WebinarApi extends AbstractApi
{
    const METHODS = [
        'get'               => 'webinars/reports/get',
        'get.list'          => 'webinars/reports/getlist',
        'get.viewers'       => 'webinars/reports/getviewers',
        'get.subpages'      => 'webinars/subpages/getSubpages',
        'get.subscribers'   => 'webinars/subpages/getSubscribers',
        'add.subscriber'    => 'webinars/subpages/addSubscriber',
        'remove.subscriber' => 'webinars/subpages/removeSubscriber',
    ];

    /**
     * @param int $skip
     * @param int $limit
     * @param bool $liveWebinars
     * @param bool $autoWebinars
     * @return array
     */
    public function getList(
        int $skip = 0,
        int $limit = 20,
        bool $liveWebinars = true,
        bool $autoWebinars = true
    ) {
        $url = UrlHelper::build(self::METHODS['get.list'], [
            'skip'         => $skip,
            'limit'        => $limit,
            'LiveWebinars' => $liveWebinars,
            'AutoWebinars' => $autoWebinars,
        ]);
        return $this->get($url);
    }

    /**
     * @param string $webinarId
     * @return array
     */
    public function getWebinar(string $webinarId)
    {
        $url = UrlHelper::build(self::METHODS['get'], [
            'webinarId' => $webinarId,
        ]);
        print_r($url);
        return $this->get($url);
    }

    /**
     * @param string $webinarId
     * @param int $skip
     * @param int $limit
     * @return array
     */
    public function getViewers(
        string $webinarId,
        int $skip = 0,
        int $limit = 1000
    ) {
        $url = UrlHelper::build(self::METHODS['get.viewers'], [
            'webinarId' => $webinarId,
            'skip'      => $skip,
            'limit'     => $limit,
        ]);
        return $this->get($url);
    }

    public function getSubpages(
        int $skip = 0,
        int $limit = 50
    ) {
        $url = UrlHelper::build(self::METHODS['get.subpages'], [
            'skip'  => $skip,
            'limit' => $limit,
        ]);
        return $this->get($url);
    }

    public function getSubscribers(
        string $pageId,
        int $skip = 0,
        int $limit = 50,
        string $registeredTimeMin = null,
        string $registeredTimeMax = null,
        string $webinarTimeMin = null,
        string $webinarTimeMax = null,
        string $urlMarker = null
    ) {
        $url = UrlHelper::build(self::METHODS['get.subscribers'], [
            'pageId'            => $pageId,
            'skip'              => $skip,
            'limit'             => $limit,
            'registeredTimeMin' => $registeredTimeMin,
            'registeredTimeMax' => $registeredTimeMax,
            'webinarTimeMin'    => $webinarTimeMin,
            'webinarTimeMax'    => $webinarTimeMax,
            'urlMarker'         => $urlMarker,
        ]);
        return $this->get($url);
    }

    public function addSubscriber(array $subscriber)
    {
        return $this->post(self::METHODS['add.subscriber'], $subscriber);
    }

    public function removeSubscriber(
        string $pageId,
        string $email
    ) {
        return $this->post(self::METHODS['remove.subscriber'], [
            'pageId' => $pageId,
            'email'  => $email,
        ]);
    }
}
