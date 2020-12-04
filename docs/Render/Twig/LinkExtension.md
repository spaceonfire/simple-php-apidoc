# Class LinkExtension

Full name: `spaceonfire\ApiDoc\Render\Twig\LinkExtension`

Parent class name: `Twig\Extension\AbstractExtension`

This class implements: `Twig\Extension\ExtensionInterface`

## Class members

| Name                                                                       | Type     | Summary | Additional                   |
| -------------------------------------------------------------------------- | -------- | ------- | ---------------------------- |
| _Methods_                                                                  |          |         |                              |
| [\_\_construct](#spaceonfire_apidoc_render_twig_linkextension_construct)   |          |         | [📢](# "Visibility: public") |
| [getFunctions](#spaceonfire_apidoc_render_twig_linkextension_getfunctions) | _array_  |         | [📢](# "Visibility: public") |
| [anchor](#spaceonfire_apidoc_render_twig_linkextension_anchor)             | _string_ |         | [📢](# "Visibility: public") |
| [resolveLink](#spaceonfire_apidoc_render_twig_linkextension_resolvelink)   | _string_ |         | [📢](# "Visibility: public") |
| [getTokenParsers](#twig_extension_abstractextension_gettokenparsers)       |          |         | [📢](# "Visibility: public") |
| [getNodeVisitors](#twig_extension_abstractextension_getnodevisitors)       |          |         | [📢](# "Visibility: public") |
| [getFilters](#twig_extension_abstractextension_getfilters)                 |          |         | [📢](# "Visibility: public") |
| [getTests](#twig_extension_abstractextension_gettests)                     |          |         | [📢](# "Visibility: public") |
| [getOperators](#twig_extension_abstractextension_getoperators)             |          |         | [📢](# "Visibility: public") |

## Methods

<a name="spaceonfire_apidoc_render_twig_linkextension_construct"></a>

### \_\_construct()

-   **Visibility**: public

| Param           | Type                                                    | Reference | Description |
| --------------- | ------------------------------------------------------- | --------- | ----------- |
| `$linkResolver` | _spaceonfire\ApiDoc\Element\Link\LinkResolverInterface_ | No        |             |

```php
public function __construct(spaceonfire\ApiDoc\Element\Link\LinkResolverInterface $linkResolver)
```

File location: `Render/Twig/LinkExtension.php:25`

<a name="spaceonfire_apidoc_render_twig_linkextension_getfunctions"></a>

### getFunctions()

-   **Visibility**: public

| Param      | Type    | Reference | Description |
| ---------- | ------- | --------- | ----------- |
| **Return** | _array_ |           |             |

```php
public function getFunctions(): array
```

File location: `Render/Twig/LinkExtension.php:31`

<a name="spaceonfire_apidoc_render_twig_linkextension_anchor"></a>

### anchor()

-   **Visibility**: public

| Param      | Type                                           | Reference | Description |
| ---------- | ---------------------------------------------- | --------- | ----------- |
| `$fqsen`   | _spaceonfire\ApiDoc\Element\ValueObject\Fqsen_ | No        |             |
| **Return** | _string_                                       |           |             |

```php
public function anchor(spaceonfire\ApiDoc\Element\ValueObject\Fqsen $fqsen): string
```

File location: `Render/Twig/LinkExtension.php:39`

<a name="spaceonfire_apidoc_render_twig_linkextension_resolvelink"></a>

### resolveLink()

-   **Visibility**: public

| Param      | Type                                                   | Reference | Description |
| ---------- | ------------------------------------------------------ | --------- | ----------- |
| `$link`    | _spaceonfire\ApiDoc\Element\ValueObject\LinkInterface_ | No        |             |
| `$from`    | _mixed&#124;null_                                      | No        |             |
| **Return** | _string_                                               |           |             |

```php
public function resolveLink(spaceonfire\ApiDoc\Element\ValueObject\LinkInterface $link, mixed|null $from = null): string
```

File location: `Render/Twig/LinkExtension.php:49`

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
