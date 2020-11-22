# Class Example

Full name: `spaceonfire\ApiDoc\Element\ValueObject\Example`

## Class members

| Name                                                                                     | Type                                                 | Summary                                         | Additional                   |
| ---------------------------------------------------------------------------------------- | ---------------------------------------------------- | ----------------------------------------------- | ---------------------------- |
| _Methods_                                                                                |                                                      |                                                 |                              |
| [\_\_construct](#spaceonfire_apidoc_element_valueobject_example_construct)               |                                                      | Example constructor.                            | [📢](# "Visibility: public") |
| [getFilePath](#spaceonfire_apidoc_element_valueobject_example_getfilepath)               | _string_                                             | Getter for `filePath` property.                 | [📢](# "Visibility: public") |
| [getUri](#spaceonfire_apidoc_element_valueobject_example_geturi)                         | _Psr\Http\Message\UriInterface&#124;null_            | Getter for `uri` property.                      | [📢](# "Visibility: public") |
| [getLocation](#spaceonfire_apidoc_element_valueobject_example_getlocation)               | _spaceonfire\ApiDoc\Element\Location\Location_       | Getter for `location` property.                 | [📢](# "Visibility: public") |
| [getStartingLine](#spaceonfire_apidoc_element_valueobject_example_getstartingline)       | _int_                                                | Getter for `startingLine` property.             | [📢](# "Visibility: public") |
| [getLineCount](#spaceonfire_apidoc_element_valueobject_example_getlinecount)             | _int&#124;null_                                      | Getter for `lineCount` property.                | [📢](# "Visibility: public") |
| [getDescription](#spaceonfire_apidoc_element_valueobject_example_getdescription)         | _string&#124;null_                                   | Getter for `description` property.              | [📢](# "Visibility: public") |
| [resolveCodeSnippet](#spaceonfire_apidoc_element_valueobject_example_resolvecodesnippet) | _spaceonfire\ApiDoc\Element\ValueObject\CodeSnippet_ | Resolve and cache code snippet for this example | [📢](# "Visibility: public") |

## Methods

<a name="spaceonfire_apidoc_element_valueobject_example_construct"></a>

### \_\_construct()

Example constructor.

-   **Visibility**: public

| Param           | Type                                           | Reference | Description |
| --------------- | ---------------------------------------------- | --------- | ----------- |
| `$filePath`     | _string_                                       | No        |             |
| `$location`     | _spaceonfire\ApiDoc\Element\Location\Location_ | No        |             |
| `$startingLine` | _int_                                          | No        |             |
| `$lineCount`    | _int&#124;null_                                | No        |             |
| `$description`  | _string&#124;null_                             | No        |             |

```php
public function __construct(string $filePath, spaceonfire\ApiDoc\Element\Location\Location $location, int $startingLine = 0, int|null $lineCount = null, string|null $description = null)
```

File location: `Element/ValueObject/Example.php:51`

<a name="spaceonfire_apidoc_element_valueobject_example_getfilepath"></a>

### getFilePath()

Getter for `filePath` property.

-   **Visibility**: public

| Param      | Type     | Reference | Description |
| ---------- | -------- | --------- | ----------- |
| **Return** | _string_ |           |             |

```php
public function getFilePath(): string
```

File location: `Element/ValueObject/Example.php:79`

<a name="spaceonfire_apidoc_element_valueobject_example_geturi"></a>

### getUri()

Getter for `uri` property.

-   **Visibility**: public

| Param      | Type                                      | Reference | Description |
| ---------- | ----------------------------------------- | --------- | ----------- |
| **Return** | _Psr\Http\Message\UriInterface&#124;null_ |           |             |

```php
public function getUri(): Psr\Http\Message\UriInterface|null
```

File location: `Element/ValueObject/Example.php:88`

<a name="spaceonfire_apidoc_element_valueobject_example_getlocation"></a>

### getLocation()

Getter for `location` property.

-   **Visibility**: public

| Param      | Type                                           | Reference | Description |
| ---------- | ---------------------------------------------- | --------- | ----------- |
| **Return** | _spaceonfire\ApiDoc\Element\Location\Location_ |           |             |

```php
public function getLocation(): spaceonfire\ApiDoc\Element\Location\Location
```

File location: `Element/ValueObject/Example.php:97`

<a name="spaceonfire_apidoc_element_valueobject_example_getstartingline"></a>

### getStartingLine()

Getter for `startingLine` property.

-   **Visibility**: public

| Param      | Type  | Reference | Description |
| ---------- | ----- | --------- | ----------- |
| **Return** | _int_ |           |             |

```php
public function getStartingLine(): int
```

File location: `Element/ValueObject/Example.php:106`

<a name="spaceonfire_apidoc_element_valueobject_example_getlinecount"></a>

### getLineCount()

Getter for `lineCount` property.

-   **Visibility**: public

| Param      | Type            | Reference | Description |
| ---------- | --------------- | --------- | ----------- |
| **Return** | _int&#124;null_ |           |             |

```php
public function getLineCount(): int|null
```

File location: `Element/ValueObject/Example.php:115`

<a name="spaceonfire_apidoc_element_valueobject_example_getdescription"></a>

### getDescription()

Getter for `description` property.

-   **Visibility**: public

| Param      | Type               | Reference | Description |
| ---------- | ------------------ | --------- | ----------- |
| **Return** | _string&#124;null_ |           |             |

```php
public function getDescription(): string|null
```

File location: `Element/ValueObject/Example.php:124`

<a name="spaceonfire_apidoc_element_valueobject_example_resolvecodesnippet"></a>

### resolveCodeSnippet()

Resolve and cache code snippet for this example

-   **Visibility**: public

| Param       | Type                                                            | Reference | Description |
| ----------- | --------------------------------------------------------------- | --------- | ----------- |
| `$resolver` | _spaceonfire\ApiDoc\Element\Example\ExampleCodeSnippetResolver_ | No        |             |
| **Return**  | _spaceonfire\ApiDoc\Element\ValueObject\CodeSnippet_            |           |             |

```php
public function resolveCodeSnippet(spaceonfire\ApiDoc\Element\Example\ExampleCodeSnippetResolver $resolver): spaceonfire\ApiDoc\Element\ValueObject\CodeSnippet
```

File location: `Element/ValueObject/Example.php:134`

---

This file automatically generated by [SpaceOnFire ApiDoc](https://github.com/spaceonfire/apidoc)
