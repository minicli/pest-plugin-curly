<?php

declare(strict_types=1);

namespace Minicli\PestCurlyPlugin;

use Minicli\Curly\Client;
use Pest\Plugin;

Plugin::uses(Curly::class);

function curly(): Client
{
    return new Client();
}
