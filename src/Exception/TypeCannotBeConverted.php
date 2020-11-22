<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Exception;

use phpDocumentor\Reflection\Type as PhpDocumentorType;
use UnexpectedValueException;

final class TypeCannotBeConverted extends UnexpectedValueException
{
    public function __construct(PhpDocumentorType $type)
    {
        parent::__construct(sprintf('Unable to convert phpDocumentor type "%s"', $type));
    }
}
