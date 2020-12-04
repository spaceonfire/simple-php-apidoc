<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Render\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

final class MarkdownExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('md_italic', [$this, 'italic']),
            new TwigFilter('md_bold', [$this, 'bold']),
            new TwigFilter('md_heading', [$this, 'heading']),
            new TwigFilter('md_link', [$this, 'link']),
            new TwigFilter('md_code', [$this, 'code']),
            new TwigFilter('md_oneline', [$this, 'oneLine']),
            new TwigFilter('md_pre', [$this, 'pre']),
            new TwigFilter('md_table_row', [$this, 'tableRow']),
            new TwigFilter('md_indent', [$this, 'indent']),
        ];
    }

    public function italic(string $text): string
    {
        return sprintf('_%s_', $text);
    }

    public function bold(string $text): string
    {
        return sprintf('**%s**', $text);
    }

    public function heading(string $text, int $level = 1): string
    {
        return str_repeat('#', $level) . ' ' . $text;
    }

    public function link(string $text, string $url, string $title = ''): string
    {
        return sprintf(
            '[%s](%s%s)',
            $text,
            $url,
            '' === $title ? '' : ' "' . $title . '"'
        );
    }

    public function code(string $text): string
    {
        return sprintf('`%s`', $text);
    }

    public function oneLine(string $text): string
    {
        return implode(' ', array_map('trim', explode(PHP_EOL, $text)));
    }

    public function pre(string $text, string $lang = ''): string
    {
        return implode(PHP_EOL, [
            '```' . $lang,
            $text,
            '```',
        ]);
    }

    /**
     * @param string[]|mixed[] $cells
     * @return string
     */
    public function tableRow(iterable $cells): string
    {
        $output = [''];

        $replacements = [
            '|' => '&#124;',
            PHP_EOL => '<br>',
        ];

        foreach ($cells as $cell) {
            $output[] = trim(str_replace(array_keys($replacements), array_values($replacements), (string)$cell));
        }

        $output[] = '';

        return trim(implode(' | ', $output));
    }

    public function indent(string $text, int $size = 4): string
    {
        return str_repeat(' ', $size) . $text;
    }
}
