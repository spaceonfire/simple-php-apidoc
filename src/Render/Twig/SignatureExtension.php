<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Render\Twig;

use spaceonfire\ApiDoc\Element\ElementInterface;
use spaceonfire\ApiDoc\Element\Signature\SignatureRendererInterface;
use spaceonfire\ApiDoc\Element\ValueObject\CodeSnippet;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

final class SignatureExtension extends AbstractExtension
{
    /**
     * @var SignatureRendererInterface
     */
    private $signatureRenderer;

    public function __construct(SignatureRendererInterface $signatureRenderer)
    {
        $this->signatureRenderer = $signatureRenderer;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('signature', [$this, 'signature']),
        ];
    }

    public function signature(ElementInterface $element): ?CodeSnippet
    {
        if (!$this->signatureRenderer->supports($element)) {
            return null;
        }

        return $this->signatureRenderer->render($element);
    }
}
