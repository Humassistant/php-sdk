<?php

declare(strict_types=1);

namespace Humassistant\Sdk\Exceptions;

class ValidationException extends HumassistantException
{
    public function __construct(
        string $message,
        private array $errors = [],
        int $code = 422,
        ?\Throwable $previous = null,
    ) {
        parent::__construct($message, $code, $previous);
    }

    public function errors(): array
    {
        return $this->errors;
    }
}
