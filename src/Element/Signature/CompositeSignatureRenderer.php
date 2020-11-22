<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element\Signature;

use spaceonfire\ApiDoc\Element\ElementInterface;
use spaceonfire\ApiDoc\Element\ValueObject\CodeSnippet;

final class CompositeSignatureRenderer implements SignatureRendererInterface
{
    /**
     * @var SignatureRendererInterface[]
     */
    private $renderers;

    public function __construct(SignatureRendererInterface ...$renderers)
    {
        $this->renderers = $renderers;
    }

    /**
     * @inheritDoc
     */
    public function supports(ElementInterface $element): bool
    {
        foreach ($this->renderers as $renderer) {
            if ($renderer->supports($element)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @inheritDoc
     */
    public function render(ElementInterface $element): CodeSnippet
    {
        foreach ($this->renderers as $renderer) {
            if ($renderer->supports($element)) {
                return $renderer->render($element);
            }
        }

        throw new \UnexpectedValueException(sprintf('Cannot render element "%s"', get_class($element)));
    }
}
