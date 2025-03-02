# PHP Client for JNE API

Unofficial library for access [JNE API](https://apidash.jne.co.id/) from PHP applications.

Originally created by yusufthedragon/jne-php.

- [Installation](#installation)
- [Usage](#usage)
  - [Set the Username and API Key](#set-the-username-and-api-key)
  - [Set the Production Mode](#set-the-production-mode)
- [Usages and Examples](#usages-and-examples)
  - [Fare](#fare)
    - [Get Fares](#get-fares)
  - [JNE Online Pickup or Cashless](#jne-online-pickup-or-cashless)
  - [Tracking](#tracking)
    - [Trace the Package](#trace-the-package)
- [Contributing](#contributing)

---

## Installation

Install jne-php with composer by following command:

```bash
composer require sianggit/jne-php
```

or add it manually in your `composer.json` file.

## Usage

### Set the Username and API Key

Setup the package with your account's username and api key obtained from [JNE](https://apidash.jne.co.id).

```php
\Agt\JNE\JNE::setUsername('username')->setApiKey('apiKey');
```

### Set the Production Mode

When deploying your application to production, you may want to change API Endpoint to production as well by setting `setProductionMode` to `true`.

```php
\Agt\JNE\JNE::setProductionMode(true);
// or chain it
\Agt\JNE\JNE::setUsername('username')->setApiKey('apiKey')->setProductionMode(true);
```

## Usages and Examples

### Fare

#### Get Fares

Retrieve available fares based on origin and destination code.

```php
\Agt\JNE\Fare::getFares(array $parameters);
```

Usage example:

```php
$params = [
    'from' => 'CGK10000',
    'thru' => 'BDO10000',
    'weight' => 1
];

$getFares = \Agt\JNE\Fare::getFares($params);

var_dump($getFares);
```

### JNE Online Pickup or Cashless

```php
\Agt\JNE\Pickup::create(array $parameters);
```

Usage example:

```php
$params = [
    'SHIPPER_NAME' => 'John Doe',
    'SHIPPER_ADDR1' => 'Jl. Custom Address No. 10',
    'SHIPPER_CITY' => 'JAMBI',
    'SHIPPER_ZIP' => '36136',
    'SHIPPER_REGION' => 'JAMBI',
    'SHIPPER_COUNTRY' => 'INDONESIA',
    'SHIPPER_CONTACT' => 'John Doe',
    'SHIPPER_PHONE' => '+6287793443322',
    'RECEIVER_NAME' => 'Jane Doe',
    'RECEIVER_ADDR1' => 'Jl. Custom Address No. 20',
    'RECEIVER_CITY' => 'TANGERANG SELATAN',
    'RECEIVER_ZIP' => '31264',
    'RECEIVER_REGION' => 'BANTEN',
    'RECEIVER_COUNTRY' => 'INDONESIA',
    'RECEIVER_CONTACT' => 'Jane Doe',
    'RECEIVER_PHONE' => '+6287793443322',
    'ORIGIN_DESC' => 'Custom Description',
    'ORIGIN_CODE' => 'CGK10100',
    'DESTINATION_DESC' => 'Dummy Description',
    'DESTINATION_CODE' => 'CGK10101',
    'SERVICE_CODE' => 'REG',
    'WEIGHT' => 1,
    'QTY' => 1,
    'GOODS_DESC' => 'Goods Description',
    'DELIVERY_PRICE' => 9000,
    'BOOK_CODE' => 'NT-52744198231'
];

$createJOB = \Agt\JNE\Pickup::create($params);

var_dump($createJOB);
```

### Tracking

#### Trace the Package

```php
\Agt\JNE\Tracking::trace(string $awbNumber);
```

Usage examples

```php
$tracePackage = \Agt\JNE\Tracking::trace('0114541900204500');

var_dump($tracePackage);
```

## License
This library is open-sourced software licensed under the [GPL-3.0-only License](https://opensource.org/licenses/gpl-3.0.html).

## Contributing

For any requests, bugs, or comments, please open an [issue](https://github.com/sianggit/jne-php/issues) or [submit a pull request](https://github.com/sianggit/jne-php/pulls).
