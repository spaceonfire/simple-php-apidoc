<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Exception;

use Throwable;
use UnexpectedValueException;

final class GivenReflectionNotSupported extends UnexpectedValueException
{
    private function __construct(string $message = '', int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public static function byElementFactory(object $reflection): self
    {
        return new self(sprintf(
            'Given reflection class "%s" not supported. No factory found to handle.',
            get_class($reflection)
        ));
    }

    public static function byDocBlockResolver(object $reflection): self
    {
        return new self(sprintf(
            'Given reflection class "%s" not supported. No doc block resolver found to handle.',
            get_class($reflection)
        ));
    }

    public static function forReason(object $reflection, string $reason = ''): self
    {
        return new self(trim(sprintf(
            'Given reflection class "%s" not supported. %s',
            get_class($reflection),
            $reason
        )));
    }
}
