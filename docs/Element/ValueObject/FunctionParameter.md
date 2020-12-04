# Class FunctionParameter

Full name: `spaceonfire\ApiDoc\Element\ValueObject\FunctionParameter`

Parent class name: `spaceonfire\ApiDoc\Element\ValueObject\AbstractTypedSymbol`

## Class members

| Name                                                                                                 | Type                                                     | Summary                                  | Additional                   |
| ---------------------------------------------------------------------------------------------------- | -------------------------------------------------------- | ---------------------------------------- | ---------------------------- |
| _Methods_                                                                                            |                                                          |                                          |                              |
| [\_\_construct](#spaceonfire_apidoc_element_valueobject_functionparameter_construct)                 |                                                          | Argument constructor.                    | [📢](# "Visibility: public") |
| [getName](#spaceonfire_apidoc_element_valueobject_functionparameter_getname)                         | _string_                                                 | Getter for `name` property.              | [📢](# "Visibility: public") |
| [isVariadic](#spaceonfire_apidoc_element_valueobject_functionparameter_isvariadic)                   | _bool_                                                   | Getter for `variadic` property.          | [📢](# "Visibility: public") |
| [isPassedByReference](#spaceonfire_apidoc_element_valueobject_functionparameter_ispassedbyreference) | _bool_                                                   | Getter for `passedByReference` property. | [📢](# "Visibility: public") |
| [getDefaultValue](#spaceonfire_apidoc_element_valueobject_functionparameter_getdefaultvalue)         | _spaceonfire\ApiDoc\Element\ValueObject\Value&#124;null_ | Getter for `defaultValue` property.      | [📢](# "Visibility: public") |
| [getDescription](#spaceonfire_apidoc_element_valueobject_abstracttypedsymbol_getdescription)         | _string_                                                 | Getter for `description` property.       | [📢](# "Visibility: public") |
| [getType](#spaceonfire_apidoc_element_valueobject_abstracttypedsymbol_gettype)                       | _spaceonfire\Type\Type&#124;null_                        | Getter for `type` property.              | [📢](# "Visibility: public") |

## Methods

<a name="spaceonfire_apidoc_element_valueobject_functionparameter_construct"></a>

### \_\_construct()

Argument constructor.

-   **Visibility**: public

| Param                | Type                                                     | Reference | Description |
| -------------------- | -------------------------------------------------------- | --------- | ----------- |
| `$name`              | _string_                                                 | No        |             |
| `$description`       | _string_                                                 | No        |             |
| `$type`              | _spaceonfire\Type\Type&#124;null_                        | No        |             |
| `$variadic`          | _bool_                                                   | No        |             |
| `$passedByReference` | _bool_                                                   | No        |             |
| `$defaultValue`      | _spaceonfire\ApiDoc\Element\ValueObject\Value&#124;null_ | No        |             |

```php
public function __construct(string $name, string $description, spaceonfire\Type\Type|null $type = null, bool $variadic = false, bool $passedByReference = false, spaceonfire\ApiDoc\Element\ValueObject\Value|null $defaultValue = null)
```

File location: `Element/ValueObject/FunctionParameter.php:37`

<a name="spaceonfire_apidoc_element_valueobject_functionparameter_getname"></a>

### getName()

Getter for `name` property.

-   **Visibility**: public

| Param      | Type     | Reference | Description |
| ---------- | -------- | --------- | ----------- |
| **Return** | _string_ |           |             |

```php
public function getName(): string
```

File location: `Element/ValueObject/FunctionParameter.php:57`

<a name="spaceonfire_apidoc_element_valueobject_functionparameter_isvariadic"></a>

### isVariadic()

Getter for `variadic` property.

-   **Visibility**: public

| Param      | Type   | Reference | Description |
| ---------- | ------ | --------- | ----------- |
| **Return** | _bool_ |           |             |

```php
public function isVariadic(): bool
```

File location: `Element/ValueObject/FunctionParameter.php:66`

<a name="spaceonfire_apidoc_element_valueobject_functionparameter_ispassedbyreference"></a>

### isPassedByReference()

Getter for `passedByReference` property.

-   **Visibility**: public

| Param      | Type   | Reference | Description |
| ---------- | ------ | --------- | ----------- |
| **Return** | _bool_ |           |             |

```php
public function isPassedByReference(): bool
```

File location: `Element/ValueObject/FunctionParameter.php:75`

<a name="spaceonfire_apidoc_element_valueobject_functionparameter_getdefaultvalue"></a>

### getDefaultValue()

Getter for `defaultValue` property.

-   **Visibility**: public

| Param      | Type                                                     | Reference | Description |
| ---------- | -------------------------------------------------------- | --------- | ----------- |
| **Return** | _spaceonfire\ApiDoc\Element\ValueObject\Value&#124;null_ |           |             |

```php
public function getDefaultValue(): spaceonfire\ApiDoc\Element\ValueObject\Value|null
```

File location: `Element/ValueObject/FunctionParameter.php:84`

<a name="spaceonfire_apidoc_element_valueobject_abstracttypedsymbol_getdescription"></a>

### getDescription()

Getter for `description` property.

-   **Visibility**: public

| Param      | Type     | Reference | Description |
| ---------- | -------- | --------- | ----------- |
| **Return** | _string_ |           |             |

```php
public function getDescription(): string
```

File location: `/var/www/html/vendor/composer/../../src/Element/ValueObject/AbstractTypedSymbol.php:35`

<a name="spaceonfire_apidoc_element_valueobject_abstracttypedsymbol_gettype"></a>

### getType()

Getter for `type` property.

-   **Visibility**: public

| Param      | Type                              | Reference | Description |
| ---------- | --------------------------------- | --------- | ----------- |
| **Return** | _spaceonfire\Type\Type&#124;null_ |           |             |

```php
public function getType(): spaceonfire\Type\Type|null
```

File location: `/var/www/html/vendor/composer/../../src/Element/ValueObject/AbstractTypedSymbol.php:44`

---

This file automatically generated by [SpaceOnFire ApiDoc](https://github.com/spaceonfire/apidoc)
