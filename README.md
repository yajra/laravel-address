# Philippines Address Lookup for Laravel

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)

[![Continuous Integration](https://github.com/yajra/laravel-address/actions/workflows/continuous-integration.yml/badge.svg)](https://github.com/yajra/laravel-address/actions/workflows/continuous-integration.yml)
[![Static Analysis](https://github.com/yajra/laravel-address/actions/workflows/static-analysis.yml/badge.svg)](https://github.com/yajra/laravel-address/actions/workflows/static-analysis.yml)

[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

A package for providing Philippines Address lookup API with Laravel.

## Install

- Via Composer

``` bash
$ composer require yajra/laravel-address
```

## Providers and Config

> If you are using Laravel 5.5+ then the steps below are optional.

### Register service provider (Optional on Laravel 5.5+)

```php
Yajra\Address\AddressServiceProvider::class
```

### Publish config (Optional)

```bash
$ php artisan vendor:publish
```

## Available Config

`address.prefix` To change the API base route.

`address.middleware` Route middleware.

## Required Setup (Migration and Seeder)

- Run the address migration. 

```bash
php artisan migrate
```

- Run the address seeder. 

```bash
php artisan db:seed Yajra\\Address\\Seeders\\AddressSeeder
````

## Routes

The default prefix for the api routes is `/api/address`. The default can be updated via config `address.php` file.

- Get All Regions `/api/address/regions`.
- Get All Provinces `/api/address/provinces`.
- Get Provinces By Region `/api/address/provinces/{regionId}`.
- Get Cities By Province `/api/address/cities/{provinceId}`.
- Get Barangays By City `/api/address/barangays/{cityId}`.

## Usage / Examples

### Add address migration

Add address migration using `$table->address()`. This will add the following fields:
- street
- barangay_id
- city_id
- province_id
- region_id

### Include built-in form (Requires jQuery)

On your view, include `@include('address::form', ['model' => $modelWithAddress])`

### Add scripts section on your master layout.

Before the end of body tag, include `@stack('scripts')`.

```php
<body>
-- Contents Here ---

<script src="/vendor/jquery.js"></script>
@stack('scripts')
</body>
```

## Model with Address Integration

Just use `Yajra\Address\HasAddress` trait on your model to load address models relationship.

```php
use Yajra\Address\HasAddress;

class User extends Model {
    use HasAddress;
}
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email aqangeles@gmail.com instead of using the issue tracker.

## Credits

- [Arjay Angeles][link-author]
- [All Contributors][link-contributors]

## Buy me a coffee

[![paypal](https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif)](https://www.paypal.me/yajra)
<a href='https://www.patreon.com/bePatron?u=4521203'><img alt='Become a Patron' src='https://s3.amazonaws.com/patreon_public_assets/toolbox/patreon.png' border='0' width='200px' ></a>

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/yajra/laravel-address.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/yajra/laravel-address/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/yajra/laravel-address.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/yajra/laravel-address.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/yajra/laravel-address.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/yajra/laravel-address
[link-travis]: https://travis-ci.org/yajra/laravel-address
[link-scrutinizer]: https://scrutinizer-ci.com/g/yajra/laravel-address/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/yajra/laravel-address
[link-downloads]: https://packagist.org/packages/yajra/laravel-address
[link-author]: https://github.com/yajra
[link-contributors]: ../../contributors
