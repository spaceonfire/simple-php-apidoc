# Class ExampleRendererExtension

Full name: `spaceonfire\ApiDoc\Render\Twig\ExampleRendererExtension`

Parent class name: `Twig\Extension\AbstractExtension`

This class implements: `Twig\Extension\ExtensionInterface`

## Class members

| Name                                                                                              | Type                                                           | Summary | Additional                   |
| ------------------------------------------------------------------------------------------------- | -------------------------------------------------------------- | ------- | ---------------------------- |
| _Methods_                                                                                         |                                                                |         |                              |
| [\_\_construct](#spaceonfire_apidoc_render_twig_examplerendererextension_construct)               |                                                                |         | [📢](# "Visibility: public") |
| [getFunctions](#spaceonfire_apidoc_render_twig_examplerendererextension_getfunctions)             | _array_                                                        |         | [📢](# "Visibility: public") |
| [exampleCodeSnippet](#spaceonfire_apidoc_render_twig_examplerendererextension_examplecodesnippet) | _spaceonfire\ApiDoc\Element\ValueObject\CodeSnippet&#124;null_ |         | [📢](# "Visibility: public") |
| [getTokenParsers](#twig_extension_abstractextension_gettokenparsers)                              |                                                                |         | [📢](# "Visibility: public") |
| [getNodeVisitors](#twig_extension_abstractextension_getnodevisitors)                              |                                                                |         | [📢](# "Visibility: public") |
| [getFilters](#twig_extension_abstractextension_getfilters)                                        |                                                                |         | [📢](# "Visibility: public") |
| [getTests](#twig_extension_abstractextension_gettests)                                            |                                                                |         | [📢](# "Visibility: public") |
| [getOperators](#twig_extension_abstractextension_getoperators)                                    |                                                                |         | [📢](# "Visibility: public") |

## Methods

<a name="spaceonfire_apidoc_render_twig_examplerendererextension_construct"></a>

### \_\_construct()

-   **Visibility**: public

| Param                         | Type                                                            | Reference | Description |
| ----------------------------- | --------------------------------------------------------------- | --------- | ----------- |
| `$exampleCodeSnippetResolver` | _spaceonfire\ApiDoc\Element\Example\ExampleCodeSnippetResolver_ | No        |             |

```php
public function __construct(spaceonfire\ApiDoc\Element\Example\ExampleCodeSnippetResolver $exampleCodeSnippetResolver)
```

File location: `Render/Twig/ExampleRendererExtension.php:20`

<a name="spaceonfire_apidoc_render_twig_examplerendererextension_getfunctions"></a>

### getFunctions()

-   **Visibility**: public

| Param      | Type    | Reference | Description |
| ---------- | ------- | --------- | ----------- |
| **Return** | _array_ |           |             |

```php
public function getFunctions(): array
```

File location: `Render/Twig/ExampleRendererExtension.php:25`

<a name="spaceonfire_apidoc_render_twig_examplerendererextension_examplecodesnippet"></a>

### exampleCodeSnippet()

-   **Visibility**: public

| Param      | Type                                                           | Reference | Description |
| ---------- | -------------------------------------------------------------- | --------- | ----------- |
| `$example` | _spaceonfire\ApiDoc\Element\ValueObject\Example_               | No        |             |
| **Return** | _spaceonfire\ApiDoc\Element\ValueObject\CodeSnippet&#124;null_ |           |             |

```php
public function exampleCodeSnippet(spaceonfire\ApiDoc\Element\ValueObject\Example $example): spaceonfire\ApiDoc\Element\ValueObject\CodeSnippet|null
```

File location: `Render/Twig/ExampleRendererExtension.php:32`

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

<a name="twig_extension_abstractextension_getfilters"></a>

### getFilters()

-   **Visibility**: public

```php
public function getFilters()
```

File location: `/var/www/html/vendor/composer/../twig/twig/src/Extension/AbstractExtension.php:26`

<a name="twig_extension_abstractextension_gettests"></a>

### getTests()

-   **Visibility**: public

```php
public function getTests()
```

File location: `/var/www/html/vendor/composer/../twig/twig/src/Extension/AbstractExtension.php:31`

<a name="twig_extension_abstractextension_getoperators"></a>

### getOperators()

-   **Visibility**: public

```php
public function getOperators()
```

File location: `/var/www/html/vendor/composer/../twig/twig/src/Extension/AbstractExtension.php:41`

---

This file automatically generated by [SpaceOnFire ApiDoc](https://github.com/spaceonfire/apidoc)
