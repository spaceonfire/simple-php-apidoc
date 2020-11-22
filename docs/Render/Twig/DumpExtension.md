# Class DumpExtension

Full name: `spaceonfire\ApiDoc\Render\Twig\DumpExtension`

Parent class name: `Twig\Extension\AbstractExtension`

This class implements: `Twig\Extension\ExtensionInterface`

## Class members

| Name                                                                       | Type               | Summary                                                                                               | Additional                   |
| -------------------------------------------------------------------------- | ------------------ | ----------------------------------------------------------------------------------------------------- | ---------------------------- |
| _Methods_                                                                  |                    |                                                                                                       |                              |
| [\_\_construct](#spaceonfire_apidoc_render_twig_dumpextension_construct)   |                    |                                                                                                       | [📢](# "Visibility: public") |
| [getFunctions](#spaceonfire_apidoc_render_twig_dumpextension_getfunctions) | _array_            |                                                                                                       | [📢](# "Visibility: public") |
| [getFilters](#spaceonfire_apidoc_render_twig_dumpextension_getfilters)     | _array_            |                                                                                                       | [📢](# "Visibility: public") |
| [dump](#spaceonfire_apidoc_render_twig_dumpextension_dump)                 | _string&#124;null_ | Implementation of `dump()` twig function using `symfony/var-dumper` compatible with `twig_var_dump()` | [📢](# "Visibility: public") |
| [export](#spaceonfire_apidoc_render_twig_dumpextension_export)             | _string_           |                                                                                                       | [📢](# "Visibility: public") |
| [getTokenParsers](#twig_extension_abstractextension_gettokenparsers)       |                    |                                                                                                       | [📢](# "Visibility: public") |
| [getNodeVisitors](#twig_extension_abstractextension_getnodevisitors)       |                    |                                                                                                       | [📢](# "Visibility: public") |
| [getTests](#twig_extension_abstractextension_gettests)                     |                    |                                                                                                       | [📢](# "Visibility: public") |
| [getOperators](#twig_extension_abstractextension_getoperators)             |                    |                                                                                                       | [📢](# "Visibility: public") |

## Methods

<a name="spaceonfire_apidoc_render_twig_dumpextension_construct"></a>

### \_\_construct()

-   **Visibility**: public

| Param     | Type                                                               | Reference | Description |
| --------- | ------------------------------------------------------------------ | --------- | ----------- |
| `$dumper` | _Symfony\Component\VarDumper\Dumper\DataDumperInterface&#124;null_ | No        |             |
| `$cloner` | _Symfony\Component\VarDumper\Cloner\ClonerInterface&#124;null_     | No        |             |

```php
public function __construct(Symfony\Component\VarDumper\Dumper\DataDumperInterface|null $dumper = null, Symfony\Component\VarDumper\Cloner\ClonerInterface|null $cloner = null)
```

File location: `Render/Twig/DumpExtension.php:33`

<a name="spaceonfire_apidoc_render_twig_dumpextension_getfunctions"></a>

### getFunctions()

-   **Visibility**: public

| Param      | Type    | Reference | Description |
| ---------- | ------- | --------- | ----------- |
| **Return** | _array_ |           |             |

```php
public function getFunctions(): array
```

File location: `Render/Twig/DumpExtension.php:49`

<a name="spaceonfire_apidoc_render_twig_dumpextension_getfilters"></a>

### getFilters()

-   **Visibility**: public

| Param      | Type    | Reference | Description |
| ---------- | ------- | --------- | ----------- |
| **Return** | _array_ |           |             |

```php
public function getFilters(): array
```

File location: `Render/Twig/DumpExtension.php:61`

<a name="spaceonfire_apidoc_render_twig_dumpextension_dump"></a>

### dump()

Implementation of `dump()` twig function using `symfony/var-dumper` compatible with `twig_var_dump()`

-   **Visibility**: public

| Param      | Type                             | Reference | Description |
| ---------- | -------------------------------- | --------- | ----------- |
| `$env`     | _Twig\Environment_               | No        |             |
| `$context` | _array<string,mixed>&#124;array_ | No        |             |
| `...$vars` | _mixed_                          | No        |             |
| **Return** | _string&#124;null_               |           |             |
| **Throws** | _ErrorException_                 |           |             |

```php
public function dump(Twig\Environment $env, array<string,mixed>|array $context, mixed ...$vars): string|null
```

**Links**:

-   [\spaceonfire\ApiDoc\Render\Twig\twig_var_dump](./twig_var_dump.md#spaceonfire_apidoc_render_twig_twig_var_dump)

File location: `Render/Twig/DumpExtension.php:79`

<a name="spaceonfire_apidoc_render_twig_dumpextension_export"></a>

### export()

-   **Visibility**: public

| Param      | Type                                                         | Reference | Description |
| ---------- | ------------------------------------------------------------ | --------- | ----------- |
| `$var`     | _mixed_                                                      | No        |             |
| **Return** | _string_                                                     |           |             |
| **Throws** | _Symfony\Component\VarExporter\Exception\ExceptionInterface_ |           |             |

```php
public function export(mixed $var): string
```

File location: `Render/Twig/DumpExtension.php:109`

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

<a name="twig_extension_abstractextension_getoperators"></a>

### getOperators()

-   **Visibility**: public

```php
public function getOperators()
```

File location: `/var/www/html/vendor/composer/../twig/twig/src/Extension/AbstractExtension.php:41`

---

This file automatically generated by [SpaceOnFire ApiDoc](https://github.com/spaceonfire/apidoc)
