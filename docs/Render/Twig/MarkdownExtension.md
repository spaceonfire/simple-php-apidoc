# Class MarkdownExtension

Full name: `spaceonfire\ApiDoc\Render\Twig\MarkdownExtension`

Parent class name: `Twig\Extension\AbstractExtension`

This class implements: `Twig\Extension\ExtensionInterface`

## Class members

| Name                                                                       | Type     | Summary | Additional                   |
| -------------------------------------------------------------------------- | -------- | ------- | ---------------------------- |
| _Methods_                                                                  |          |         |                              |
| [getFilters](#spaceonfire_apidoc_render_twig_markdownextension_getfilters) | _array_  |         | [📢](# "Visibility: public") |
| [italic](#spaceonfire_apidoc_render_twig_markdownextension_italic)         | _string_ |         | [📢](# "Visibility: public") |
| [bold](#spaceonfire_apidoc_render_twig_markdownextension_bold)             | _string_ |         | [📢](# "Visibility: public") |
| [heading](#spaceonfire_apidoc_render_twig_markdownextension_heading)       | _string_ |         | [📢](# "Visibility: public") |
| [link](#spaceonfire_apidoc_render_twig_markdownextension_link)             | _string_ |         | [📢](# "Visibility: public") |
| [code](#spaceonfire_apidoc_render_twig_markdownextension_code)             | _string_ |         | [📢](# "Visibility: public") |
| [oneLine](#spaceonfire_apidoc_render_twig_markdownextension_oneline)       | _string_ |         | [📢](# "Visibility: public") |
| [pre](#spaceonfire_apidoc_render_twig_markdownextension_pre)               | _string_ |         | [📢](# "Visibility: public") |
| [tableRow](#spaceonfire_apidoc_render_twig_markdownextension_tablerow)     | _string_ |         | [📢](# "Visibility: public") |
| [indent](#spaceonfire_apidoc_render_twig_markdownextension_indent)         | _string_ |         | [📢](# "Visibility: public") |
| [getTokenParsers](#twig_extension_abstractextension_gettokenparsers)       |          |         | [📢](# "Visibility: public") |
| [getNodeVisitors](#twig_extension_abstractextension_getnodevisitors)       |          |         | [📢](# "Visibility: public") |
| [getTests](#twig_extension_abstractextension_gettests)                     |          |         | [📢](# "Visibility: public") |
| [getFunctions](#twig_extension_abstractextension_getfunctions)             |          |         | [📢](# "Visibility: public") |
| [getOperators](#twig_extension_abstractextension_getoperators)             |          |         | [📢](# "Visibility: public") |

## Methods

<a name="spaceonfire_apidoc_render_twig_markdownextension_getfilters"></a>

### getFilters()

-   **Visibility**: public

| Param      | Type    | Reference | Description |
| ---------- | ------- | --------- | ----------- |
| **Return** | _array_ |           |             |

```php
public function getFilters(): array
```

File location: `Render/Twig/MarkdownExtension.php:12`

<a name="spaceonfire_apidoc_render_twig_markdownextension_italic"></a>

### italic()

-   **Visibility**: public

| Param      | Type     | Reference | Description |
| ---------- | -------- | --------- | ----------- |
| `$text`    | _string_ | No        |             |
| **Return** | _string_ |           |             |

```php
public function italic(string $text): string
```

File location: `Render/Twig/MarkdownExtension.php:27`

<a name="spaceonfire_apidoc_render_twig_markdownextension_bold"></a>

### bold()

-   **Visibility**: public

| Param      | Type     | Reference | Description |
| ---------- | -------- | --------- | ----------- |
| `$text`    | _string_ | No        |             |
| **Return** | _string_ |           |             |

```php
public function bold(string $text): string
```

File location: `Render/Twig/MarkdownExtension.php:32`

<a name="spaceonfire_apidoc_render_twig_markdownextension_heading"></a>

### heading()

-   **Visibility**: public

| Param      | Type     | Reference | Description |
| ---------- | -------- | --------- | ----------- |
| `$text`    | _string_ | No        |             |
| `$level`   | _int_    | No        |             |
| **Return** | _string_ |           |             |

```php
public function heading(string $text, int $level = 1): string
```

File location: `Render/Twig/MarkdownExtension.php:37`

<a name="spaceonfire_apidoc_render_twig_markdownextension_link"></a>

### link()

-   **Visibility**: public

| Param      | Type     | Reference | Description |
| ---------- | -------- | --------- | ----------- |
| `$text`    | _string_ | No        |             |
| `$url`     | _string_ | No        |             |
| `$title`   | _string_ | No        |             |
| **Return** | _string_ |           |             |

```php
public function link(string $text, string $url, string $title = ''): string
```

File location: `Render/Twig/MarkdownExtension.php:42`

<a name="spaceonfire_apidoc_render_twig_markdownextension_code"></a>

### code()

-   **Visibility**: public

| Param      | Type     | Reference | Description |
| ---------- | -------- | --------- | ----------- |
| `$text`    | _string_ | No        |             |
| **Return** | _string_ |           |             |

```php
public function code(string $text): string
```

File location: `Render/Twig/MarkdownExtension.php:52`

<a name="spaceonfire_apidoc_render_twig_markdownextension_oneline"></a>

### oneLine()

-   **Visibility**: public

| Param      | Type     | Reference | Description |
| ---------- | -------- | --------- | ----------- |
| `$text`    | _string_ | No        |             |
| **Return** | _string_ |           |             |

```php
public function oneLine(string $text): string
```

File location: `Render/Twig/MarkdownExtension.php:57`

<a name="spaceonfire_apidoc_render_twig_markdownextension_pre"></a>

### pre()

-   **Visibility**: public

| Param      | Type     | Reference | Description |
| ---------- | -------- | --------- | ----------- |
| `$text`    | _string_ | No        |             |
| `$lang`    | _string_ | No        |             |
| **Return** | _string_ |           |             |

```php
public function pre(string $text, string $lang = ''): string
```

File location: `Render/Twig/MarkdownExtension.php:62`

<a name="spaceonfire_apidoc_render_twig_markdownextension_tablerow"></a>

### tableRow()

-   **Visibility**: public

| Param      | Type                                  | Reference | Description |
| ---------- | ------------------------------------- | --------- | ----------- |
| `$cells`   | _string[]&#124;mixed[]&#124;iterable_ | No        |             |
| **Return** | _string_                              |           |             |

```php
public function tableRow(string[]|mixed[]|iterable $cells): string
```

File location: `Render/Twig/MarkdownExtension.php:75`

<a name="spaceonfire_apidoc_render_twig_markdownextension_indent"></a>

### indent()

-   **Visibility**: public

| Param      | Type     | Reference | Description |
| ---------- | -------- | --------- | ----------- |
| `$text`    | _string_ | No        |             |
| `$size`    | _int_    | No        |             |
| **Return** | _string_ |           |             |

```php
public function indent(string $text, int $size = 4): string
```

File location: `Render/Twig/MarkdownExtension.php:93`

<a name="twig_extension_abstractextension_gettokenparsers"></a>

### getTokenParsers()

-   **Visibility**: public

```php
public function getTokenParsers()
```

File location: `/var/www/html/vendor/composer/../twig/twig/src/Extension/AbstractExtension.php:16`

<a name="twig_extension_abstractextension_getnodevisitors"></a>

### getNodeVisitors()

-   **Visibility**: public

```php
public function getNodeVisitors()
```

File location: `/var/www/html/vendor/composer/../twig/twig/src/Extension/AbstractExtension.php:21`

<a name="twig_extension_abstractextension_gettests"></a>

### getTests()

-   **Visibility**: public

```php
public function getTests()
```

File location: `/var/www/html/vendor/composer/../twig/twig/src/Extension/AbstractExtension.php:31`

<a name="twig_extension_abstractextension_getfunctions"></a>

### getFunctions()

-   **Visibility**: public

```php
public function getFunctions()
```

File location: `/var/www/html/vendor/composer/../twig/twig/src/Extension/AbstractExtension.php:36`

<a name="twig_extension_abstractextension_getoperators"></a>

### getOperators()

-   **Visibility**: public

```php
public function getOperators()
```

File location: `/var/www/html/vendor/composer/../twig/twig/src/Extension/AbstractExtension.php:41`

---

This file automatically generated by [SpaceOnFire ApiDoc](https://github.com/spaceonfire/apidoc)
