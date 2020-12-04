<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Render\Twig;

use Symfony\Component\VarDumper\Caster\ReflectionCaster;
use Symfony\Component\VarDumper\Cloner\ClonerInterface;
use Symfony\Component\VarDumper\Cloner\VarCloner;
use Symfony\Component\VarDumper\Dumper\AbstractDumper;
use Symfony\Component\VarDumper\Dumper\CliDumper;
use Symfony\Component\VarDumper\Dumper\DataDumperInterface;
use Symfony\Component\VarExporter\Exception\ExceptionInterface as VarExporterExceptionInterface;
use Symfony\Component\VarExporter\VarExporter;
use Twig\Environment;
use Twig\Extension\AbstractExtension;
use Twig\Template;
use Twig\TemplateWrapper;
use Twig\TwigFilter;
use Twig\TwigFunction;

final class DumpExtension extends AbstractExtension
{
    /**
     * @var DataDumperInterface&AbstractDumper
     */
    private $dumper;
    /**
     * @var ClonerInterface
     */
    private $cloner;

    public function __construct(?DataDumperInterface $dumper = null, ?ClonerInterface $cloner = null)
    {
        $this->dumper = $dumper ?? new CliDumper(
            null,
            null,
            CliDumper::DUMP_LIGHT_ARRAY | CliDumper::DUMP_COMMA_SEPARATOR | CliDumper::DUMP_TRAILING_COMMA
        );

        if (null === $cloner) {
            $cloner = new VarCloner();
            $cloner->addCasters(ReflectionCaster::UNSET_CLOSURE_FILE_INFO);
        }

        $this->cloner = $cloner;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('dump', [$this, 'dump'], [
                'is_safe' => ['all'],
                'needs_context' => true,
                'needs_environment' => true,
                'is_variadic' => true,
            ]),
        ];
    }

    public function getFilters(): array
    {
        return [
            new TwigFilter('export', [$this, 'export'], [
                'is_safe' => ['all'],
            ]),
        ];
    }

    /**
     * Implementation of `dump()` twig function using `symfony/var-dumper` compatible with `twig_var_dump()`
     * @param Environment $env
     * @param array<string,mixed> $context
     * @param mixed ...$vars
     * @return string|null
     * @throws \ErrorException
     * @see twig_var_dump()
     */
    public function dump(Environment $env, array $context, ...$vars): ?string
    {
        if (!$env->isDebug()) {
            return null;
        }

        $this->dumper->setCharset($env->getCharset());

        $output = [];

        if (!$vars) {
            foreach ($context as $value) {
                if (!$value instanceof Template && !$value instanceof TemplateWrapper) {
                    $output[] = $this->dumper->dump($this->cloner->cloneVar($value), true);
                }
            }
        } else {
            foreach ($vars as $var) {
                $output[] = $this->dumper->dump($this->cloner->cloneVar($var), true);
            }
        }

        return implode($output);
    }

    /**
     * @param mixed $var
     * @return string
     * @throws VarExporterExceptionInterface
     */
    public function export($var): string
    {
        return VarExporter::export($var);
    }
}
