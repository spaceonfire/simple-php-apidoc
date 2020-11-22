# Class ClassElement

Full name: `spaceonfire\ApiDoc\Element\ClassElement`

Parent class name: `spaceonfire\ApiDoc\Element\AbstractElement`

This class implements: `spaceonfire\ApiDoc\Element\ElementInterface`

## Class members

| Name                                                                           | Type                                                     | Summary | Additional                                           |
| ------------------------------------------------------------------------------ | -------------------------------------------------------- | ------- | ---------------------------------------------------- |
| _Properties_                                                                   |                                                          |         |                                                      |
| [\$name](#spaceonfire_apidoc_element_abstractelement_$name)                    | _spaceonfire\ApiDoc\Element\ValueObject\Fqsen_           |         | [📢](# "Visibility: public")                         |
| [\$summary](#spaceonfire_apidoc_element_abstractelement_$summary)              | _string_                                                 |         | [📢](# "Visibility: public")                         |
| [\$description](#spaceonfire_apidoc_element_abstractelement_$description)      | _string_                                                 |         | [📢](# "Visibility: public")                         |
| [\$deprecated](#spaceonfire_apidoc_element_abstractelement_$deprecated)        | _bool&#124;string_                                       |         | [📢](# "Visibility: public")                         |
| [\$location](#spaceonfire_apidoc_element_abstractelement_$location)            | _spaceonfire\ApiDoc\Element\Location\Location&#124;null_ |         | [📢](# "Visibility: public")                         |
| [\$links](#spaceonfire_apidoc_element_abstractelement_$links)                  | _spaceonfire\ApiDoc\Element\ValueObject\LinkInterface[]_ |         | [📢](# "Visibility: public")                         |
| [\$examples](#spaceonfire_apidoc_element_abstractelement_$examples)            | _spaceonfire\ApiDoc\Element\ValueObject\Example[]_       |         | [📢](# "Visibility: public")                         |
| [\$abstract](#spaceonfire_apidoc_element_classelement_$abstract)               | _bool_                                                   |         | [📢](# "Visibility: public")                         |
| [\$final](#spaceonfire_apidoc_element_classelement_$final)                     | _bool_                                                   |         | [📢](# "Visibility: public")                         |
| [\$constants](#spaceonfire_apidoc_element_classelement_$constants)             | _spaceonfire\ApiDoc\Element\ConstantElement[]_           |         | [📢](# "Visibility: public")                         |
| [\$properties](#spaceonfire_apidoc_element_classelement_$properties)           | _spaceonfire\ApiDoc\Element\PropertyElement[]_           |         | [📢](# "Visibility: public")                         |
| [\$methods](#spaceonfire_apidoc_element_classelement_$methods)                 | _spaceonfire\ApiDoc\Element\MethodElement[]_             |         | [📢](# "Visibility: public")                         |
| [\$magicProperties](#spaceonfire_apidoc_element_classelement_$magicproperties) | _spaceonfire\ApiDoc\Element\PropertyElement[]_           |         | [📢](# "Visibility: public")                         |
| [\$magicMethods](#spaceonfire_apidoc_element_classelement_$magicmethods)       | _spaceonfire\ApiDoc\Element\MethodElement[]_             |         | [📢](# "Visibility: public")                         |
| [\$parent](#spaceonfire_apidoc_element_classelement_$parent)                   | _spaceonfire\ApiDoc\Element\ClassElement&#124;null_      |         | [📢](# "Visibility: public")                         |
| [\$interfaces](#spaceonfire_apidoc_element_classelement_$interfaces)           | _spaceonfire\ApiDoc\Element\InterfaceElement[]_          |         | [📢](# "Visibility: public")                         |
| [\$traits](#spaceonfire_apidoc_element_classelement_$traits)                   | _spaceonfire\ApiDoc\Element\TraitElement[]_              |         | [📢](# "Visibility: public")                         |
| _Methods_                                                                      |                                                          |         |                                                      |
| [\_\_construct](#spaceonfire_apidoc_element_abstractelement_construct)         |                                                          |         | [📌](# "Final element") [📢](# "Visibility: public") |

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

<a name="spaceonfire_apidoc_element_classelement_$abstract"></a>

### \$abstract

-   **Visibility**: public
-   **Static**: No
-   **Type**: _bool_
-   **Default value**: none

```php
public bool $abstract
```

File location: `Element/ClassElement.php:17`

<a name="spaceonfire_apidoc_element_classelement_$final"></a>

### \$final

-   **Visibility**: public
-   **Static**: No
-   **Type**: _bool_
-   **Default value**: none

```php
public bool $final
```

File location: `Element/ClassElement.php:21`

<a name="spaceonfire_apidoc_element_classelement_$constants"></a>

### \$constants

-   **Visibility**: public
-   **Static**: No
-   **Type**: _spaceonfire\ApiDoc\Element\ConstantElement[]_
-   **Default value**: none

```php
public spaceonfire\ApiDoc\Element\ConstantElement[] $constants
```

File location: `Element/ClassElement.php:25`

<a name="spaceonfire_apidoc_element_classelement_$properties"></a>

### \$properties

-   **Visibility**: public
-   **Static**: No
-   **Type**: _spaceonfire\ApiDoc\Element\PropertyElement[]_
-   **Default value**: none

```php
public spaceonfire\ApiDoc\Element\PropertyElement[] $properties
```

File location: `Element/ClassElement.php:29`

<a name="spaceonfire_apidoc_element_classelement_$methods"></a>

### \$methods

-   **Visibility**: public
-   **Static**: No
-   **Type**: _spaceonfire\ApiDoc\Element\MethodElement[]_
-   **Default value**: none

```php
public spaceonfire\ApiDoc\Element\MethodElement[] $methods
```

File location: `Element/ClassElement.php:33`

<a name="spaceonfire_apidoc_element_classelement_$magicproperties"></a>

### \$magicProperties

-   **Visibility**: public
-   **Static**: No
-   **Type**: _spaceonfire\ApiDoc\Element\PropertyElement[]_
-   **Default value**: none

```php
public spaceonfire\ApiDoc\Element\PropertyElement[] $magicProperties
```

File location: `Element/ClassElement.php:37`

<a name="spaceonfire_apidoc_element_classelement_$magicmethods"></a>

### \$magicMethods

-   **Visibility**: public
-   **Static**: No
-   **Type**: _spaceonfire\ApiDoc\Element\MethodElement[]_
-   **Default value**: none

```php
public spaceonfire\ApiDoc\Element\MethodElement[] $magicMethods
```

File location: `Element/ClassElement.php:41`

<a name="spaceonfire_apidoc_element_classelement_$parent"></a>

### \$parent

-   **Visibility**: public
-   **Static**: No
-   **Type**: _spaceonfire\ApiDoc\Element\ClassElement|null_
-   **Default value**: none

```php
public spaceonfire\ApiDoc\Element\ClassElement|null $parent
```

File location: `Element/ClassElement.php:45`

<a name="spaceonfire_apidoc_element_classelement_$interfaces"></a>

### \$interfaces

-   **Visibility**: public
-   **Static**: No
-   **Type**: _spaceonfire\ApiDoc\Element\InterfaceElement[]_
-   **Default value**: none

```php
public spaceonfire\ApiDoc\Element\InterfaceElement[] $interfaces
```

File location: `Element/ClassElement.php:49`

<a name="spaceonfire_apidoc_element_classelement_$traits"></a>

### \$traits

-   **Visibility**: public
-   **Static**: No
-   **Type**: _spaceonfire\ApiDoc\Element\TraitElement[]_
-   **Default value**: none

```php
public spaceonfire\ApiDoc\Element\TraitElement[] $traits
```

File location: `Element/ClassElement.php:53`

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
