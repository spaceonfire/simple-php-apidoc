<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Generator;

use spaceonfire\ApiDoc\Project\Project;
use spaceonfire\ApiDoc\Render\RendererInterface;

final class ApiDocGenerator implements GeneratorInterface
{
    /**
     * @var RendererInterface
     */
    private $renderer;
    /**
     * @var FileNameStrategyInterface
     */
    private $fileNameStrategy;

    /**
     * ApiDocGenerator constructor.
     * @param RendererInterface $renderer
     * @param FileNameStrategyInterface $fileNameStrategy
     */
    public function __construct(RendererInterface $renderer, FileNameStrategyInterface $fileNameStrategy)
    {
        $this->renderer = $renderer;
        $this->fileNameStrategy = $fileNameStrategy;
    }

    /**
     * @inheritDoc
     */
    public function generate(Project $project): iterable
    {
        foreach ($project->getClassLikeElements() as $element) {
            if ($this->renderer->supports($element)) {
                yield new File(
                    $this->fileNameStrategy->generate($element->name),
                    $this->renderer->render($element, [
                        'current_fqsen' => $element->name,
                    ])
                );
            }
        }

        if (count($functions = $project->getFunctions()) > 0) {
            yield new File(
                $this->fileNameStrategy->generate($functions->getFqsen()),
                $this->renderer->render($functions, [
                    'current_fqsen' => $functions->getFqsen(),
                ])
            );
        }

        if (count($constants = $project->getConstants()) > 0) {
            yield new File(
                $this->fileNameStrategy->generate($constants->getFqsen()),
                $this->renderer->render($constants, [
                    'current_fqsen' => $constants->getFqsen(),
                ])
            );
        }

        $toc = $project->getTableOfContents();
        yield new File(
            $this->fileNameStrategy->generate($toc->getFqsen()),
            $this->renderer->render($toc, [
                'current_fqsen' => $toc->getFqsen(),
            ])
        );
    }
}
