<?php

declare(strict_types=1);

namespace Humassistant\Sdk\Resources;

use Humassistant\Sdk\HttpClient;

abstract class Resource
{
    public function __construct(
        protected readonly HttpClient $http,
    ) {}
}
