<?php


namespace slavkluev\Bizon365\Api;

use GuzzleHttp\Exception\ClientException;
use slavkluev\Bizon365\Helpers\UrlHelper;

class KassaApi extends AbstractApi
{
    const METHODS = [
        'get.orders' => 'kassa/orders/getorders',
    ];

    /**
     * Получение списка заказов с помощью поисковой строки.
     *
     * @see KassaApi::getOrders()
     *
     * @param string $search  Поисковая строка.
     * @param int|null $skip  Пропустить указанное число записей.
     * @param int|null $limit Ограничить количество записей. Не более 100.
     * @param bool|null $paid Выводить только оплаченные заказы.
     *
     * @return mixed
     *
     * @throws ClientException
     */
    public function getOrdersBySearch(
        string $search,
        ?int $skip = null,
        ?int $limit = null,
        ?bool $paid = null
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

    /**
     * Получение списка заказов за последние дни.
     *
     * @see KassaApi::getOrders()
     *
     * @param int       $days  Заказы в диапазоне указанного количества дней относительно текущего момента.
     * @param int|null  $skip  Пропустить указанное число записей.
     * @param int|null  $limit Ограничить количество записей. Не более 100.
     * @param bool|null $paid  Выводить только оплаченные заказы.
     *
     * @return mixed
     *
     * @throws ClientException
     */
    public function getOrdersByDays(
        int $days,
        ?int $skip = null,
        ?int $limit = null,
        ?bool $paid = null
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

    /**
     * Получение списка заказов в промежутке между датами.
     *
     * @see KassaApi::getOrders()
     *
     * @param string    $dateBegin Начальная дата поиска в нестрогом ISO-формате.
     * @param string    $dateEnd   Конечная дата поиска в нестрогом ISO-формате.
     * @param int|null  $skip      Пропустить указанное число записей.
     * @param int|null  $limit     Ограничить количество записей. Не более 100.
     * @param bool|null $paid      Выводить только оплаченные заказы.
     *
     * @return mixed
     *
     * @throws ClientException
     */
    public function getOrdersByDate(
        string $dateBegin,
        string $dateEnd,
        ?int $skip = null,
        ?int $limit = null,
        ?bool $paid = null
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

    /**
     * Получение списка заказов.
     *
     * @see https://blog.bizon365.ru/api/v1/kassa/orders/
     *
     * @param int|null    $skip      Пропустить указанное число записей.
     * @param int|null    $limit     Ограничить количество записей. Не более 100.
     * @param int|null    $days      Заказы в диапазоне указанного количества дней относительно текущего момента.
     * @param string|null $dateBegin Начальная дата поиска в нестрогом ISO-формате.
     * @param string|null $dateEnd   Конечная дата поиска в нестрогом ISO-формате.
     * @param bool|null   $paid      Выводить только оплаченные заказы.
     * @param string|null $search    Поисковая строка.
     *
     * @return mixed
     *
     * @throws ClientException
     */
    public function getOrders(
        ?int $skip = null,
        ?int $limit = null,
        ?int $days = null,
        ?string $dateBegin = null,
        ?string $dateEnd = null,
        ?bool $paid = null,
        ?string $search = null
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
