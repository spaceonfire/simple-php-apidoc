# Class AbstractElement

Full name: `spaceonfire\ApiDoc\Element\AbstractElement`

This class implements: `spaceonfire\ApiDoc\Element\ElementInterface`

## Class members

| Name                                                                      | Type                                                     | Summary | Additional                                           |
| ------------------------------------------------------------------------- | -------------------------------------------------------- | ------- | ---------------------------------------------------- |
| _Properties_                                                              |                                                          |         |                                                      |
| [\$name](#spaceonfire_apidoc_element_abstractelement_$name)               | _spaceonfire\ApiDoc\Element\ValueObject\Fqsen_           |         | [📢](# "Visibility: public")                         |
| [\$summary](#spaceonfire_apidoc_element_abstractelement_$summary)         | _string_                                                 |         | [📢](# "Visibility: public")                         |
| [\$description](#spaceonfire_apidoc_element_abstractelement_$description) | _string_                                                 |         | [📢](# "Visibility: public")                         |
| [\$deprecated](#spaceonfire_apidoc_element_abstractelement_$deprecated)   | _bool&#124;string_                                       |         | [📢](# "Visibility: public")                         |
| [\$location](#spaceonfire_apidoc_element_abstractelement_$location)       | _spaceonfire\ApiDoc\Element\Location\Location&#124;null_ |         | [📢](# "Visibility: public")                         |
| [\$links](#spaceonfire_apidoc_element_abstractelement_$links)             | _spaceonfire\ApiDoc\Element\ValueObject\LinkInterface[]_ |         | [📢](# "Visibility: public")                         |
| [\$examples](#spaceonfire_apidoc_element_abstractelement_$examples)       | _spaceonfire\ApiDoc\Element\ValueObject\Example[]_       |         | [📢](# "Visibility: public")                         |
| _Methods_                                                                 |                                                          |         |                                                      |
| [\_\_construct](#spaceonfire_apidoc_element_abstractelement_construct)    |                                                          |         | [📌](# "Final element") [📢](# "Visibility: public") |

## Properties

<a name="spaceonfire_apidoc_element_abstractelement_$name"></a>

### \$name

-   **Visibility**: public
-   **Static**: No
-   **Type**: _spaceonfire\ApiDoc\Element\ValueObject\Fqsen_
-   **Default value**: none

```php
public spaceonfire\ApiDoc\Element\ValueObject\Fqsen $name
```

File location: `Element/AbstractElement.php:20`

<a name="spaceonfire_apidoc_element_abstractelement_$summary"></a>

### \$summary

-   **Visibility**: public
-   **Static**: No
-   **Type**: _string_
-   **Default value**: none

```php
public string $summary
```

File location: `Element/AbstractElement.php:24`

<a name="spaceonfire_apidoc_element_abstractelement_$description"></a>

### \$description

-   **Visibility**: public
-   **Static**: No
-   **Type**: _string_
-   **Default value**: none

```php
public string $description
```

File location: `Element/AbstractElement.php:28`

<a name="spaceonfire_apidoc_element_abstractelement_$deprecated"></a>

### \$deprecated

-   **Visibility**: public
-   **Static**: No
-   **Type**: _bool|string_
-   **Default value**: `false`

```php
public bool|string $deprecated = false
```

File location: `Element/AbstractElement.php:32`

<a name="spaceonfire_apidoc_element_abstractelement_$location"></a>

### \$location

-   **Visibility**: public
-   **Static**: No
-   **Type**: _spaceonfire\ApiDoc\Element\Location\Location|null_
-   **Default value**: none

```php
public spaceonfire\ApiDoc\Element\Location\Location|null $location
```

File location: `Element/AbstractElement.php:36`

<a name="spaceonfire_apidoc_element_abstractelement_$links"></a>

### \$links

-   **Visibility**: public
-   **Static**: No
-   **Type**: _spaceonfire\ApiDoc\Element\ValueObject\LinkInterface[]_
-   **Default value**: none

```php
public spaceonfire\ApiDoc\Element\ValueObject\LinkInterface[] $links
```

File location: `Element/AbstractElement.php:40`

<a name="spaceonfire_apidoc_element_abstractelement_$examples"></a>

### \$examples

-   **Visibility**: public
-   **Static**: No
-   **Type**: _spaceonfire\ApiDoc\Element\ValueObject\Example[]_
-   **Default value**: none

```php
public spaceonfire\ApiDoc\Element\ValueObject\Example[] $examples
```

File location: `Element/AbstractElement.php:44`

## Methods

<a name="spaceonfire_apidoc_element_abstractelement_construct"></a>

### \_\_construct()

-   **Final method**: Yes
-   **Visibility**: public

```php
final public function __construct()
```

File location: `Element/AbstractElement.php:46`

---

This file automatically generated by [SpaceOnFire ApiDoc](https://github.com/spaceonfire/apidoc)
