# Class Visibility

Class Visibility

Full name: `spaceonfire\ApiDoc\Element\ValueObject\Visibility`

Parent class name: `spaceonfire\ValueObject\EnumValue`

This class implements: `JsonSerializable`

## Class members

| Name                                                                      | Type                                                | Summary                                             | Additional                                            |
| ------------------------------------------------------------------------- | --------------------------------------------------- | --------------------------------------------------- | ----------------------------------------------------- |
| _Constants_                                                               |                                                     |                                                     |                                                       |
| [PUBLIC](#spaceonfire_apidoc_element_valueobject_visibility_public)       |                                                     |                                                     | [📢](# "Visibility: public")                          |
| [PROTECTED](#spaceonfire_apidoc_element_valueobject_visibility_protected) |                                                     |                                                     | [📢](# "Visibility: public")                          |
| [PRIVATE](#spaceonfire_apidoc_element_valueobject_visibility_private)     |                                                     |                                                     | [📢](# "Visibility: public")                          |
| _Methods_                                                                 |                                                     |                                                     |                                                       |
| [equals](#spaceonfire_valueobject_enumvalue_equals)                       | _bool_                                              | Checks that current VO is bigger than provided one. | [📢](# "Visibility: public")                          |
| [\_\_callStatic](#spaceonfire_valueobject_enumvalue_callstatic)           | _spaceonfire\ValueObject\EnumValue_                 | Support for magic methods                           | [🇸](# "Static element") [📢](# "Visibility: public") |
| [randomValue](#spaceonfire_valueobject_enumvalue_randomvalue)             | _mixed&#124;string_                                 | Returns random value for this enum class.           | [🇸](# "Static element") [📢](# "Visibility: public") |
| [random](#spaceonfire_valueobject_enumvalue_random)                       | _spaceonfire\ValueObject\EnumValue_                 | Creates new enum VO with random value.              | [🇸](# "Static element") [📢](# "Visibility: public") |
| [values](#spaceonfire_valueobject_enumvalue_values)                       | _mixed[]&#124;array_                                | Returns values array for this enum class.           | [🇸](# "Static element") [📢](# "Visibility: public") |
| [\_\_construct](#spaceonfire_valueobject_basevalueobject_construct)       |                                                     | VO constructor                                      | [📌](# "Final element") [📢](# "Visibility: public")  |
| [value](#spaceonfire_valueobject_basevalueobject_value)                   | _mixed_                                             | Returns inner value of VO                           | [📢](# "Visibility: public")                          |
| [\_\_toString](#spaceonfire_valueobject_basevalueobject_tostring)         | _string_                                            | Cast VO to string                                   | [📢](# "Visibility: public")                          |
| [jsonSerialize](#spaceonfire_valueobject_basevalueobject_jsonserialize)   | _mixed&#124;string_                                 | Specify data which should be serialized to JSON     | [📢](# "Visibility: public")                          |
| _Magic methods_                                                           |                                                     |                                                     |                                                       |
| [public](#spaceonfire_apidoc_element_valueobject_visibility_public)       | _spaceonfire\ApiDoc\Element\ValueObject\Visibility_ |                                                     | [🇸](# "Static element") [📢](# "Visibility: public") |
| [protected](#spaceonfire_apidoc_element_valueobject_visibility_protected) | _spaceonfire\ApiDoc\Element\ValueObject\Visibility_ |                                                     | [🇸](# "Static element") [📢](# "Visibility: public") |
| [private](#spaceonfire_apidoc_element_valueobject_visibility_private)     | _spaceonfire\ApiDoc\Element\ValueObject\Visibility_ |                                                     | [🇸](# "Static element") [📢](# "Visibility: public") |

## Constants

<a name="spaceonfire_apidoc_element_valueobject_visibility_public"></a>

### PUBLIC

-   **Visibility**: public
-   **Value**: `'public'`

File location: `Element/ValueObject/Visibility.php:18`

<a name="spaceonfire_apidoc_element_valueobject_visibility_protected"></a>

### PROTECTED

-   **Visibility**: public
-   **Value**: `'protected'`

File location: `Element/ValueObject/Visibility.php:19`

<a name="spaceonfire_apidoc_element_valueobject_visibility_private"></a>

### PRIVATE

-   **Visibility**: public
-   **Value**: `'private'`

File location: `Element/ValueObject/Visibility.php:20`

## Methods

<a name="spaceonfire_valueobject_enumvalue_equals"></a>

### equals()

Checks that current VO is bigger than provided one.

-   **Visibility**: public

| Param      | Type                                | Reference | Description |
| ---------- | ----------------------------------- | --------- | ----------- |
| `$other`   | _spaceonfire\ValueObject\EnumValue_ | No        |             |
| **Return** | _bool_                              |           |             |

```php
public function equals(spaceonfire\ValueObject\EnumValue $other): bool
```

File location: `/var/www/html/vendor/composer/../spaceonfire/value-object/src/EnumValue.php:51`

<a name="spaceonfire_valueobject_enumvalue_callstatic"></a>

### \_\_callStatic()

Support for magic methods

-   **Visibility**: public
-   **Static**: Yes

| Param      | Type                                | Reference | Description |
| ---------- | ----------------------------------- | --------- | ----------- |
| `$name`    | _string_                            | No        |             |
| `$args`    | _mixed[]_                           | No        |             |
| **Return** | _spaceonfire\ValueObject\EnumValue_ |           |             |

```php
public static function __callStatic(string $name, mixed[] $args): spaceonfire\ValueObject\EnumValue
```

File location: `/var/www/html/vendor/composer/../spaceonfire/value-object/src/EnumValue.php:63`

<a name="spaceonfire_valueobject_enumvalue_randomvalue"></a>

### randomValue()

Returns random value for this enum class.

-   **Visibility**: public
-   **Static**: Yes

| Param      | Type                | Reference | Description |
| ---------- | ------------------- | --------- | ----------- |
| **Return** | _mixed&#124;string_ |           |             |

```php
public static function randomValue(): mixed|string
```

File location: `/var/www/html/vendor/composer/../spaceonfire/value-object/src/EnumValue.php:72`

<a name="spaceonfire_valueobject_enumvalue_random"></a>

### random()

Creates new enum VO with random value.

-   **Visibility**: public
-   **Static**: Yes

| Param      | Type                                | Reference | Description |
| ---------- | ----------------------------------- | --------- | ----------- |
| **Return** | _spaceonfire\ValueObject\EnumValue_ |           |             |

```php
public static function random(): spaceonfire\ValueObject\EnumValue
```

File location: `/var/www/html/vendor/composer/../spaceonfire/value-object/src/EnumValue.php:81`

<a name="spaceonfire_valueobject_enumvalue_values"></a>

### values()

Returns values array for this enum class.

-   **Visibility**: public
-   **Static**: Yes

| Param      | Type                 | Reference | Description |
| ---------- | -------------------- | --------- | ----------- |
| **Return** | _mixed[]&#124;array_ |           |             |

```php
public static function values(): mixed[]|array
```

File location: `/var/www/html/vendor/composer/../spaceonfire/value-object/src/EnumValue.php:90`

<a name="spaceonfire_valueobject_basevalueobject_construct"></a>

### \_\_construct()

VO constructor

-   **Final method**: Yes
-   **Visibility**: public

| Param    | Type    | Reference | Description |
| -------- | ------- | --------- | ----------- |
| `$value` | _mixed_ | No        |             |

```php
final public function __construct(mixed $value)
```

File location: `/var/www/html/vendor/composer/../spaceonfire/value-object/src/BaseValueObject.php:22`

<a name="spaceonfire_valueobject_basevalueobject_value"></a>

### value()

Returns inner value of VO

-   **Visibility**: public

| Param      | Type    | Reference | Description |
| ---------- | ------- | --------- | ----------- |
| **Return** | _mixed_ |           |             |

```php
public function value(): mixed
```

File location: `/var/www/html/vendor/composer/../spaceonfire/value-object/src/BaseValueObject.php:71`

<a name="spaceonfire_valueobject_basevalueobject_tostring"></a>

### \_\_toString()

Cast VO to string

-   **Visibility**: public

| Param      | Type     | Reference | Description |
| ---------- | -------- | --------- | ----------- |
| **Return** | _string_ |           |             |

```php
public function __toString(): string
```

File location: `/var/www/html/vendor/composer/../spaceonfire/value-object/src/BaseValueObject.php:80`

<a name="spaceonfire_valueobject_basevalueobject_jsonserialize"></a>

### jsonSerialize()

Specify data which should be serialized to JSON

-   **Visibility**: public

| Param      | Type                | Reference | Description |
| ---------- | ------------------- | --------- | ----------- |
| **Return** | _mixed&#124;string_ |           |             |

```php
public function jsonSerialize(): mixed|string
```

File location: `/var/www/html/vendor/composer/../spaceonfire/value-object/src/BaseValueObject.php:89`

## Magic methods

<a name="spaceonfire_apidoc_element_valueobject_visibility_public"></a>

### public()

-   **Visibility**: public
-   **Static**: Yes

| Param      | Type                                                | Reference | Description |
| ---------- | --------------------------------------------------- | --------- | ----------- |
| **Return** | _spaceonfire\ApiDoc\Element\ValueObject\Visibility_ |           |             |

```php
public static function public(): spaceonfire\ApiDoc\Element\ValueObject\Visibility
```

<a name="spaceonfire_apidoc_element_valueobject_visibility_protected"></a>

### protected()

-   **Visibility**: public
-   **Static**: Yes

| Param      | Type                                                | Reference | Description |
| ---------- | --------------------------------------------------- | --------- | ----------- |
| **Return** | _spaceonfire\ApiDoc\Element\ValueObject\Visibility_ |           |             |

```php
public static function protected(): spaceonfire\ApiDoc\Element\ValueObject\Visibility
```

<a name="spaceonfire_apidoc_element_valueobject_visibility_private"></a>

### private()

-   **Visibility**: public
-   **Static**: Yes

| Param      | Type                                                | Reference | Description |
| ---------- | --------------------------------------------------- | --------- | ----------- |
| **Return** | _spaceonfire\ApiDoc\Element\ValueObject\Visibility_ |           |             |

```php
public static function private(): spaceonfire\ApiDoc\Element\ValueObject\Visibility
```

---

This file automatically generated by [SpaceOnFire ApiDoc](https://github.com/spaceonfire/apidoc)
