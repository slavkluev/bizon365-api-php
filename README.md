# bizon365-api-php

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what
PSRs you support to avoid any confusion with users and contributors.

## Structure

If any of the following are applicable to your project, then the directory structure should follow industry best practices by being named the following.

```
bin/        
build/
docs/
config/
src/
tests/
vendor/
```


## Install

Via Composer

``` bash
$ composer require slavkluev/bizon365-api-php
```

## Usage

``` php
$client = new slavkluev\Bizon365\Client('token');
$webinars = $client->webinar->getList('webinarId');
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

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
