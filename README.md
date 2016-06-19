# transcriptic-php

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Total Downloads][ico-downloads]][link-downloads]

transcriptic-php is a PHP package for the Transcriptic API. 

The author is not affiliated with TRANSCRIPTIC and TRANSCRIPTIC is not involved in the development of this package in any way.

## Install

Via Composer

``` bash
$ composer require kz/transcriptic-php
```

## Laravel Configuration

transcriptic-php has optional support for Laravel and comes with a Service Provider and Facades for easy integration. The vendor/autoload.php is included by Laravel, so you don't have to require or autoload manually. Just see the instructions below.

After you have installed transcriptic-php, open your Laravel config file config/app.php and add the following lines.

In the $providers array add the service providers for this package:

``` php
Kz\Transcriptic\TranscripticServiceProvider::class,
```

Add the facade of this package to the $aliases array:

``` php
'Transcriptic' => Kz\Transcriptic\TranscripticFacade::class,
```

Now the Transcriptic Class will be auto-loaded by Laravel.

You also need to supply your User Email and User Token in your .env environment file:

```
TRANSCRIPTIC_EMAIL=john@example.com
TRANSCRIPTIC_TOKEN=XXXXXXXXXXXXXXXXXXXX
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Kelvin Zhang](https://github.com/kz)
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/kz/transcriptic-php.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/kz/transcriptic-php.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/kz/transcriptic-php
[link-downloads]: https://packagist.org/packages/kz/transcriptic-php
[link-author]: https://github.com/kz
[link-contributors]: ../../contributors
