# Class DocBlockFactory

Full name: `spaceonfire\ApiDoc\Element\DocBlock\Factory\DocBlockFactory`

This class implements: `spaceonfire\ApiDoc\Element\DocBlock\Factory\DocBlockFactoryInterface`

## Class members

| Name                                                                                    | Type                                           | Summary                                                  | Additional                   |
| --------------------------------------------------------------------------------------- | ---------------------------------------------- | -------------------------------------------------------- | ---------------------------- |
| _Methods_                                                                               |                                                |                                                          |                              |
| [\_\_construct](#spaceonfire_apidoc_element_docblock_factory_docblockfactory_construct) |                                                |                                                          | [📢](# "Visibility: public") |
| [make](#spaceonfire_apidoc_element_docblock_factory_docblockfactory_make)               | _spaceonfire\ApiDoc\Element\DocBlock\DocBlock_ | Creates ApiDoc's DocBlock object from reflection object. | [📢](# "Visibility: public") |

## Methods

<a name="spaceonfire_apidoc_element_docblock_factory_docblockfactory_construct"></a>

### \_\_construct()

-   **Visibility**: public

| Param              | Type                                       | Reference | Description |
| ------------------ | ------------------------------------------ | --------- | ----------- |
| `$docBlockFactory` | _phpDocumentor\Reflection\DocBlockFactory_ | No        |             |

```php
public function __construct(phpDocumentor\Reflection\DocBlockFactory $docBlockFactory)
```

File location: `Element/DocBlock/Factory/DocBlockFactory.php:28`

<a name="spaceonfire_apidoc_element_docblock_factory_docblockfactory_make"></a>

### make()

Creates ApiDoc's DocBlock object from reflection object.

-   **Visibility**: public

| Param         | Type                                           | Reference | Description |
| ------------- | ---------------------------------------------- | --------- | ----------- |
| `$reflection` | _object_                                       | No        |             |
| **Return**    | _spaceonfire\ApiDoc\Element\DocBlock\DocBlock_ |           |             |

```php
public function make(object $reflection): spaceonfire\ApiDoc\Element\DocBlock\DocBlock
```

File location: `Element/DocBlock/Factory/DocBlockFactory.php:37`

---

This file automatically generated by [SpaceOnFire ApiDoc](https://github.com/spaceonfire/apidoc)