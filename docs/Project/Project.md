# Class Project

Full name: `spaceonfire\ApiDoc\Project\Project`

## Class members

| Name                                                                             | Type                                                          | Summary                                  | Additional                   |
| -------------------------------------------------------------------------------- | ------------------------------------------------------------- | ---------------------------------------- | ---------------------------- |
| _Methods_                                                                        |                                                               |                                          |                              |
| [\_\_construct](#spaceonfire_apidoc_project_project_construct)                   |                                                               | Project constructor.                     | [📢](# "Visibility: public") |
| [getName](#spaceonfire_apidoc_project_project_getname)                           | _string_                                                      | Returns project name                     | [📢](# "Visibility: public") |
| [getClassLikeElements](#spaceonfire_apidoc_project_project_getclasslikeelements) | _spaceonfire\ApiDoc\Element\ElementInterface[]&#124;iterable_ | Getter for `classLikeElements` property. | [📢](# "Visibility: public") |
| [getFunctions](#spaceonfire_apidoc_project_project_getfunctions)                 | _spaceonfire\ApiDoc\Element\FunctionsAggregate_               | Getter for `functions` property.         | [📢](# "Visibility: public") |
| [getConstants](#spaceonfire_apidoc_project_project_getconstants)                 | _spaceonfire\ApiDoc\Element\ConstantsAggregate_               | Getter for `constants` property.         | [📢](# "Visibility: public") |
| [getTableOfContents](#spaceonfire_apidoc_project_project_gettableofcontents)     | _spaceonfire\ApiDoc\Element\TableOfContentsElement_           | Getter for `toc` property.               | [📢](# "Visibility: public") |

## Methods

<a name="spaceonfire_apidoc_project_project_construct"></a>

### \_\_construct()

Project constructor.

-   **Visibility**: public

| Param                | Type                                                          | Reference | Description |
| -------------------- | ------------------------------------------------------------- | --------- | ----------- |
| `$name`              | _string_                                                      | No        |             |
| `$classLikeElements` | _spaceonfire\ApiDoc\Element\ElementInterface[]&#124;iterable_ | No        |             |
| `$functions`         | _spaceonfire\ApiDoc\Element\FunctionElement[]&#124;iterable_  | No        |             |
| `$constants`         | _spaceonfire\ApiDoc\Element\ConstantElement[]&#124;iterable_  | No        |             |

```php
public function __construct(string $name, spaceonfire\ApiDoc\Element\ElementInterface[]|iterable $classLikeElements, spaceonfire\ApiDoc\Element\FunctionElement[]|iterable $functions = [], spaceonfire\ApiDoc\Element\ConstantElement[]|iterable $constants = [])
```

File location: `Project/Project.php:44`

<a name="spaceonfire_apidoc_project_project_getname"></a>

### getName()

Returns project name

-   **Visibility**: public

| Param      | Type     | Reference | Description |
| ---------- | -------- | --------- | ----------- |
| **Return** | _string_ |           |             |

```php
public function getName(): string
```

File location: `Project/Project.php:63`

<a name="spaceonfire_apidoc_project_project_getclasslikeelements"></a>

### getClassLikeElements()

Getter for `classLikeElements` property.

-   **Visibility**: public

| Param      | Type                                                          | Reference | Description |
| ---------- | ------------------------------------------------------------- | --------- | ----------- |
| **Return** | _spaceonfire\ApiDoc\Element\ElementInterface[]&#124;iterable_ |           |             |

```php
public function getClassLikeElements(): spaceonfire\ApiDoc\Element\ElementInterface[]|iterable
```

File location: `Project/Project.php:72`

<a name="spaceonfire_apidoc_project_project_getfunctions"></a>

### getFunctions()

Getter for `functions` property.

-   **Visibility**: public

| Param      | Type                                            | Reference | Description |
| ---------- | ----------------------------------------------- | --------- | ----------- |
| **Return** | _spaceonfire\ApiDoc\Element\FunctionsAggregate_ |           |             |

```php
public function getFunctions(): spaceonfire\ApiDoc\Element\FunctionsAggregate
```

File location: `Project/Project.php:81`

<a name="spaceonfire_apidoc_project_project_getconstants"></a>

### getConstants()

Getter for `constants` property.

-   **Visibility**: public

| Param      | Type                                            | Reference | Description |
| ---------- | ----------------------------------------------- | --------- | ----------- |
| **Return** | _spaceonfire\ApiDoc\Element\ConstantsAggregate_ |           |             |

```php
public function getConstants(): spaceonfire\ApiDoc\Element\ConstantsAggregate
```

File location: `Project/Project.php:90`

<a name="spaceonfire_apidoc_project_project_gettableofcontents"></a>

### getTableOfContents()

Getter for `toc` property.

-   **Visibility**: public

| Param      | Type                                                | Reference | Description |
| ---------- | --------------------------------------------------- | --------- | ----------- |
| **Return** | _spaceonfire\ApiDoc\Element\TableOfContentsElement_ |           |             |

```php
public function getTableOfContents(): spaceonfire\ApiDoc\Element\TableOfContentsElement
```

File location: `Project/Project.php:99`

---

This file automatically generated by [SpaceOnFire ApiDoc](https://github.com/spaceonfire/apidoc)
