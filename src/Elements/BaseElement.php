<?php

declare(strict_types=1);

namespace spaceonfire\SimplePhpApiDoc\Elements;

use phpDocumentor\Reflection\Element;
use spaceonfire\SimplePhpApiDoc\Context;

abstract class BaseElement
{
    /**
     * @var Element
     */
    protected $element;
    /**
     * @var Context
     */
    protected $context;

    public function __construct($element, Context $context)
    {
        $this
            ->setElement($element)
            ->setContext($context);
    }

    /**
     * Getter for `context` property
     * @return Context
     */
    public function getContext(): Context
    {
        return $this->context;
    }

    /**
     * Setter for `context` property
     * @param Context $context
     * @return static
     */
    public function setContext(Context $context)
    {
        $this->context = $context;
        return $this;
    }

    /**
     * Getter for `element` property
     * @return Element
     */
    public function getElement()
    {
        return $this->element;
    }

    /**
     * Setter for `element` property
     * @param Element $element
     * @return static
     */
    public function setElement($element)
    {
        $this->element = $element;
        return $this;
    }

    /**
     * Proxy method call to element instance
     * @param string $method Method name to proxy
     * @param array $arguments Arguments to proxy with
     * @return mixed
     */
    protected function proxy(string $method, array $arguments)
    {
        return call_user_func_array([$this->element, $method], $arguments);
    }
}
