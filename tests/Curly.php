<?php

use function Minicli\PestCurlyPlugin\curly;

it('makes GET requests', function () {
    $this->get('https://api.github.com/rate_limit');
});

it('matches response codes', function () {
    $this->matchResponse('https://api.github.com/rate_limit', 200);
});

it('matches strings in response body', function () {
    $this->responseContains('https://api.github.com/rate_limit', 'rate');
});

it('makes requests using the curly() function to obtain response', function () {
    expect(curly()->get('https://api.github.com/rate_limit'))->toBeArray();
});
