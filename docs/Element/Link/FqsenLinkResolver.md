# Class FqsenLinkResolver

Full name: `spaceonfire\ApiDoc\Element\Link\FqsenLinkResolver`

This class implements: `spaceonfire\ApiDoc\Element\Link\LinkResolverInterface`

## Class members

| Name                                                                          | Type                            | Summary | Additional                   |
| ----------------------------------------------------------------------------- | ------------------------------- | ------- | ---------------------------- |
| _Methods_                                                                     |                                 |         |                              |
| [\_\_construct](#spaceonfire_apidoc_element_link_fqsenlinkresolver_construct) |                                 |         | [📢](# "Visibility: public") |
| [supports](#spaceonfire_apidoc_element_link_fqsenlinkresolver_supports)       | _bool_                          |         | [📢](# "Visibility: public") |
| [resolve](#spaceonfire_apidoc_element_link_fqsenlinkresolver_resolve)         | _Psr\Http\Message\UriInterface_ |         | [📢](# "Visibility: public") |

## Methods

<a name="spaceonfire_apidoc_element_link_fqsenlinkresolver_construct"></a>

### \_\_construct()

-   **Visibility**: public

| Param               | Type                                                     | Reference | Description |
| ------------------- | -------------------------------------------------------- | --------- | ----------- |
| `$fileNameStrategy` | _spaceonfire\ApiDoc\Generator\FileNameStrategyInterface_ | No        |             |

```php
public function __construct(spaceonfire\ApiDoc\Generator\FileNameStrategyInterface $fileNameStrategy)
```

File location: `Element/Link/FqsenLinkResolver.php:31`

<a name="spaceonfire_apidoc_element_link_fqsenlinkresolver_supports"></a>

### supports()

-   **Visibility**: public

| Param      | Type                                                   | Reference | Description |
| ---------- | ------------------------------------------------------ | --------- | ----------- |
| `$link`    | _spaceonfire\ApiDoc\Element\ValueObject\LinkInterface_ | No        |             |
| **Return** | _bool_                                                 |           |             |

```php
public function supports(spaceonfire\ApiDoc\Element\ValueObject\LinkInterface $link): bool
```

File location: `Element/Link/FqsenLinkResolver.php:41`

<a name="spaceonfire_apidoc_element_link_fqsenlinkresolver_resolve"></a>

### resolve()

-   **Visibility**: public

| Param      | Type                                                                                                         | Reference | Description |
| ---------- | ------------------------------------------------------------------------------------------------------------ | --------- | ----------- |
| `$link`    | _spaceonfire\ApiDoc\Element\ValueObject\FqsenLink&#124;spaceonfire\ApiDoc\Element\ValueObject\LinkInterface_ | No        |             |
| `$from`    | _mixed&#124;null_                                                                                            | No        |             |
| **Return** | _Psr\Http\Message\UriInterface_                                                                              |           |             |

```php
public function resolve(spaceonfire\ApiDoc\Element\ValueObject\FqsenLink|spaceonfire\ApiDoc\Element\ValueObject\LinkInterface $link, mixed|null $from = null): Psr\Http\Message\UriInterface
```

File location: `Element/Link/FqsenLinkResolver.php:50`

---

This file automatically generated by [SpaceOnFire ApiDoc](https://github.com/spaceonfire/apidoc)