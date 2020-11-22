<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element\Link;

use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\UriInterface;
use spaceonfire\ApiDoc\Element\ElementInterface;
use spaceonfire\ApiDoc\Element\ValueObject\Fqsen;
use spaceonfire\ApiDoc\Element\ValueObject\FqsenLink;
use spaceonfire\ApiDoc\Element\ValueObject\LinkInterface;
use spaceonfire\ApiDoc\Generator\FileNameStrategyInterface;
use Symfony\Component\Filesystem\Filesystem;

final class FqsenLinkResolver implements LinkResolverInterface
{
    /**
     * @var FileNameStrategyInterface
     */
    private $fileNameStrategy;
    /**
     * @var AnchorGenerator
     */
    private $anchorGenerator;
    /**
     * @var Filesystem
     */
    private $filesystem;

    public function __construct(FileNameStrategyInterface $fileNameStrategy)
    {
        $this->fileNameStrategy = $fileNameStrategy;
        $this->anchorGenerator = new AnchorGenerator();
        $this->filesystem = new Filesystem();
    }

    /**
     * @inheritDoc
     */
    public function supports(LinkInterface $link): bool
    {
        return $link instanceof FqsenLink;
    }

    /**
     * @inheritDoc
     * @param FqsenLink $link
     */
    public function resolve(LinkInterface $link, $from = null): UriInterface
    {
        $from = $this->prepareFrom($from);

        $anchor = ($this->anchorGenerator)($link->getTarget());

        $fromFilename = $this->fileNameStrategy->generate($from);
        $targetFilename = $this->fileNameStrategy->generate($link->getTarget()->getClassName());

        if ($fromFilename === $targetFilename) {
            return new Uri('#' . $anchor);
        }

        $relative = $this->filesystem->makePathRelative(
            '/' . dirname($targetFilename) . '/',
            '/' . dirname($fromFilename) . '/'
        );

        return new Uri(sprintf('%s#%s', rtrim($relative, '/\\') . '/' . basename($targetFilename), $anchor));
    }

    /**
     * @param mixed $from
     * @return Fqsen
     */
    private function prepareFrom($from): Fqsen
    {
        if ($from instanceof ElementInterface) {
            return $from->name;
        }

        if ($from instanceof FqsenLink) {
            return $from->getTarget();
        }

        if ($from instanceof Fqsen) {
            return $from;
        }

        throw new \UnexpectedValueException('');
    }
}
