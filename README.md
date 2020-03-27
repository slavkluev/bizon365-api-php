# bizon365-api-php

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

Удобный и быстрый клиент на PHP для работы с API [bizon365](https://bizon365.ru/).

## Установка

Via Composer

``` bash
$ composer require slavkluev/bizon365-api-php
```

## Использование

### Авторизация через токен

Авторизация со значением токена, полученного в интерфейсе системы, в разделе «Модераторы, сотрудники» у конкретного пользователя.

``` php
require_once __DIR__ . '/vendor/autoload.php';

use slavkluev\Bizon365\Client;

$client = new Client('token');
```

### Вебинары

``` php
$webinarApi = $client->getWebinarApi();

try {
    // Получение списка доступных отчетов
    $list = $webinarApi->getList();

    // Получение конкретного отчета
    $webinar = $webinarApi->getWebinar('test_webinar_id');

    // Получение списка зрителей вебинара
    $viewers = $webinarApi->getViewers('test_webinar_id');

    // Получение списка страниц регистрации и их рассылок
    $subpages = $webinarApi->getSubpages();

    // Получение списка подписчиков в заданной странице регистрации
    $subscribers = $webinarApi->getSubscribers('test_page_id');

    // Добавление подписчика в базу, регистрируя его на конкретный сеанс вебинара
    $subscriber = $webinarApi->addSubscriber([
        'pageId' => 'test_page_id',
        'email' => 'test@test.com',
        'time' => '2017-10-11T17:00:00.000Z',
    ]);

    // Удаление подписчика со страницы регистрации
    $result = $webinarApi->removeSubscriber('test_page_id', 'test@test.com');

} catch (\GuzzleHttp\Exception\ClientException $e) {
    echo $e->getResponse()->getBody()->getContents();
}
```

### Касса

``` php
$kassaApi = $client->getKassaApi();

try {
    // Получение списка заказов
    $orders = $kassaApi->getOrders();

    // Получение списка заказов с помощью поисковой строки
    $orders = $kassaApi->getOrdersBySearch('test');

    // Получение списка заказов за последние дни
    $orders = $kassaApi->getOrdersByDays(1);

    // Получение списка заказов в промежутке между датами
    $orders = $kassaApi->getOrdersByDate('2015-03-01', '2017-05-01');

} catch (\GuzzleHttp\Exception\ClientException $e) {
    echo $e->getResponse()->getBody()->getContents();
}
```

### Курсы

``` php
$courseApi = $client->getCourseApi();

try {
    // Зарегистрировать ученика
    $result = $courseApi->addStudent([
        'email' => 'test@test.com',
        'username' => 'test',
        'pwd' => 'test',
    ]);

} catch (\GuzzleHttp\Exception\ClientException $e) {
    echo $e->getResponse()->getBody()->getContents();
}
```

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email slavkluev@yandex.ru instead of using the issue tracker.

## Credits

- [Viacheslav Kliuev][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/slavkluev/bizon365-api-php.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/slavkluev/bizon365-api-php/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/slavkluev/bizon365-api-php.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/slavkluev/bizon365-api-php.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/slavkluev/bizon365-api-php.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/slavkluev/bizon365-api-php
[link-travis]: https://travis-ci.org/slavkluev/bizon365-api-php
[link-scrutinizer]: https://scrutinizer-ci.com/g/slavkluev/bizon365-api-php/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/slavkluev/bizon365-api-php
[link-downloads]: https://packagist.org/packages/slavkluev/bizon365-api-php
[link-author]: https://github.com/slavkluev
[link-contributors]: ../../contributors
