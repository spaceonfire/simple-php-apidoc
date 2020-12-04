# Class PropertyElement

Full name: `spaceonfire\ApiDoc\Element\PropertyElement`

Parent class name: `spaceonfire\ApiDoc\Element\AbstractElement`

This class implements: `spaceonfire\ApiDoc\Element\ElementInterface`

## Class members

| Name                                                                        | Type                                                     | Summary | Additional                                           |
| --------------------------------------------------------------------------- | -------------------------------------------------------- | ------- | ---------------------------------------------------- |
| _Properties_                                                                |                                                          |         |                                                      |
| [\$name](#spaceonfire_apidoc_element_abstractelement_$name)                 | _spaceonfire\ApiDoc\Element\ValueObject\Fqsen_           |         | [📢](# "Visibility: public")                         |
| [\$summary](#spaceonfire_apidoc_element_abstractelement_$summary)           | _string_                                                 |         | [📢](# "Visibility: public")                         |
| [\$description](#spaceonfire_apidoc_element_abstractelement_$description)   | _string_                                                 |         | [📢](# "Visibility: public")                         |
| [\$deprecated](#spaceonfire_apidoc_element_abstractelement_$deprecated)     | _bool&#124;string_                                       |         | [📢](# "Visibility: public")                         |
| [\$location](#spaceonfire_apidoc_element_abstractelement_$location)         | _spaceonfire\ApiDoc\Element\Location\Location&#124;null_ |         | [📢](# "Visibility: public")                         |
| [\$links](#spaceonfire_apidoc_element_abstractelement_$links)               | _spaceonfire\ApiDoc\Element\ValueObject\LinkInterface[]_ |         | [📢](# "Visibility: public")                         |
| [\$examples](#spaceonfire_apidoc_element_abstractelement_$examples)         | _spaceonfire\ApiDoc\Element\ValueObject\Example[]_       |         | [📢](# "Visibility: public")                         |
| [\$static](#spaceonfire_apidoc_element_propertyelement_$static)             | _bool_                                                   |         | [📢](# "Visibility: public")                         |
| [\$visibility](#spaceonfire_apidoc_element_propertyelement_$visibility)     | _spaceonfire\ApiDoc\Element\ValueObject\Visibility_      |         | [📢](# "Visibility: public")                         |
| [\$type](#spaceonfire_apidoc_element_propertyelement_$type)                 | _spaceonfire\Type\Type&#124;null_                        |         | [📢](# "Visibility: public")                         |
| [\$defaultValue](#spaceonfire_apidoc_element_propertyelement_$defaultvalue) | _spaceonfire\ApiDoc\Element\ValueObject\Value&#124;null_ |         | [📢](# "Visibility: public")                         |
| _Methods_                                                                   |                                                          |         |                                                      |
| [\_\_construct](#spaceonfire_apidoc_element_abstractelement_construct)      |                                                          |         | [📌](# "Final element") [📢](# "Visibility: public") |

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

File location: `/var/www/html/vendor/composer/../../src/Element/AbstractElement.php:20`

<a name="spaceonfire_apidoc_element_abstractelement_$summary"></a>

### \$summary

-   **Visibility**: public
-   **Static**: No
-   **Type**: _string_
-   **Default value**: none

```php
public string $summary
```

File location: `/var/www/html/vendor/composer/../../src/Element/AbstractElement.php:24`

<a name="spaceonfire_apidoc_element_abstractelement_$description"></a>

### \$description

-   **Visibility**: public
-   **Static**: No
-   **Type**: _string_
-   **Default value**: none

```php
public string $description
```

File location: `/var/www/html/vendor/composer/../../src/Element/AbstractElement.php:28`

<a name="spaceonfire_apidoc_element_abstractelement_$deprecated"></a>

### \$deprecated

-   **Visibility**: public
-   **Static**: No
-   **Type**: _bool|string_
-   **Default value**: `false`

```php
public bool|string $deprecated = false
```

File location: `/var/www/html/vendor/composer/../../src/Element/AbstractElement.php:32`

<a name="spaceonfire_apidoc_element_abstractelement_$location"></a>

### \$location

-   **Visibility**: public
-   **Static**: No
-   **Type**: _spaceonfire\ApiDoc\Element\Location\Location|null_
-   **Default value**: none

```php
public spaceonfire\ApiDoc\Element\Location\Location|null $location
```

File location: `/var/www/html/vendor/composer/../../src/Element/AbstractElement.php:36`

<a name="spaceonfire_apidoc_element_abstractelement_$links"></a>

### \$links

-   **Visibility**: public
-   **Static**: No
-   **Type**: _spaceonfire\ApiDoc\Element\ValueObject\LinkInterface[]_
-   **Default value**: none

```php
public spaceonfire\ApiDoc\Element\ValueObject\LinkInterface[] $links
```

File location: `/var/www/html/vendor/composer/../../src/Element/AbstractElement.php:40`

<a name="spaceonfire_apidoc_element_abstractelement_$examples"></a>

### \$examples

-   **Visibility**: public
-   **Static**: No
-   **Type**: _spaceonfire\ApiDoc\Element\ValueObject\Example[]_
-   **Default value**: none

```php
public spaceonfire\ApiDoc\Element\ValueObject\Example[] $examples
```

File location: `/var/www/html/vendor/composer/../../src/Element/AbstractElement.php:44`

<a name="spaceonfire_apidoc_element_propertyelement_$static"></a>

### \$static

-   **Visibility**: public
-   **Static**: No
-   **Type**: _bool_
-   **Default value**: none

```php
public bool $static
```

File location: `Element/PropertyElement.php:16`

<a name="spaceonfire_apidoc_element_propertyelement_$visibility"></a>

### \$visibility

-   **Visibility**: public
-   **Static**: No
-   **Type**: _spaceonfire\ApiDoc\Element\ValueObject\Visibility_
-   **Default value**: none

```php
public spaceonfire\ApiDoc\Element\ValueObject\Visibility $visibility
```

File location: `Element/PropertyElement.php:20`

<a name="spaceonfire_apidoc_element_propertyelement_$type"></a>

### \$type

-   **Visibility**: public
-   **Static**: No
-   **Type**: _spaceonfire\Type\Type|null_
-   **Default value**: none

```php
public spaceonfire\Type\Type|null $type
```

File location: `Element/PropertyElement.php:24`

<a name="spaceonfire_apidoc_element_propertyelement_$defaultvalue"></a>

### \$defaultValue

-   **Visibility**: public
-   **Static**: No
-   **Type**: _spaceonfire\ApiDoc\Element\ValueObject\Value|null_
-   **Default value**: none

```php
public spaceonfire\ApiDoc\Element\ValueObject\Value|null $defaultValue
```

File location: `Element/PropertyElement.php:28`

## Methods

<a name="spaceonfire_apidoc_element_abstractelement_construct"></a>

### \_\_construct()

-   **Final method**: Yes
-   **Visibility**: public

```php
final public function __construct()
```

File location: `/var/www/html/vendor/composer/../../src/Element/AbstractElement.php:46`

---

This file automatically generated by [SpaceOnFire ApiDoc](https://github.com/spaceonfire/apidoc)
