# Class ConfigProvider

Full name: `spaceonfire\ApiDoc\Application\ServiceProviders\ConfigProvider`

Parent class name: `spaceonfire\Container\ServiceProvider\AbstractServiceProvider`

This class implements:

-   `spaceonfire\Container\ServiceProvider\ServiceProviderInterface`
-   `spaceonfire\Container\ContainerAwareInterface`

## Class members

| Name                                                                                                                                 | Type                                                                                                                                | Summary                                                                                                                                                           | Additional                   |
| ------------------------------------------------------------------------------------------------------------------------------------ | ----------------------------------------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------------------------------------------------------------------- | ---------------------------- |
| _Methods_                                                                                                                            |                                                                                                                                     |                                                                                                                                                                   |                              |
| [provides](#spaceonfire_apidoc_application_serviceproviders_configprovider_provides)                                                 | _string[]&#124;array_                                                                                                               | Returns list of services provided by current provider.                                                                                                            | [📢](# "Visibility: public") |
| [register](#spaceonfire_apidoc_application_serviceproviders_configprovider_register)                                                 | _void_                                                                                                                              | Use the register method to register items with the container.                                                                                                     | [📢](# "Visibility: public") |
| [makeConfig](#spaceonfire_apidoc_application_serviceproviders_configprovider_makeconfig)                                             | _spaceonfire\ApiDoc\Config\Config_                                                                                                  |                                                                                                                                                                   | [📢](# "Visibility: public") |
| [makePhpParser](#spaceonfire_apidoc_application_serviceproviders_configprovider_makephpparser)                                       | _PhpParser\Parser_                                                                                                                  |                                                                                                                                                                   | [📢](# "Visibility: public") |
| [makeBetterReflection](#spaceonfire_apidoc_application_serviceproviders_configprovider_makebetterreflection)                         | _Roave\BetterReflection\BetterReflection_                                                                                           |                                                                                                                                                                   | [📢](# "Visibility: public") |
| [makeSourceLocator](#spaceonfire_apidoc_application_serviceproviders_configprovider_makesourcelocator)                               | _Roave\BetterReflection\SourceLocator\Type\SourceLocator_                                                                           |                                                                                                                                                                   | [📢](# "Visibility: public") |
| [makeClassReflector](#spaceonfire_apidoc_application_serviceproviders_configprovider_makeclassreflector)                             | _Roave\BetterReflection\Reflector\ClassReflector_                                                                                   |                                                                                                                                                                   | [📢](# "Visibility: public") |
| [makeFunctionReflector](#spaceonfire_apidoc_application_serviceproviders_configprovider_makefunctionreflector)                       | _Roave\BetterReflection\Reflector\FunctionReflector_                                                                                |                                                                                                                                                                   | [📢](# "Visibility: public") |
| [makeConstantReflector](#spaceonfire_apidoc_application_serviceproviders_configprovider_makeconstantreflector)                       | _Roave\BetterReflection\Reflector\ConstantReflector_                                                                                |                                                                                                                                                                   | [📢](# "Visibility: public") |
| [makeFilenameStrategy](#spaceonfire_apidoc_application_serviceproviders_configprovider_makefilenamestrategy)                         | _spaceonfire\ApiDoc\Generator\FileNameStrategyInterface_                                                                            |                                                                                                                                                                   | [📢](# "Visibility: public") |
| [makePersister](#spaceonfire_apidoc_application_serviceproviders_configprovider_makepersister)                                       | _spaceonfire\ApiDoc\Generator\PersisterInterface_                                                                                   |                                                                                                                                                                   | [📢](# "Visibility: public") |
| [makeTwig](#spaceonfire_apidoc_application_serviceproviders_configprovider_maketwig)                                                 | _Twig\Environment_                                                                                                                  |                                                                                                                                                                   | [📢](# "Visibility: public") |
| [makeExampleCodeSnippetResolver](#spaceonfire_apidoc_application_serviceproviders_configprovider_makeexamplecodesnippetresolver)     | _spaceonfire\ApiDoc\Element\Example\ExampleCodeSnippetResolver_                                                                     |                                                                                                                                                                   | [📢](# "Visibility: public") |
| [makeLocationFactory](#spaceonfire_apidoc_application_serviceproviders_configprovider_makelocationfactory)                           | _spaceonfire\ApiDoc\Element\Location\LocationFactory_                                                                               |                                                                                                                                                                   | [📢](# "Visibility: public") |
| [makeClassMembersVisibilityFilter](#spaceonfire_apidoc_application_serviceproviders_configprovider_makeclassmembersvisibilityfilter) | _spaceonfire\ApiDoc\Element\ValueObject\ClassMembersVisibilityFilter_                                                               |                                                                                                                                                                   | [📢](# "Visibility: public") |
| [setIdentifier](#spaceonfire_container_serviceprovider_abstractserviceprovider_setidentifier)                                        | _spaceonfire\Container\ServiceProvider\AbstractServiceProvider&#124;spaceonfire\Container\ServiceProvider\ServiceProviderInterface_ | Set a custom id for the service provider. This allows to register the same service provider multiple times.                                                       | [📢](# "Visibility: public") |
| [getIdentifier](#spaceonfire_container_serviceprovider_abstractserviceprovider_getidentifier)                                        | _string_                                                                                                                            | The id of the service provider uniquely identifies it, so that we can quickly determine if it has already been<br>registered. Defaults to class name of provider. | [📢](# "Visibility: public") |
| [setContainer](#spaceonfire_container_containerawaretrait_setcontainer)                                                              | _spaceonfire\Container\ContainerAwareInterface_                                                                                     |                                                                                                                                                                   | [📢](# "Visibility: public") |
| [getContainer](#spaceonfire_container_containerawaretrait_getcontainer)                                                              | _spaceonfire\Container\ContainerInterface_                                                                                          |                                                                                                                                                                   | [📢](# "Visibility: public") |

## Methods

<a name="spaceonfire_apidoc_application_serviceproviders_configprovider_provides"></a>

### provides()

Returns list of services provided by current provider.

-   **Visibility**: public

| Param      | Type                  | Reference | Description |
| ---------- | --------------------- | --------- | ----------- |
| **Return** | _string[]&#124;array_ |           |             |

```php
public function provides(): string[]|array
```

File location: `Application/ServiceProviders/ConfigProvider.php:55`

<a name="spaceonfire_apidoc_application_serviceproviders_configprovider_register"></a>

### register()

Use the register method to register items with the container.

-   **Visibility**: public

| Param      | Type   | Reference | Description |
| ---------- | ------ | --------- | ----------- |
| **Return** | _void_ |           |             |

```php
public function register(): void
```

File location: `Application/ServiceProviders/ConfigProvider.php:79`

<a name="spaceonfire_apidoc_application_serviceproviders_configprovider_makeconfig"></a>

### makeConfig()

-   **Visibility**: public

| Param      | Type                               | Reference | Description |
| ---------- | ---------------------------------- | --------- | ----------- |
| **Return** | _spaceonfire\ApiDoc\Config\Config_ |           |             |

```php
public function makeConfig(): spaceonfire\ApiDoc\Config\Config
```

File location: `Application/ServiceProviders/ConfigProvider.php:100`

<a name="spaceonfire_apidoc_application_serviceproviders_configprovider_makephpparser"></a>

### makePhpParser()

-   **Visibility**: public

| Param      | Type                               | Reference | Description |
| ---------- | ---------------------------------- | --------- | ----------- |
| `$config`  | _spaceonfire\ApiDoc\Config\Config_ | No        |             |
| **Return** | _PhpParser\Parser_                 |           |             |

```php
public function makePhpParser(spaceonfire\ApiDoc\Config\Config $config): PhpParser\Parser
```

File location: `Application/ServiceProviders/ConfigProvider.php:160`

<a name="spaceonfire_apidoc_application_serviceproviders_configprovider_makebetterreflection"></a>

### makeBetterReflection()

-   **Visibility**: public

| Param        | Type                                      | Reference | Description |
| ------------ | ----------------------------------------- | --------- | ----------- |
| `$phpParser` | _PhpParser\Parser_                        | No        |             |
| **Return**   | _Roave\BetterReflection\BetterReflection_ |           |             |

```php
public function makeBetterReflection(PhpParser\Parser $phpParser): Roave\BetterReflection\BetterReflection
```

File location: `Application/ServiceProviders/ConfigProvider.php:170`

<a name="spaceonfire_apidoc_application_serviceproviders_configprovider_makesourcelocator"></a>

### makeSourceLocator()

-   **Visibility**: public

| Param               | Type                                                      | Reference | Description |
| ------------------- | --------------------------------------------------------- | --------- | ----------- |
| `$config`           | _spaceonfire\ApiDoc\Config\Config_                        | No        |             |
| `$betterReflection` | _Roave\BetterReflection\BetterReflection_                 | No        |             |
| **Return**          | _Roave\BetterReflection\SourceLocator\Type\SourceLocator_ |           |             |

```php
public function makeSourceLocator(spaceonfire\ApiDoc\Config\Config $config, Roave\BetterReflection\BetterReflection $betterReflection): Roave\BetterReflection\SourceLocator\Type\SourceLocator
```

File location: `Application/ServiceProviders/ConfigProvider.php:181`

<a name="spaceonfire_apidoc_application_serviceproviders_configprovider_makeclassreflector"></a>

### makeClassReflector()

-   **Visibility**: public

| Param            | Type                                                      | Reference | Description |
| ---------------- | --------------------------------------------------------- | --------- | ----------- |
| `$sourceLocator` | _Roave\BetterReflection\SourceLocator\Type\SourceLocator_ | No        |             |
| **Return**       | _Roave\BetterReflection\Reflector\ClassReflector_         |           |             |

```php
public function makeClassReflector(Roave\BetterReflection\SourceLocator\Type\SourceLocator $sourceLocator): Roave\BetterReflection\Reflector\ClassReflector
```

File location: `Application/ServiceProviders/ConfigProvider.php:210`

<a name="spaceonfire_apidoc_application_serviceproviders_configprovider_makefunctionreflector"></a>

### makeFunctionReflector()

-   **Visibility**: public

| Param             | Type                                                      | Reference | Description |
| ----------------- | --------------------------------------------------------- | --------- | ----------- |
| `$sourceLocator`  | _Roave\BetterReflection\SourceLocator\Type\SourceLocator_ | No        |             |
| `$classReflector` | _Roave\BetterReflection\Reflector\ClassReflector_         | No        |             |
| **Return**        | _Roave\BetterReflection\Reflector\FunctionReflector_      |           |             |

```php
public function makeFunctionReflector(Roave\BetterReflection\SourceLocator\Type\SourceLocator $sourceLocator, Roave\BetterReflection\Reflector\ClassReflector $classReflector): Roave\BetterReflection\Reflector\FunctionReflector
```

File location: `Application/ServiceProviders/ConfigProvider.php:215`

<a name="spaceonfire_apidoc_application_serviceproviders_configprovider_makeconstantreflector"></a>

### makeConstantReflector()

-   **Visibility**: public

| Param             | Type                                                      | Reference | Description |
| ----------------- | --------------------------------------------------------- | --------- | ----------- |
| `$sourceLocator`  | _Roave\BetterReflection\SourceLocator\Type\SourceLocator_ | No        |             |
| `$classReflector` | _Roave\BetterReflection\Reflector\ClassReflector_         | No        |             |
| **Return**        | _Roave\BetterReflection\Reflector\ConstantReflector_      |           |             |

```php
public function makeConstantReflector(Roave\BetterReflection\SourceLocator\Type\SourceLocator $sourceLocator, Roave\BetterReflection\Reflector\ClassReflector $classReflector): Roave\BetterReflection\Reflector\ConstantReflector
```

File location: `Application/ServiceProviders/ConfigProvider.php:222`

<a name="spaceonfire_apidoc_application_serviceproviders_configprovider_makefilenamestrategy"></a>

### makeFilenameStrategy()

-   **Visibility**: public

| Param      | Type                                                     | Reference | Description |
| ---------- | -------------------------------------------------------- | --------- | ----------- |
| `$config`  | _spaceonfire\ApiDoc\Config\Config_                       | No        |             |
| **Return** | _spaceonfire\ApiDoc\Generator\FileNameStrategyInterface_ |           |             |

```php
public function makeFilenameStrategy(spaceonfire\ApiDoc\Config\Config $config): spaceonfire\ApiDoc\Generator\FileNameStrategyInterface
```

File location: `Application/ServiceProviders/ConfigProvider.php:229`

<a name="spaceonfire_apidoc_application_serviceproviders_configprovider_makepersister"></a>

### makePersister()

-   **Visibility**: public

| Param      | Type                                              | Reference | Description |
| ---------- | ------------------------------------------------- | --------- | ----------- |
| `$config`  | _spaceonfire\ApiDoc\Config\Config_                | No        |             |
| **Return** | _spaceonfire\ApiDoc\Generator\PersisterInterface_ |           |             |

```php
public function makePersister(spaceonfire\ApiDoc\Config\Config $config): spaceonfire\ApiDoc\Generator\PersisterInterface
```

File location: `Application/ServiceProviders/ConfigProvider.php:234`

<a name="spaceonfire_apidoc_application_serviceproviders_configprovider_maketwig"></a>

### makeTwig()

-   **Visibility**: public

| Param      | Type                               | Reference | Description |
| ---------- | ---------------------------------- | --------- | ----------- |
| `$config`  | _spaceonfire\ApiDoc\Config\Config_ | No        |             |
| **Return** | _Twig\Environment_                 |           |             |

```php
public function makeTwig(spaceonfire\ApiDoc\Config\Config $config): Twig\Environment
```

File location: `Application/ServiceProviders/ConfigProvider.php:239`

<a name="spaceonfire_apidoc_application_serviceproviders_configprovider_makeexamplecodesnippetresolver"></a>

### makeExampleCodeSnippetResolver()

-   **Visibility**: public

| Param      | Type                                                            | Reference | Description |
| ---------- | --------------------------------------------------------------- | --------- | ----------- |
| `$config`  | _spaceonfire\ApiDoc\Config\Config_                              | No        |             |
| **Return** | _spaceonfire\ApiDoc\Element\Example\ExampleCodeSnippetResolver_ |           |             |

```php
public function makeExampleCodeSnippetResolver(spaceonfire\ApiDoc\Config\Config $config): spaceonfire\ApiDoc\Element\Example\ExampleCodeSnippetResolver
```

File location: `Application/ServiceProviders/ConfigProvider.php:255`

<a name="spaceonfire_apidoc_application_serviceproviders_configprovider_makelocationfactory"></a>

### makeLocationFactory()

-   **Visibility**: public

| Param      | Type                                                  | Reference | Description |
| ---------- | ----------------------------------------------------- | --------- | ----------- |
| `$config`  | _spaceonfire\ApiDoc\Config\Config_                    | No        |             |
| **Return** | _spaceonfire\ApiDoc\Element\Location\LocationFactory_ |           |             |

```php
public function makeLocationFactory(spaceonfire\ApiDoc\Config\Config $config): spaceonfire\ApiDoc\Element\Location\LocationFactory
```

File location: `Application/ServiceProviders/ConfigProvider.php:260`

<a name="spaceonfire_apidoc_application_serviceproviders_configprovider_makeclassmembersvisibilityfilter"></a>

### makeClassMembersVisibilityFilter()

-   **Visibility**: public

| Param      | Type                                                                  | Reference | Description |
| ---------- | --------------------------------------------------------------------- | --------- | ----------- |
| `$config`  | _spaceonfire\ApiDoc\Config\Config_                                    | No        |             |
| **Return** | _spaceonfire\ApiDoc\Element\ValueObject\ClassMembersVisibilityFilter_ |           |             |

```php
public function makeClassMembersVisibilityFilter(spaceonfire\ApiDoc\Config\Config $config): spaceonfire\ApiDoc\Element\ValueObject\ClassMembersVisibilityFilter
```

File location: `Application/ServiceProviders/ConfigProvider.php:265`

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
