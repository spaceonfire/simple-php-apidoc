# Class ClassLikeElementFactory

Full name: `spaceonfire\ApiDoc\Element\Factory\ClassLikeElementFactory`

Parent class name: `spaceonfire\ApiDoc\Element\Factory\AbstractElementFactory`

This class implements: `spaceonfire\ApiDoc\Element\Factory\ElementFactoryInterface`

## Class members

| Name                                                                                   | Type                                          | Summary                                                         | Additional                                           |
| -------------------------------------------------------------------------------------- | --------------------------------------------- | --------------------------------------------------------------- | ---------------------------------------------------- |
| _Methods_                                                                              |                                               |                                                                 |                                                      |
| [\_\_construct](#spaceonfire_apidoc_element_factory_classlikeelementfactory_construct) |                                               |                                                                 | [📢](# "Visibility: public")                         |
| [supports](#spaceonfire_apidoc_element_factory_classlikeelementfactory_supports)       | _bool_                                        | Checks that current factory works with given reflection object. | [📢](# "Visibility: public")                         |
| [make](#spaceonfire_apidoc_element_factory_abstractelementfactory_make)                | _spaceonfire\ApiDoc\Element\ElementInterface_ | Creates ApiDoc element from Roave BetterReflection objects.     | [📌](# "Final element") [📢](# "Visibility: public") |
| [setParent](#spaceonfire_apidoc_element_factory_abstractelementfactory_setparent)      | _void_                                        | Sets parent factory.                                            | [📌](# "Final element") [📢](# "Visibility: public") |

## Methods

<a name="spaceonfire_apidoc_element_factory_classlikeelementfactory_construct"></a>

### \_\_construct()

-   **Visibility**: public

| Param                      | Type                                                                            | Reference | Description |
| -------------------------- | ------------------------------------------------------------------------------- | --------- | ----------- |
| `$docBlockResolver`        | _spaceonfire\ApiDoc\Element\DocBlock\Resolver\DocBlockResolverInterface_        | No        |             |
| `$typeFactory`             | _spaceonfire\Type\Factory\TypeFactoryInterface_                                 | No        |             |
| `$locationFactory`         | _spaceonfire\ApiDoc\Element\Location\LocationFactory_                           | No        |             |
| `$membersVisibilityFilter` | _spaceonfire\ApiDoc\Element\ValueObject\ClassMembersVisibilityFilter&#124;null_ | No        |             |

```php
public function __construct(spaceonfire\ApiDoc\Element\DocBlock\Resolver\DocBlockResolverInterface $docBlockResolver, spaceonfire\Type\Factory\TypeFactoryInterface $typeFactory, spaceonfire\ApiDoc\Element\Location\LocationFactory $locationFactory, spaceonfire\ApiDoc\Element\ValueObject\ClassMembersVisibilityFilter|null $membersVisibilityFilter = null)
```

File location: `Element/Factory/ClassLikeElementFactory.php:40`

<a name="spaceonfire_apidoc_element_factory_classlikeelementfactory_supports"></a>

### supports()

Checks that current factory works with given reflection object.

-   **Visibility**: public

| Param         | Type     | Reference | Description |
| ------------- | -------- | --------- | ----------- |
| `$reflection` | _object_ | No        |             |
| **Return**    | _bool_   |           |             |

```php
public function supports(object $reflection): bool
```

File location: `Element/Factory/ClassLikeElementFactory.php:55`

<a name="spaceonfire_apidoc_element_factory_abstractelementfactory_make"></a>

### make()

Creates ApiDoc element from Roave BetterReflection objects.

-   **Final method**: Yes
-   **Visibility**: public

| Param         | Type                                          | Reference | Description |
| ------------- | --------------------------------------------- | --------- | ----------- |
| `$reflection` | _object_                                      | No        |             |
| **Return**    | _spaceonfire\ApiDoc\Element\ElementInterface_ |           |             |

```php
final public function make(object $reflection): spaceonfire\ApiDoc\Element\ElementInterface
```

File location: `/var/www/html/vendor/composer/../../src/Element/Factory/AbstractElementFactory.php:82`

<a name="spaceonfire_apidoc_element_factory_abstractelementfactory_setparent"></a>

### setParent()

Sets parent factory.

-   **Final method**: Yes
-   **Visibility**: public

| Param      | Type                                                                                                                        | Reference | Description |
| ---------- | --------------------------------------------------------------------------------------------------------------------------- | --------- | ----------- |
| `$factory` | _spaceonfire\ApiDoc\Element\Factory\AbstractElementFactory&#124;spaceonfire\ApiDoc\Element\Factory\ElementFactoryInterface_ | No        |             |
| **Return** | _void_                                                                                                                      |           |             |

```php
final public function setParent(spaceonfire\ApiDoc\Element\Factory\AbstractElementFactory|spaceonfire\ApiDoc\Element\Factory\ElementFactoryInterface $factory): void
```

File location: `/var/www/html/vendor/composer/../../src/Element/Factory/AbstractElementFactory.php:100`

---

This file automatically generated by [SpaceOnFire ApiDoc](https://github.com/spaceonfire/apidoc)