# Upgrade Guide

## Upgrading To 11.x From 12.x

1. Update your `composer.json` file to require `yajra/laravel-address` version 12.x.
2. Run `composer update` to update your dependencies.
3. Force publish the package configuration file by running:
    ```shell
    php artisan vendor:publish --tag=address --force
    ```
4. Update your existing addresses to use the new 10 digits code. How? I still don't know how to do this. 😅
