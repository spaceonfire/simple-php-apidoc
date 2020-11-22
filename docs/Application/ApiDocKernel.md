# Class ApiDocKernel

Full name: `spaceonfire\ApiDoc\Application\ApiDocKernel`

## Class members

| Name                                                                                                    | Type                                       | Summary                               | Additional                   |
| ------------------------------------------------------------------------------------------------------- | ------------------------------------------ | ------------------------------------- | ---------------------------- |
| _Methods_                                                                                               |                                            |                                       |                              |
| [\_\_construct](#spaceonfire_apidoc_application_apidockernel_construct)                                 |                                            |                                       | [📢](# "Visibility: public") |
| [getContainer](#spaceonfire_apidoc_application_apidockernel_getcontainer)                               | _spaceonfire\Container\CompositeContainer_ | Returns the container                 | [📢](# "Visibility: public") |
| [isDebugModeEnabled](#spaceonfire_apidoc_application_apidockernel_isdebugmodeenabled)                   | _bool_                                     | Running debug mode?                   | [📢](# "Visibility: public") |
| [configureConsoleApplication](#spaceonfire_apidoc_application_apidockernel_configureconsoleapplication) | _void_                                     | Configure symfony/console application | [📢](# "Visibility: public") |

## Methods

<a name="spaceonfire_apidoc_application_apidockernel_construct"></a>

### \_\_construct()

-   **Visibility**: public

| Param               | Type   | Reference | Description |
| ------------------- | ------ | --------- | ----------- |
| `$debugModeEnabled` | _bool_ | No        |             |

```php
public function __construct(bool $debugModeEnabled = false)
```

File location: `Application/ApiDocKernel.php:29`

<a name="spaceonfire_apidoc_application_apidockernel_getcontainer"></a>

### getContainer()

Returns the container

-   **Visibility**: public

| Param      | Type                                       | Reference | Description |
| ---------- | ------------------------------------------ | --------- | ----------- |
| **Return** | _spaceonfire\Container\CompositeContainer_ |           |             |

```php
public function getContainer(): spaceonfire\Container\CompositeContainer
```

File location: `Application/ApiDocKernel.php:71`

<a name="spaceonfire_apidoc_application_apidockernel_isdebugmodeenabled"></a>

### isDebugModeEnabled()

Running debug mode?

-   **Visibility**: public

| Param      | Type   | Reference | Description |
| ---------- | ------ | --------- | ----------- |
| **Return** | _bool_ |           |             |

```php
public function isDebugModeEnabled(): bool
```

File location: `Application/ApiDocKernel.php:80`

<a name="spaceonfire_apidoc_application_apidockernel_configureconsoleapplication"></a>

### configureConsoleApplication()

Configure symfony/console application

-   **Visibility**: public

| Param      | Type                                               | Reference | Description |
| ---------- | -------------------------------------------------- | --------- | ----------- |
| `$app`     | _Symfony\Component\Console\Application_            | No        |             |
| `$input`   | _Symfony\Component\Console\Input\InputInterface_   | No        |             |
| `$output`  | _Symfony\Component\Console\Output\OutputInterface_ | No        |             |
| **Return** | _void_                                             |           |             |

```php
public function configureConsoleApplication(Symfony\Component\Console\Application $app, Symfony\Component\Console\Input\InputInterface $input, Symfony\Component\Console\Output\OutputInterface $output): void
```

File location: `Application/ApiDocKernel.php:91`

---

This file automatically generated by [SpaceOnFire ApiDoc](https://github.com/spaceonfire/apidoc)