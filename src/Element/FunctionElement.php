<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element;

use spaceonfire\ApiDoc\Element\ValueObject\FunctionParameter;
use spaceonfire\ApiDoc\Element\ValueObject\FunctionReturn;
use spaceonfire\ApiDoc\Element\ValueObject\FunctionThrows;
use spaceonfire\Collection\CollectionInterface;
use spaceonfire\Collection\IndexedCollection;
use spaceonfire\Collection\TypedCollection;
use spaceonfire\Type\InstanceOfType;

final class FunctionElement extends AbstractElement
{
    /**
     * @var CollectionInterface<FunctionParameter>|FunctionParameter[]
     */
    public $parameters;
    /**
     * @var FunctionReturn|null
     */
    public $return;
    /**
     * @var CollectionInterface<FunctionThrows>|FunctionThrows[]
     */
    public $throws;

    protected function init(): void
    {
        $this->parameters = new TypedCollection(
            new IndexedCollection([], static function (FunctionParameter $argument): string {
                return $argument->getName();
            }),
            new InstanceOfType(FunctionParameter::class)
        );
        $this->throws = new TypedCollection([], new InstanceOfType(FunctionThrows::class));
    }
}
