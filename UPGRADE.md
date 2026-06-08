# Upgrade Guide

## Upgrading To 13.x From 12.x

1. Update your `composer.json` file to require `yajra/laravel-address` version 13.x.
2. Run `composer update` to update your dependencies.
3. Ensure your application is running on Laravel 13.x.

## Upgrading To 12.x From 11.x

1. Update your `composer.json` file to require `yajra/laravel-address` version 12.x.
2. Run `composer update` to update your dependencies.
3. Force publish the package configuration file by running:
    ```shell
    php artisan vendor:publish --tag=address --force
    ```
4. Update your existing addresses to use the new 10 digits code. How? I still don't know how to do this. 😅
