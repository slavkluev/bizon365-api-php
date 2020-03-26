<?php


namespace slavkluev\Bizon365\Api;

use slavkluev\Bizon365\Helpers\UrlHelper;

class KassaApi extends AbstractApi
{
    const METHODS = [
        'get.orders' => 'kassa/orders/getorders',
    ];

    public function getOrdersBySearch(
        string $search,
        int $skip = null,
        int $limit = null,
        bool $paid = null
    ) {
        return $this->getOrders(
            $skip,
            $limit,
            null,
            null,
            null,
            $paid,
            $search
        );
    }

    public function getOrdersByDays(
        int $days,
        int $skip = null,
        int $limit = null,
        bool $paid = null
    ) {
        return $this->getOrders(
            $skip,
            $limit,
            $days,
            null,
            null,
            $paid,
            null
        );
    }

    public function getOrdersByDate(
        string $dateBegin,
        string $dateEnd,
        int $skip = null,
        int $limit = null,
        bool $paid = null
    ) {
        return $this->getOrders(
            $skip,
            $limit,
            null,
            $dateBegin,
            $dateEnd,
            $paid,
            null
        );
    }

    public function getOrders(
        int $skip = null,
        int $limit = null,
        int $days = null,
        string $dateBegin = null,
        string $dateEnd = null,
        bool $paid = null,
        string $search = null
    ) {
        $url = UrlHelper::build(self::METHODS['get.orders'], [
            'skip'      => $skip,
            'limit'     => $limit,
            'days'      => $days,
            'dateBegin' => $dateBegin,
            'dateEnd'   => $dateEnd,
            'paid'      => $paid,
            'search'    => $search,
        ]);
        return $this->get($url);
    }
}
