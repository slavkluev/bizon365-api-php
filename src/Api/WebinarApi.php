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
     * Получение списка доступных отчетов.
     *
     * @see https://blog.bizon365.ru/api/v1/webinars/reports/
     *
     * @param int|null  $skip         Пропустить указанное число записей.
     * @param int|null  $limit        Ограничить количество записей. Не более 100.
     * @param bool|null $liveWebinars Искать среди живых вебинаров.
     * @param bool|null $autoWebinars Искать среди автовебинаров.
     *
     * @return mixed
     *
     * @throws ClientException
     */
    public function getList(
        ?int $skip = null,
        ?int $limit = null,
        ?bool $liveWebinars = null,
        ?bool $autoWebinars = null
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
     * Получение конкретного отчета.
     *
     * @see https://blog.bizon365.ru/api/v1/webinars/reports/
     *
     * @param string $webinarId Идентификатор вебинара.
     *
     * @return mixed
     *
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
     * Получение списка зрителей вебинара.
     *
     * @see https://blog.bizon365.ru/api/v1/webinars/reports/
     *
     * @param string   $webinarId Идентификатор вебинара.
     * @param int|null $skip      Пропустить указанное число записей.
     * @param int|null $limit     Ограничить количество записей. Не более 1000.
     *
     * @return mixed
     *
     * @throws ClientException
     */
    public function getViewers(
        string $webinarId,
        ?int $skip = null,
        ?int $limit = null
    ) {
        $url = UrlHelper::build(self::METHODS['get.viewers'], [
            'webinarId' => $webinarId,
            'skip'      => $skip,
            'limit'     => $limit,
        ]);
        return $this->get($url);
    }

    /**
     * Получение списка страниц регистрации и их рассылок.
     *
     * @see https://blog.bizon365.ru/api/v1/webinars/subpages/
     *
     * @param int|null $skip  Пропустить указанное число записей.
     * @param int|null $limit Ограничить количество записей.
     *
     * @return mixed
     *
     * @throws ClientException
     */
    public function getSubpages(
        ?int $skip = null,
        ?int $limit = null
    ) {
        $url = UrlHelper::build(self::METHODS['get.subpages'], [
            'skip'  => $skip,
            'limit' => $limit,
        ]);
        return $this->get($url);
    }

    /**
     * Получение списка подписчиков в заданной странице регистрации.
     *
     * @see https://blog.bizon365.ru/api/v1/webinars/subpages/
     *
     * @param string      $pageId            Идентификатор страницы регистрации.
     * @param int|null    $skip              Пропустить указанное число записей.
     * @param int|null    $limit             Ограничить количество записей.
     * @param string|null $registeredTimeMin Нижняя граница для времени регистрации подписчика. Задается в формате ISO.
     * @param string|null $registeredTimeMax Верхняя граница для времени регистрации подписчика. Задается в формате ISO.
     * @param string|null $webinarTimeMin    Нижняя граница для времени сеанса. Задается в формате ISO.
     * @param string|null $webinarTimeMax    Верхняя граница для времени сеанса. Задается в формате ISO.
     * @param string|null $urlMarker         Значение Маркера из URL, идентификатор партнера.
     *
     * @return mixed
     *
     * @throws ClientException
     */
    public function getSubscribers(
        string $pageId,
        ?int $skip = null,
        ?int $limit = null,
        ?string $registeredTimeMin = null,
        ?string $registeredTimeMax = null,
        ?string $webinarTimeMin = null,
        ?string $webinarTimeMax = null,
        ?string $urlMarker = null
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
     * Добавление подписчика в базу, регистрируя его на конкретный сеанс вебинара.
     *
     * @see https://blog.bizon365.ru/api/v1/webinars/subpages/
     *
     * @param array $subscriber Массив с требуемыми параметрами.
     *  $subscriber = [
     *      'pageId'     => (string) Идентификатор страницы регистрации в Бизоне. Обязательное.
     *      'email'      => (string) Электронная почта подписчика. Обязательное.
     *      'phone'      => (string) Номер телефона.
     *      'time'       => (string) Выбранное время сеанса. Формат: ISO. Обязательное.
     *      'username'   => (string) Имя подписчика.
     *      'confirm'    => (int)    Если параметр = 1, то подписчик добавляется в режиме "с подтверждением e-mail".
     *      'url_marker' => (string) Значение "Марке из URL"..
     *      'utm_*'      => (string) Поддерживаются utm-метки.
     *  ]
     *
     * @return mixed
     *
     * @throws ClientException
     */
    public function addSubscriber(array $subscriber)
    {
        return $this->post(self::METHODS['add.subscriber'], $subscriber);
    }

    /**
     * Удаление подписчика со страницы регистрации.
     *
     * @see https://blog.bizon365.ru/api/v1/webinars/subpages/
     *
     * @param string $pageId Идентификатор страницы регистрации в Бизоне.
     * @param string $email  Электронная почта подписчика.
     *
     * @return mixed
     *
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
