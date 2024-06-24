# Maxelpay Package

A Maxelpay Integration for Laravel Framework

## QUICK PARTIAL DEMO

Git repo of the demo: https://github.com/munish48/maxelpay-payment-gayeway

## INSTALLATION

Install the package through [Composer](http://getcomposer.org/).

For Laravel :
`composer require "laravel/maxelpay"`

## CONFIGURATION

- Laravel upto 10

1. Open config/app.php and add this line to your Service Providers Array.

```php
Maxelpay\MaxelpayServiceProvider::class,
```

2. Open config/app.php and add this line to your Aliases

```php
  'Maxelpay' => Maxelpay\MaxelpayServiceProvider::class
```

- Laravel 11

1. Open bootstrap/providers.php and add this line to your Service Providers Array.

```php
Maxelpay\MaxelpayServiceProvider::class,
```

## HOW TO USE

```php
 php artisan vendor:publish --provider="Maxelpay\MaxelpayServiceProvider" --tag="config"
```

```php
// Payload example
 $data = array(
        "orderID"     => "123008", // Order Id
        "amount"      => "100", // Amount
        "currency"    => "INR", // Currency
        "timestamp"   => time(), // Time stamp
        "userName"    => "ABC", // Customer Name
        "siteName"    => "Maxelpay", // Website name
        "userEmail"   => "abc@gmail.com", // Customer Email
        "redirectUrl" => URL::to('/')."/success", // Success url
        "websiteUrl"  => URL::to('/')."", // Website url
        "cancelUrl"   => URL::to('/')."/cancel", // Cancle Url
        "webhookUrl"  => URL::to('/')."/webhook" // Webhook url
    );
```

- Laravel upto 10

```php
Maxelpay::maxelpayPayload($data);
```

- Laravel 11

```php
Maxelpay\Http\Controllers\MaxelpayController::maxelpayPayload($data);
```
