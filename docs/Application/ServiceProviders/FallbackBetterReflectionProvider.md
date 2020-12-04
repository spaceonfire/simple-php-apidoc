# Class FallbackBetterReflectionProvider

Full name: `spaceonfire\ApiDoc\Application\ServiceProviders\FallbackBetterReflectionProvider`

Parent class name: `spaceonfire\Container\ServiceProvider\AbstractServiceProvider`

This class implements:

-   `spaceonfire\Container\ServiceProvider\ServiceProviderInterface`
-   `spaceonfire\Container\ContainerAwareInterface`

## Class members

| Name                                                                                                   | Type                                                                                                                                | Summary                                                                                                                                                           | Additional                   |
| ------------------------------------------------------------------------------------------------------ | ----------------------------------------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------------------------------------------------------------------- | ---------------------------- |
| _Methods_                                                                                              |                                                                                                                                     |                                                                                                                                                                   |                              |
| [provides](#spaceonfire_apidoc_application_serviceproviders_fallbackbetterreflectionprovider_provides) | _string[]&#124;array_                                                                                                               | Returns list of services provided by current provider.                                                                                                            | [📢](# "Visibility: public") |
| [register](#spaceonfire_apidoc_application_serviceproviders_fallbackbetterreflectionprovider_register) | _void_                                                                                                                              | Use the register method to register items with the container.                                                                                                     | [📢](# "Visibility: public") |
| [setIdentifier](#spaceonfire_container_serviceprovider_abstractserviceprovider_setidentifier)          | _spaceonfire\Container\ServiceProvider\AbstractServiceProvider&#124;spaceonfire\Container\ServiceProvider\ServiceProviderInterface_ | Set a custom id for the service provider. This allows to register the same service provider multiple times.                                                       | [📢](# "Visibility: public") |
| [getIdentifier](#spaceonfire_container_serviceprovider_abstractserviceprovider_getidentifier)          | _string_                                                                                                                            | The id of the service provider uniquely identifies it, so that we can quickly determine if it has already been<br>registered. Defaults to class name of provider. | [📢](# "Visibility: public") |
| [setContainer](#spaceonfire_container_containerawaretrait_setcontainer)                                | _spaceonfire\Container\ContainerAwareInterface_                                                                                     |                                                                                                                                                                   | [📢](# "Visibility: public") |
| [getContainer](#spaceonfire_container_containerawaretrait_getcontainer)                                | _spaceonfire\Container\ContainerInterface_                                                                                          |                                                                                                                                                                   | [📢](# "Visibility: public") |

## Methods

<a name="spaceonfire_apidoc_application_serviceproviders_fallbackbetterreflectionprovider_provides"></a>

### provides()

Returns list of services provided by current provider.

-   **Visibility**: public

| Param      | Type                  | Reference | Description |
| ---------- | --------------------- | --------- | ----------- |
| **Return** | _string[]&#124;array_ |           |             |

```php
public function provides(): string[]|array
```

File location: `Application/ServiceProviders/FallbackBetterReflectionProvider.php:16`

<a name="spaceonfire_apidoc_application_serviceproviders_fallbackbetterreflectionprovider_register"></a>

### register()

Use the register method to register items with the container.

-   **Visibility**: public

| Param      | Type   | Reference | Description |
| ---------- | ------ | --------- | ----------- |
| **Return** | _void_ |           |             |

```php
public function register(): void
```

File location: `Application/ServiceProviders/FallbackBetterReflectionProvider.php:26`

<a name="spaceonfire_container_serviceprovider_abstractserviceprovider_setidentifier"></a>

### setIdentifier()

Set a custom id for the service provider. This allows to register the same service provider multiple times.

-   **Visibility**: public

| Param      | Type                                                                                                                                | Reference | Description |
| ---------- | ----------------------------------------------------------------------------------------------------------------------------------- | --------- | ----------- |
| `$id`      | _string_                                                                                                                            | No        |             |
| **Return** | _spaceonfire\Container\ServiceProvider\AbstractServiceProvider&#124;spaceonfire\Container\ServiceProvider\ServiceProviderInterface_ |           |             |

```php
public function setIdentifier(string $id): spaceonfire\Container\ServiceProvider\AbstractServiceProvider|spaceonfire\Container\ServiceProvider\ServiceProviderInterface
```

File location: `/var/www/html/vendor/composer/../spaceonfire/container/src/ServiceProvider/AbstractServiceProvider.php:21`

<a name="spaceonfire_container_serviceprovider_abstractserviceprovider_getidentifier"></a>

### getIdentifier()

The id of the service provider uniquely identifies it, so that we can quickly determine if it has already been
registered. Defaults to class name of provider.

-   **Visibility**: public

| Param      | Type     | Reference | Description |
| ---------- | -------- | --------- | ----------- |
| **Return** | _string_ |           |             |

```php
public function getIdentifier(): string
```

File location: `/var/www/html/vendor/composer/../spaceonfire/container/src/ServiceProvider/AbstractServiceProvider.php:30`

<a name="spaceonfire_container_containerawaretrait_setcontainer"></a>

### setContainer()

@inheritdoc

-   **Visibility**: public

| Param        | Type                                            | Reference | Description |
| ------------ | ----------------------------------------------- | --------- | ----------- |
| `$container` | _spaceonfire\Container\ContainerInterface_      | No        |             |
| **Return**   | _spaceonfire\Container\ContainerAwareInterface_ |           |             |

```php
public function setContainer(spaceonfire\Container\ContainerInterface $container): spaceonfire\Container\ContainerAwareInterface
```

File location: `/var/www/html/vendor/composer/../spaceonfire/container/src/ContainerAwareTrait.php:17`

<a name="spaceonfire_container_containerawaretrait_getcontainer"></a>

### getContainer()

@inheritdoc

-   **Visibility**: public

| Param      | Type                                       | Reference | Description |
| ---------- | ------------------------------------------ | --------- | ----------- |
| **Return** | _spaceonfire\Container\ContainerInterface_ |           |             |

```php
public function getContainer(): spaceonfire\Container\ContainerInterface
```

File location: `/var/www/html/vendor/composer/../spaceonfire/container/src/ContainerAwareTrait.php:26`

---

This file automatically generated by [SpaceOnFire ApiDoc](https://github.com/spaceonfire/apidoc)
