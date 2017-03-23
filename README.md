[![PHP](https://img.shields.io/badge/PHP-5.6%2B-blue.svg)](https://secure.php.net/migration56)
[![Latest Stable Version](https://poser.pugx.org/webinarium/linode-api3/v/stable)](https://packagist.org/packages/webinarium/linode-api3)
[![Build Status](https://travis-ci.org/webinarium/linode-api3.svg?branch=master)](https://travis-ci.org/webinarium/linode-api3)
[![Code Coverage](https://scrutinizer-ci.com/g/webinarium/linode-api3/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/webinarium/linode-api3/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/webinarium/linode-api3/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/webinarium/linode-api3/?branch=master)

# Linode API v3 Client Library for PHP

This library implements full spec of Linode API v3 (in accordance with https://www.linode.com/api/utility/api.spec),
including functions which are not described at the [Linode's site](https://www.linode.com/api) yet (the documentation seems to be slightly outdated at the moment).

The library wasn't actually implemented, but autogenerated from the [spec](https://api.linode.com/?api_action=api.spec).
This approach provides several advantages as:
 * we can be sure that nothing from the spec is missed,
 * no implementation errors which could be caused by human factor,
 * in case of the spec extension it's fast and easy to update the library's code.

Also please note that "[test.echo](https://www.linode.com/api/utility/test.echo)" is skipped from the implementation.

## Requirements

PHP needs to be a minimum version of PHP 5.4.

## Installation

The recommended way to install is via Composer:

```bash
composer require "webinarium/linode-api3"
```

## Usage Example

Below is a complete example of how to create a new Linode host using the library:

```php
use Linode\LinodeApi;
use Linode\LinodeException;
use Linode\PaymentTerm;

// Your API key from the Linode profile.
$key = '...';

// Hardcode some IDs to make the example shorter.
// Normally you might want to use "Linode\AvailApi" class functions.
$datacenter = 3;    // Fremont datacenter
$plan       = 1;    // we will use the cheapest plan

// Create new linode.
try {
    $api = new LinodeApi($key);
    $res = $api->create($datacenter, $plan, PaymentTerm::ONE_MONTH);

    printf("Linode #%d has been created.\n", $res['LinodeID']);
}
catch (LinodeException $e) {
    printf("Error #%d: %s.\n", $e->getCode(), $e->getMessage());
}
```

## Batching Requests

The Linode API also supports a batched mode, whereby you supply multiple request sets and receive back an array of responses.
Example batch request using the library:

```php
use Linode\Batch;
use Linode\LinodeApi;
use Linode\PaymentTerm;

// Your API key from the Linode profile.
$key = '...';

// Hardcode some IDs to make the example shorter.
// Normally you might want to use "Linode\AvailApi" class functions.
$datacenters = [2, 3, 4, 6];    // all four US datacenters
$plan        = 1;               // we will use the cheapest plan

// Create a batch.
$batch = new Batch($key);

// Create new linode on each of US datacenters.
$api = new LinodeApi($batch);

foreach ($datacenters as $datacenter) {
    $api->create($datacenter, $plan, PaymentTerm::ONE_MONTH);
}

// Execute batch.
$results = $batch->execute();

foreach ($results as $res) {
    printf("Linode #%d has been created.\n", $res['DATA']['LinodeID']);
}
```

## Tests

Almost all tests are mocked so you don't have to use a real API key and no real linodes are affected.
The only tests which make a complete API call are `TestTest` (for "[test.echo](https://www.linode.com/api/utility/test.echo)") and `ApiTest` (for "[api.spec](https://www.linode.com/api/utility/api.spec)"):

```bash
./bin/phpunit --coverage-text
```

## Library regeneration

If you would like to regenerate the library code, you can do it with two simple steps:

```bash
php ./generator/generator
php ./bin/php-cs-fixer fix
```
