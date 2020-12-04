# Class GivenReflectionNotSupported

Full name: `spaceonfire\ApiDoc\Exception\GivenReflectionNotSupported`

Parent class name: `UnexpectedValueException`

This class implements: `Throwable`

## Class members

| Name                                                                                               | Type                                                       | Summary                                       | Additional                                            |
| -------------------------------------------------------------------------------------------------- | ---------------------------------------------------------- | --------------------------------------------- | ----------------------------------------------------- |
| _Methods_                                                                                          |                                                            |                                               |                                                       |
| [byElementFactory](#spaceonfire_apidoc_exception_givenreflectionnotsupported_byelementfactory)     | _spaceonfire\ApiDoc\Exception\GivenReflectionNotSupported_ |                                               | [🇸](# "Static element") [📢](# "Visibility: public") |
| [byDocBlockResolver](#spaceonfire_apidoc_exception_givenreflectionnotsupported_bydocblockresolver) | _spaceonfire\ApiDoc\Exception\GivenReflectionNotSupported_ |                                               | [🇸](# "Static element") [📢](# "Visibility: public") |
| [forReason](#spaceonfire_apidoc_exception_givenreflectionnotsupported_forreason)                   | _spaceonfire\ApiDoc\Exception\GivenReflectionNotSupported_ |                                               | [🇸](# "Static element") [📢](# "Visibility: public") |
| [getMessage](#exception_getmessage)                                                                | _string_                                                   | Gets the Exception message                    | [📌](# "Final element") [📢](# "Visibility: public")  |
| [getCode](#exception_getcode)                                                                      | _mixed&#124;int_                                           | Gets the Exception code                       | [📌](# "Final element") [📢](# "Visibility: public")  |
| [getFile](#exception_getfile)                                                                      | _string_                                                   | Gets the file in which the exception occurred | [📌](# "Final element") [📢](# "Visibility: public")  |
| [getLine](#exception_getline)                                                                      | _int_                                                      | Gets the line in which the exception occurred | [📌](# "Final element") [📢](# "Visibility: public")  |
| [getTrace](#exception_gettrace)                                                                    | _mixed[]_                                                  | Gets the stack trace                          | [📌](# "Final element") [📢](# "Visibility: public")  |
| [getPrevious](#exception_getprevious)                                                              | _Exception_                                                | Returns previous Exception                    | [📌](# "Final element") [📢](# "Visibility: public")  |
| [getTraceAsString](#exception_gettraceasstring)                                                    | _string_                                                   | Gets the stack trace as a string              | [📌](# "Final element") [📢](# "Visibility: public")  |
| [\_\_toString](#exception_tostring)                                                                | _string_                                                   | String representation of the exception        | [📢](# "Visibility: public")                          |
| [\_\_wakeup](#exception_wakeup)                                                                    |                                                            |                                               | [📢](# "Visibility: public")                          |

## Methods

<a name="spaceonfire_apidoc_exception_givenreflectionnotsupported_byelementfactory"></a>

### byElementFactory()

-   **Visibility**: public
-   **Static**: Yes

| Param         | Type                                                       | Reference | Description |
| ------------- | ---------------------------------------------------------- | --------- | ----------- |
| `$reflection` | _object_                                                   | No        |             |
| **Return**    | _spaceonfire\ApiDoc\Exception\GivenReflectionNotSupported_ |           |             |

```php
public static function byElementFactory(object $reflection): spaceonfire\ApiDoc\Exception\GivenReflectionNotSupported
```

File location: `Exception/GivenReflectionNotSupported.php:17`

<a name="spaceonfire_apidoc_exception_givenreflectionnotsupported_bydocblockresolver"></a>

### byDocBlockResolver()

-   **Visibility**: public
-   **Static**: Yes

| Param         | Type                                                       | Reference | Description |
| ------------- | ---------------------------------------------------------- | --------- | ----------- |
| `$reflection` | _object_                                                   | No        |             |
| **Return**    | _spaceonfire\ApiDoc\Exception\GivenReflectionNotSupported_ |           |             |

```php
public static function byDocBlockResolver(object $reflection): spaceonfire\ApiDoc\Exception\GivenReflectionNotSupported
```

File location: `Exception/GivenReflectionNotSupported.php:25`

<a name="spaceonfire_apidoc_exception_givenreflectionnotsupported_forreason"></a>

### forReason()

-   **Visibility**: public
-   **Static**: Yes

| Param         | Type                                                       | Reference | Description |
| ------------- | ---------------------------------------------------------- | --------- | ----------- |
| `$reflection` | _object_                                                   | No        |             |
| `$reason`     | _string_                                                   | No        |             |
| **Return**    | _spaceonfire\ApiDoc\Exception\GivenReflectionNotSupported_ |           |             |

```php
public static function forReason(object $reflection, string $reason = ''): spaceonfire\ApiDoc\Exception\GivenReflectionNotSupported
```

File location: `Exception/GivenReflectionNotSupported.php:33`

<a name="exception_getmessage"></a>

### getMessage()

Gets the Exception message

-   **Final method**: Yes
-   **Visibility**: public

| Param      | Type     | Reference | Description                        |
| ---------- | -------- | --------- | ---------------------------------- |
| **Return** | _string_ |           | the Exception message as a string. |

```php
final public function getMessage(): string
```

**Links**:

-   [https://php.net/manual/en/exception.getmessage.php](https://php.net/manual/en/exception.getmessage.php)

<a name="exception_getcode"></a>

### getCode()

Gets the Exception code

-   **Final method**: Yes
-   **Visibility**: public

| Param      | Type             | Reference | Description                                                                                                                                                           |
| ---------- | ---------------- | --------- | --------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| **Return** | _mixed&#124;int_ |           | the exception code as integer in<br><b>Exception</b> but possibly as other type in<br><b>Exception</b> descendants (for example as<br>string in <b>PDOException</b>). |

```php
final public function getCode(): mixed|int
```

**Links**:

-   [https://php.net/manual/en/exception.getcode.php](https://php.net/manual/en/exception.getcode.php)

<a name="exception_getfile"></a>

### getFile()

Gets the file in which the exception occurred

-   **Final method**: Yes
-   **Visibility**: public

| Param      | Type     | Reference | Description                                      |
| ---------- | -------- | --------- | ------------------------------------------------ |
| **Return** | _string_ |           | the filename in which the exception was created. |

```php
final public function getFile(): string
```

**Links**:

-   [https://php.net/manual/en/exception.getfile.php](https://php.net/manual/en/exception.getfile.php)

<a name="exception_getline"></a>

### getLine()

Gets the line in which the exception occurred

-   **Final method**: Yes
-   **Visibility**: public

| Param      | Type  | Reference | Description                                      |
| ---------- | ----- | --------- | ------------------------------------------------ |
| **Return** | _int_ |           | the line number where the exception was created. |

```php
final public function getLine(): int
```

**Links**:

-   [https://php.net/manual/en/exception.getline.php](https://php.net/manual/en/exception.getline.php)

<a name="exception_gettrace"></a>

### getTrace()

Gets the stack trace

-   **Final method**: Yes
-   **Visibility**: public

| Param      | Type      | Reference | Description                            |
| ---------- | --------- | --------- | -------------------------------------- |
| **Return** | _mixed[]_ |           | the Exception stack trace as an array. |

```php
final public function getTrace(): mixed[]
```

**Links**:

-   [https://php.net/manual/en/exception.gettrace.php](https://php.net/manual/en/exception.gettrace.php)

<a name="exception_getprevious"></a>

### getPrevious()

Returns previous Exception

-   **Final method**: Yes
-   **Visibility**: public

| Param      | Type        | Reference | Description                                                      |
| ---------- | ----------- | --------- | ---------------------------------------------------------------- |
| **Return** | _Exception_ |           | the previous <b>Exception</b> if available<br>or null otherwise. |

```php
final public function getPrevious(): Exception
```

**Links**:

-   [https://php.net/manual/en/exception.getprevious.php](https://php.net/manual/en/exception.getprevious.php)

<a name="exception_gettraceasstring"></a>

### getTraceAsString()

Gets the stack trace as a string

-   **Final method**: Yes
-   **Visibility**: public

| Param      | Type     | Reference | Description                            |
| ---------- | -------- | --------- | -------------------------------------- |
| **Return** | _string_ |           | the Exception stack trace as a string. |

```php
final public function getTraceAsString(): string
```

**Links**:

-   [https://php.net/manual/en/exception.gettraceasstring.php](https://php.net/manual/en/exception.gettraceasstring.php)

<a name="exception_tostring"></a>

### \_\_toString()

String representation of the exception

-   **Visibility**: public

| Param      | Type     | Reference | Description                                 |
| ---------- | -------- | --------- | ------------------------------------------- |
| **Return** | _string_ |           | the string representation of the exception. |

```php
public function __toString(): string
```

**Links**:

-   [https://php.net/manual/en/exception.tostring.php](https://php.net/manual/en/exception.tostring.php)

<a name="exception_wakeup"></a>

### \_\_wakeup()

-   **Visibility**: public

```php
public function __wakeup()
```

---

This file automatically generated by [SpaceOnFire ApiDoc](https://github.com/spaceonfire/apidoc)
