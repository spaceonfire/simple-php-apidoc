<?php

declare(strict_types=1);

namespace spaceonfire\SimplePhpApiDoc\Renderers\Markdown;

class MarkdownHelper
{
    public static function header(string $text, int $level = 1): string
    {
        return str_repeat('#', $level) . ' ' . $text;
    }

    public static function link(string $text, string $url): string
    {
        return "[$text]($url)";
    }

    public static function ul(array $items): array
    {
        $result = [];
        foreach ($items as $item) {
            if (is_array($item)) {
                foreach (static::indent($item) as $nestedItem) {
                    $result[] = $nestedItem;
                }
                continue;
            }
            $result[] = '- ' . $item;
        }
        return $result;
    }

    public static function ol(array $items): array
    {
        $result = [];
        foreach ($items as $item) {
            if (is_array($item)) {
                foreach (static::indent($item) as $nestedItem) {
                    $result[] = $nestedItem;
                }
                continue;
            }
            $result[] = '1. ' . $item;
        }
        return $result;
    }

    public static function indent($items, int $times = 1)
    {
        if ($notArray = !is_array($items)) {
            $items = [$items];
        }

        $result = array_map(static function ($item) {
            $result = [];
            foreach (explode(PHP_EOL, $item) as $i => $line) {
                $result[] = str_repeat(' ', $i > 0 ? 6 : 4) . $item;
            }
            return implode(PHP_EOL, $result);
        }, $items);

        if ($notArray) {
            $result = reset($result);
        }

        $times--;

        if ($times > 0) {
            return static::indent($result, $times);
        }

        return $result;
    }

    public static function code(string $text): string
    {
        return '`' . $text . '`';
    }

    public static function pre(string $text, string $lang = null): string
    {
        return implode(PHP_EOL, [
            '```' . ($lang ?? ''),
            $text,
            '```',
        ]);
    }
}
