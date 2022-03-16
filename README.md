# Curly Pest Plugin

This plugin adds basic HTTP requests functionality to Pest tests, using [minicli/curly](https://github.com/minicli/curly).

## Installation 

```shell
composer require minicli/pest-plugin-curly
```

## Usage

The plugin exposes 3 testcase methods:

- `get()`
- `matchResponse(string $endpoint, int code)`
- `responseContains(string $endpoint, string $needle)`

## Examples:

```php
<?php

it('makes GET requests', function () {
    $this->get('https://api.github.com/rate_limit');
});

it('matches response codes', function () {
    $this->matchResponse('https://api.github.com/rate_limit', 200);
});

it('matches strings in response body', function () {
    $this->responseContains('https://api.github.com/rate_limit', 'rate');
});
```

It also comes with a shortcut function that you can use to have access to a Curly Client instance.

```php
use function Minicli\PestCurlyPlugin\curly;

it('makes requests using the curly() function to obtain response', function () {
    expect(curly()->get('https://api.github.com/rate_limit'))->toBeArray();
});
```

