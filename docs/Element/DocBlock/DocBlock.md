# Class DocBlock

Full name: `spaceonfire\ApiDoc\Element\DocBlock\DocBlock`

## Class members

| Name                                                                                       | Type                                                               | Summary                            | Additional                   |
| ------------------------------------------------------------------------------------------ | ------------------------------------------------------------------ | ---------------------------------- | ---------------------------- |
| _Methods_                                                                                  |                                                                    |                                    |                              |
| [\_\_construct](#spaceonfire_apidoc_element_docblock_docblock_construct)                   |                                                                    | DocBlock constructor.              | [📢](# "Visibility: public") |
| [getSummary](#spaceonfire_apidoc_element_docblock_docblock_getsummary)                     | _string_                                                           | Getter for `summary` property.     | [📢](# "Visibility: public") |
| [getDescription](#spaceonfire_apidoc_element_docblock_docblock_getdescription)             | _string_                                                           | Getter for `description` property. | [📢](# "Visibility: public") |
| [getTags](#spaceonfire_apidoc_element_docblock_docblock_gettags)                           | _phpDocumentor\Reflection\DocBlock\Tag[]&#124;Generator_           | Getter for `tags` property.        | [📢](# "Visibility: public") |
| [getTagsByName](#spaceonfire_apidoc_element_docblock_docblock_gettagsbyname)               | _phpDocumentor\Reflection\DocBlock\Tag[]&#124;Generator_           |                                    | [📢](# "Visibility: public") |
| [getFirstTagByName](#spaceonfire_apidoc_element_docblock_docblock_getfirsttagbyname)       | _phpDocumentor\Reflection\DocBlock\Tag&#124;null_                  |                                    | [📢](# "Visibility: public") |
| [hasTag](#spaceonfire_apidoc_element_docblock_docblock_hastag)                             | _bool_                                                             |                                    | [📢](# "Visibility: public") |
| [getTagsGroupedByName](#spaceonfire_apidoc_element_docblock_docblock_gettagsgroupedbyname) | _array<string,phpDocumentor\Reflection\DocBlock\Tag[]>&#124;array_ |                                    | [📢](# "Visibility: public") |
| [hasInheritTag](#spaceonfire_apidoc_element_docblock_docblock_hasinherittag)               | _bool_                                                             |                                    | [📢](# "Visibility: public") |

## Methods

<a name="spaceonfire_apidoc_element_docblock_docblock_construct"></a>

### \_\_construct()

DocBlock constructor.

-   **Visibility**: public

| Param          | Type                                                    | Reference | Description |
| -------------- | ------------------------------------------------------- | --------- | ----------- |
| `$summary`     | _string_                                                | No        |             |
| `$description` | _string_                                                | No        |             |
| `$tags`        | _phpDocumentor\Reflection\DocBlock\Tag[]&#124;iterable_ | No        |             |

```php
public function __construct(string $summary, string $description, phpDocumentor\Reflection\DocBlock\Tag[]|iterable $tags = [])
```

File location: `Element/DocBlock/DocBlock.php:33`

<a name="spaceonfire_apidoc_element_docblock_docblock_getsummary"></a>

### getSummary()

Getter for `summary` property.

-   **Visibility**: public

| Param      | Type     | Reference | Description |
| ---------- | -------- | --------- | ----------- |
| **Return** | _string_ |           |             |

```php
public function getSummary(): string
```

File location: `Element/DocBlock/DocBlock.php:69`

<a name="spaceonfire_apidoc_element_docblock_docblock_getdescription"></a>

### getDescription()

Getter for `description` property.

-   **Visibility**: public

| Param      | Type     | Reference | Description |
| ---------- | -------- | --------- | ----------- |
| **Return** | _string_ |           |             |

```php
public function getDescription(): string
```

File location: `Element/DocBlock/DocBlock.php:78`

<a name="spaceonfire_apidoc_element_docblock_docblock_gettags"></a>

### getTags()

Getter for `tags` property.

-   **Visibility**: public

| Param      | Type                                                     | Reference | Description |
| ---------- | -------------------------------------------------------- | --------- | ----------- |
| **Return** | _phpDocumentor\Reflection\DocBlock\Tag[]&#124;Generator_ |           |             |

```php
public function getTags(): phpDocumentor\Reflection\DocBlock\Tag[]|Generator
```

File location: `Element/DocBlock/DocBlock.php:87`

<a name="spaceonfire_apidoc_element_docblock_docblock_gettagsbyname"></a>

### getTagsByName()

-   **Visibility**: public

| Param      | Type                                                     | Reference | Description |
| ---------- | -------------------------------------------------------- | --------- | ----------- |
| `$tagName` | _string_                                                 | No        |             |
| **Return** | _phpDocumentor\Reflection\DocBlock\Tag[]&#124;Generator_ |           |             |

```php
public function getTagsByName(string $tagName): phpDocumentor\Reflection\DocBlock\Tag[]|Generator
```

File location: `Element/DocBlock/DocBlock.php:100`

<a name="spaceonfire_apidoc_element_docblock_docblock_getfirsttagbyname"></a>

### getFirstTagByName()

-   **Visibility**: public

| Param      | Type                                              | Reference | Description |
| ---------- | ------------------------------------------------- | --------- | ----------- |
| `$tagName` | _string_                                          | No        |             |
| **Return** | _phpDocumentor\Reflection\DocBlock\Tag&#124;null_ |           |             |

```php
public function getFirstTagByName(string $tagName): phpDocumentor\Reflection\DocBlock\Tag|null
```

File location: `Element/DocBlock/DocBlock.php:111`

<a name="spaceonfire_apidoc_element_docblock_docblock_hastag"></a>

### hasTag()

-   **Visibility**: public

| Param      | Type     | Reference | Description |
| ---------- | -------- | --------- | ----------- |
| `$tagName` | _string_ | No        |             |
| **Return** | _bool_   |           |             |

```php
public function hasTag(string $tagName): bool
```

File location: `Element/DocBlock/DocBlock.php:120`

<a name="spaceonfire_apidoc_element_docblock_docblock_gettagsgroupedbyname"></a>

### getTagsGroupedByName()

-   **Visibility**: public

| Param      | Type                                                               | Reference | Description |
| ---------- | ------------------------------------------------------------------ | --------- | ----------- |
| **Return** | _array<string,phpDocumentor\Reflection\DocBlock\Tag[]>&#124;array_ |           |             |

```php
public function getTagsGroupedByName(): array<string,phpDocumentor\Reflection\DocBlock\Tag[]>|array
```

File location: `Element/DocBlock/DocBlock.php:128`

<a name="spaceonfire_apidoc_element_docblock_docblock_hasinherittag"></a>

### hasInheritTag()

-   **Visibility**: public

| Param      | Type   | Reference | Description |
| ---------- | ------ | --------- | ----------- |
| **Return** | _bool_ |           |             |

```php
public function hasInheritTag(): bool
```

File location: `Element/DocBlock/DocBlock.php:133`

---

This file automatically generated by [SpaceOnFire ApiDoc](https://github.com/spaceonfire/apidoc)
