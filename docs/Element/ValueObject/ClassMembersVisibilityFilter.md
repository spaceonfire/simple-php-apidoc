# Class ClassMembersVisibilityFilter

Full name: `spaceonfire\ApiDoc\Element\ValueObject\ClassMembersVisibilityFilter`

## Class members

| Name                                                                                                | Type                                                      | Summary                                           | Additional                   |
| --------------------------------------------------------------------------------------------------- | --------------------------------------------------------- | ------------------------------------------------- | ---------------------------- |
| _Methods_                                                                                           |                                                           |                                                   |                              |
| [\_\_construct](#spaceonfire_apidoc_element_valueobject_classmembersvisibilityfilter_construct)     |                                                           | ClassMembersVisibilityFilter constructor.         | [📢](# "Visibility: public") |
| [forConstants](#spaceonfire_apidoc_element_valueobject_classmembersvisibilityfilter_forconstants)   | _spaceonfire\ApiDoc\Element\ValueObject\VisibilityFilter_ | Getter for `constantsVisibilityFilter` property.  | [📢](# "Visibility: public") |
| [forProperties](#spaceonfire_apidoc_element_valueobject_classmembersvisibilityfilter_forproperties) | _spaceonfire\ApiDoc\Element\ValueObject\VisibilityFilter_ | Getter for `propertiesVisibilityFilter` property. | [📢](# "Visibility: public") |
| [forMethods](#spaceonfire_apidoc_element_valueobject_classmembersvisibilityfilter_formethods)       | _spaceonfire\ApiDoc\Element\ValueObject\VisibilityFilter_ | Getter for `methodsVisibilityFilter` property.    | [📢](# "Visibility: public") |

## Methods

<a name="spaceonfire_apidoc_element_valueobject_classmembersvisibilityfilter_construct"></a>

### \_\_construct()

ClassMembersVisibilityFilter constructor.

-   **Visibility**: public

| Param                         | Type                                                                | Reference | Description |
| ----------------------------- | ------------------------------------------------------------------- | --------- | ----------- |
| `$defaultVisibilityFilter`    | _spaceonfire\ApiDoc\Element\ValueObject\VisibilityFilter_           | No        |             |
| `$constantsVisibilityFilter`  | _spaceonfire\ApiDoc\Element\ValueObject\VisibilityFilter&#124;null_ | No        |             |
| `$propertiesVisibilityFilter` | _spaceonfire\ApiDoc\Element\ValueObject\VisibilityFilter&#124;null_ | No        |             |
| `$methodsVisibilityFilter`    | _spaceonfire\ApiDoc\Element\ValueObject\VisibilityFilter&#124;null_ | No        |             |

```php
public function __construct(spaceonfire\ApiDoc\Element\ValueObject\VisibilityFilter $defaultVisibilityFilter, spaceonfire\ApiDoc\Element\ValueObject\VisibilityFilter|null $constantsVisibilityFilter = null, spaceonfire\ApiDoc\Element\ValueObject\VisibilityFilter|null $propertiesVisibilityFilter = null, spaceonfire\ApiDoc\Element\ValueObject\VisibilityFilter|null $methodsVisibilityFilter = null)
```

File location: `Element/ValueObject/ClassMembersVisibilityFilter.php:29`

<a name="spaceonfire_apidoc_element_valueobject_classmembersvisibilityfilter_forconstants"></a>

### forConstants()

Getter for `constantsVisibilityFilter` property.

-   **Visibility**: public

| Param      | Type                                                      | Reference | Description |
| ---------- | --------------------------------------------------------- | --------- | ----------- |
| **Return** | _spaceonfire\ApiDoc\Element\ValueObject\VisibilityFilter_ |           |             |

```php
public function forConstants(): spaceonfire\ApiDoc\Element\ValueObject\VisibilityFilter
```

File location: `Element/ValueObject/ClassMembersVisibilityFilter.php:44`

<a name="spaceonfire_apidoc_element_valueobject_classmembersvisibilityfilter_forproperties"></a>

### forProperties()

Getter for `propertiesVisibilityFilter` property.

-   **Visibility**: public

| Param      | Type                                                      | Reference | Description |
| ---------- | --------------------------------------------------------- | --------- | ----------- |
| **Return** | _spaceonfire\ApiDoc\Element\ValueObject\VisibilityFilter_ |           |             |

```php
public function forProperties(): spaceonfire\ApiDoc\Element\ValueObject\VisibilityFilter
```

File location: `Element/ValueObject/ClassMembersVisibilityFilter.php:53`

<a name="spaceonfire_apidoc_element_valueobject_classmembersvisibilityfilter_formethods"></a>

### forMethods()

Getter for `methodsVisibilityFilter` property.

-   **Visibility**: public

| Param      | Type                                                      | Reference | Description |
| ---------- | --------------------------------------------------------- | --------- | ----------- |
| **Return** | _spaceonfire\ApiDoc\Element\ValueObject\VisibilityFilter_ |           |             |

```php
public function forMethods(): spaceonfire\ApiDoc\Element\ValueObject\VisibilityFilter
```

File location: `Element/ValueObject/ClassMembersVisibilityFilter.php:62`

---

This file automatically generated by [SpaceOnFire ApiDoc](https://github.com/spaceonfire/apidoc)
