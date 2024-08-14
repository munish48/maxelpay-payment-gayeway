# Maxelpay Payment Gateway

A Maxelpay Integration for Laravel Framework

## QUICK PARTIAL DEMO

Git repo of the demo: https://github.com/munish48/maxelpay-payment-gayeway

## INSTALLATION

You can install the package via [Composer](http://getcomposer.org/).

```bash
composer require maxelpay/maxelpay
```

## CONFIGURATION

Compatible with Laravel versions 11.x

1. Open bootstrap/providers.php and add this line to your Service Providers Array.

```php
  Maxelpay\MaxelpayServiceProvider::class,
```

2. Open config/app.php and add this line

```php
// Include on the top
use Illuminate\Support\Facades\Facade;
```

```php
  'aliases' => Facade::defaultAliases()->merge([
       'Maxelpay' => Maxelpay\Http\Controllers\MaxelpayController::class,
  ])->toArray(),
```

Compatible with Laravel versions 7.x through 10.x

1. Open config/app.php and add this line to your Service Providers Array.

```php
  Maxelpay\MaxelpayServiceProvider::class,
```

2. Open config/app.php and add this line to your Aliases

```php
  'Maxelpay' => Maxelpay\Http\Controllers\MaxelpayController::class,
```

## HOW TO USE

```php
 php artisan vendor:publish --provider="Maxelpay\MaxelpayServiceProvider"
```

```php
// add this line in .env file
MAXELPAY_API_KEY="******************" // api key
MAXELPAY_SECRET_KEY="******************"  // secret key
MAXELPAY_PAYMENT_MODE="STAGING" OR "LIVE" // payment mode staging or live
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
        "redirectUrl" => URL::to('success'), // Success URL
        "websiteUrl"  => URL::to('/'), // Website URL
        "cancelUrl"   => URL::to('cancel'), // Cancel URL
        "webhookUrl"  => URL::to('webhook') // Webhook URL
    );
```

```php
Maxelpay::payload($data);
```
