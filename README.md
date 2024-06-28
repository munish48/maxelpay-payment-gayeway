# Maxelpay Package

A Maxelpay Integration for Laravel Framework

## QUICK PARTIAL DEMO

Git repo of the demo: https://github.com/munish48/maxelpay-payment-gayeway

## INSTALLATION

Install the package through [Composer](http://getcomposer.org/).

For Laravel :
`composer require "maxelpay/maxelpay"`

## CONFIGURATION

- Laravel upto 10

1. Open config/app.php and add this line to your Service Providers Array.

```php
  Maxelpay\MaxelpayServiceProvider::class,
```

2. Open config/app.php and add this line to your Aliases

```php
  'Maxelpay' => Maxelpay\Http\Controllers\MaxelpayController::class,
```

- Laravel 11

1. Open config/app.php and add this line.

```
// Include on the top
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\ServiceProvider;
```

```php
 'providers' => ServiceProvider::defaultProviders()->merge([
        Maxelpay\MaxelpayServiceProvider::class,
  ])->toArray(),
```

2. Open config/app.php and add this line

```php
  'aliases' => Facade::defaultAliases()->merge([
       'Maxelpay' => Maxelpay\Http\Controllers\MaxelpayController::class,
  ])->toArray(),
```

## HOW TO USE

```php
 php artisan vendor:publish --provider="Maxelpay\MaxelpayServiceProvider"
```

```php
// add this line in .env file
MAXELPAY_API_KEY="******************" // api key
MAXELPAY_SECRET_KEY="******************"  // secret key
MAXELPAY_PAYMENT_MODE="STAGING" OR "LIVE"// payment mode staging or live
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
        "redirectUrl" => URL::to('/')."/success", // Success URL
        "websiteUrl"  => URL::to('/')."", // Website URL
        "cancelUrl"   => URL::to('/')."/cancel", // Cancel URL
        "webhookUrl"  => URL::to('/')."/webhook" // Webhook URL
    );
```

```php
Maxelpay::payload($data);
```
