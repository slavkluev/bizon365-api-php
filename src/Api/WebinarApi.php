<?php


namespace slavkluev\Bizon365\Api;

use GuzzleHttp\Exception\ClientException;
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
     * @param int|null $skip
     * @param int|null $limit
     * @param bool|null $liveWebinars
     * @param bool|null $autoWebinars
     * @return mixed
     * @throws ClientException
     */
    public function getList(
        int $skip = null,
        int $limit = null,
        bool $liveWebinars = null,
        bool $autoWebinars = null
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
     * @return mixed
     * @throws ClientException
     */
    public function getWebinar(string $webinarId)
    {
        $url = UrlHelper::build(self::METHODS['get'], [
            'webinarId' => $webinarId,
        ]);
        return $this->get($url);
    }

    /**
     * @param string $webinarId
     * @param int|null $skip
     * @param int|null $limit
     * @return mixed
     * @throws ClientException
     */
    public function getViewers(
        string $webinarId,
        int $skip = null,
        int $limit = null
    ) {
        $url = UrlHelper::build(self::METHODS['get.viewers'], [
            'webinarId' => $webinarId,
            'skip'      => $skip,
            'limit'     => $limit,
        ]);
        return $this->get($url);
    }

    /**
     * @param int|null $skip
     * @param int|null $limit
     * @return mixed
     * @throws ClientException
     */
    public function getSubpages(
        int $skip = null,
        int $limit = null
    ) {
        $url = UrlHelper::build(self::METHODS['get.subpages'], [
            'skip'  => $skip,
            'limit' => $limit,
        ]);
        return $this->get($url);
    }

    /**
     * @param string $pageId
     * @param int|null $skip
     * @param int|null $limit
     * @param string|null $registeredTimeMin
     * @param string|null $registeredTimeMax
     * @param string|null $webinarTimeMin
     * @param string|null $webinarTimeMax
     * @param string|null $urlMarker
     * @return mixed
     * @throws ClientException
     */
    public function getSubscribers(
        string $pageId,
        int $skip = null,
        int $limit = null,
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

    /**
     * @param array $subscriber
     * @return mixed
     * @throws ClientException
     */
    public function addSubscriber(array $subscriber)
    {
        return $this->post(self::METHODS['add.subscriber'], $subscriber);
    }

    /**
     * @param string $pageId
     * @param string $email
     * @return mixed
     * @throws ClientException
     */
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
