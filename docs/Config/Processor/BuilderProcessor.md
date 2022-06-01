# Class BuilderProcessor

Full name: `spaceonfire\ApiDoc\Config\Processor\BuilderProcessor`

This class implements: `spaceonfire\ApiDoc\Config\Processor\ProcessorInterface`

## Class members

| Name                                                                                                       | Type                                                   | Summary | Additional                   |
| ---------------------------------------------------------------------------------------------------------- | ------------------------------------------------------ | ------- | ---------------------------- |
| _Properties_                                                                                               |                                                        |         |                              |
| [\$examplesDirectories](#spaceonfire_apidoc_config_processor_builderprocessor_$examplesdirectories)        | _string[]_                                             |         | [📢](# "Visibility: public") |
| [\$visibility](#spaceonfire_apidoc_config_processor_builderprocessor_$visibility)                          | _string[]_                                             |         | [📢](# "Visibility: public") |
| [\$constantsVisibility](#spaceonfire_apidoc_config_processor_builderprocessor_$constantsvisibility)        | _string[]_                                             |         | [📢](# "Visibility: public") |
| [\$propertiesVisibility](#spaceonfire_apidoc_config_processor_builderprocessor_$propertiesvisibility)      | _string[]_                                             |         | [📢](# "Visibility: public") |
| [\$methodsVisibility](#spaceonfire_apidoc_config_processor_builderprocessor_$methodsvisibility)            | _string[]_                                             |         | [📢](# "Visibility: public") |
| _Methods_                                                                                                  |                                                        |         |                              |
| [withProjectName](#spaceonfire_apidoc_config_processor_builderprocessor_withprojectname)                   | _spaceonfire\ApiDoc\Config\Processor\BuilderProcessor_ |         | [📢](# "Visibility: public") |
| [withSourceDirectories](#spaceonfire_apidoc_config_processor_builderprocessor_withsourcedirectories)       | _spaceonfire\ApiDoc\Config\Processor\BuilderProcessor_ |         | [📢](# "Visibility: public") |
| [withOutputDirectory](#spaceonfire_apidoc_config_processor_builderprocessor_withoutputdirectory)           | _spaceonfire\ApiDoc\Config\Processor\BuilderProcessor_ |         | [📢](# "Visibility: public") |
| [withScanDirectories](#spaceonfire_apidoc_config_processor_builderprocessor_withscandirectories)           | _spaceonfire\ApiDoc\Config\Processor\BuilderProcessor_ |         | [📢](# "Visibility: public") |
| [withScanFiles](#spaceonfire_apidoc_config_processor_builderprocessor_withscanfiles)                       | _spaceonfire\ApiDoc\Config\Processor\BuilderProcessor_ |         | [📢](# "Visibility: public") |
| [withPhpVersion](#spaceonfire_apidoc_config_processor_builderprocessor_withphpversion)                     | _spaceonfire\ApiDoc\Config\Processor\BuilderProcessor_ |         | [📢](# "Visibility: public") |
| [withBaseNamespace](#spaceonfire_apidoc_config_processor_builderprocessor_withbasenamespace)               | _spaceonfire\ApiDoc\Config\Processor\BuilderProcessor_ |         | [📢](# "Visibility: public") |
| [withFileExtension](#spaceonfire_apidoc_config_processor_builderprocessor_withfileextension)               | _spaceonfire\ApiDoc\Config\Processor\BuilderProcessor_ |         | [📢](# "Visibility: public") |
| [withTwigTemplatesPath](#spaceonfire_apidoc_config_processor_builderprocessor_withtwigtemplatespath)       | _spaceonfire\ApiDoc\Config\Processor\BuilderProcessor_ |         | [📢](# "Visibility: public") |
| [withTwigOptions](#spaceonfire_apidoc_config_processor_builderprocessor_withtwigoptions)                   | _spaceonfire\ApiDoc\Config\Processor\BuilderProcessor_ |         | [📢](# "Visibility: public") |
| [withLocale](#spaceonfire_apidoc_config_processor_builderprocessor_withlocale)                             | _spaceonfire\ApiDoc\Config\Processor\BuilderProcessor_ |         | [📢](# "Visibility: public") |
| [withTranslations](#spaceonfire_apidoc_config_processor_builderprocessor_withtranslations)                 | _spaceonfire\ApiDoc\Config\Processor\BuilderProcessor_ |         | [📢](# "Visibility: public") |
| [withExamplesDirectories](#spaceonfire_apidoc_config_processor_builderprocessor_withexamplesdirectories)   | _spaceonfire\ApiDoc\Config\Processor\BuilderProcessor_ |         | [📢](# "Visibility: public") |
| [withVisibility](#spaceonfire_apidoc_config_processor_builderprocessor_withvisibility)                     | _spaceonfire\ApiDoc\Config\Processor\BuilderProcessor_ |         | [📢](# "Visibility: public") |
| [withConstantsVisibility](#spaceonfire_apidoc_config_processor_builderprocessor_withconstantsvisibility)   | _spaceonfire\ApiDoc\Config\Processor\BuilderProcessor_ |         | [📢](# "Visibility: public") |
| [withPropertiesVisibility](#spaceonfire_apidoc_config_processor_builderprocessor_withpropertiesvisibility) | _spaceonfire\ApiDoc\Config\Processor\BuilderProcessor_ |         | [📢](# "Visibility: public") |
| [withMethodsVisibility](#spaceonfire_apidoc_config_processor_builderprocessor_withmethodsvisibility)       | _spaceonfire\ApiDoc\Config\Processor\BuilderProcessor_ |         | [📢](# "Visibility: public") |
| [process](#spaceonfire_apidoc_config_processor_builderprocessor_process)                                   | _void_                                                 |         | [📢](# "Visibility: public") |

## Properties

<a name="spaceonfire_apidoc_config_processor_builderprocessor_$examplesdirectories"></a>

### \$examplesDirectories

-   **Visibility**: public
-   **Static**: No
-   **Type**: _string[]_
-   **Default value**: `[]`

```php
public string[] $examplesDirectories = []
```

File location: `Config/Processor/BuilderProcessor.php:66`

<a name="spaceonfire_apidoc_config_processor_builderprocessor_$visibility"></a>

### \$visibility

-   **Visibility**: public
-   **Static**: No
-   **Type**: _string[]_
-   **Default value**: none

```php
public string[] $visibility
```

File location: `Config/Processor/BuilderProcessor.php:70`

<a name="spaceonfire_apidoc_config_processor_builderprocessor_$constantsvisibility"></a>

### \$constantsVisibility

-   **Visibility**: public
-   **Static**: No
-   **Type**: _string[]_
-   **Default value**: none

```php
public string[] $constantsVisibility
```

File location: `Config/Processor/BuilderProcessor.php:74`

<a name="spaceonfire_apidoc_config_processor_builderprocessor_$propertiesvisibility"></a>

### \$propertiesVisibility

-   **Visibility**: public
-   **Static**: No
-   **Type**: _string[]_
-   **Default value**: none

```php
public string[] $propertiesVisibility
```

File location: `Config/Processor/BuilderProcessor.php:78`

<a name="spaceonfire_apidoc_config_processor_builderprocessor_$methodsvisibility"></a>

### \$methodsVisibility

-   **Visibility**: public
-   **Static**: No
-   **Type**: _string[]_
-   **Default value**: none

```php
public string[] $methodsVisibility
```

File location: `Config/Processor/BuilderProcessor.php:82`

## Methods

<a name="spaceonfire_apidoc_config_processor_builderprocessor_withprojectname"></a>

### withProjectName()

-   **Visibility**: public

| Param          | Type                                                   | Reference | Description |
| -------------- | ------------------------------------------------------ | --------- | ----------- |
| `$projectName` | _string_                                               | No        |             |
| **Return**     | _spaceonfire\ApiDoc\Config\Processor\BuilderProcessor_ |           |             |

```php
public function withProjectName(string $projectName): spaceonfire\ApiDoc\Config\Processor\BuilderProcessor
```

File location: `Config/Processor/BuilderProcessor.php:84`

<a name="spaceonfire_apidoc_config_processor_builderprocessor_withsourcedirectories"></a>

### withSourceDirectories()

-   **Visibility**: public

| Param                | Type                                                   | Reference | Description |
| -------------------- | ------------------------------------------------------ | --------- | ----------- |
| `$sourceDirectories` | _string[]&#124;array_                                  | No        |             |
| **Return**           | _spaceonfire\ApiDoc\Config\Processor\BuilderProcessor_ |           |             |

```php
public function withSourceDirectories(string[]|array $sourceDirectories): spaceonfire\ApiDoc\Config\Processor\BuilderProcessor
```

File location: `Config/Processor/BuilderProcessor.php:95`

<a name="spaceonfire_apidoc_config_processor_builderprocessor_withoutputdirectory"></a>

### withOutputDirectory()

-   **Visibility**: public

| Param              | Type                                                   | Reference | Description |
| ------------------ | ------------------------------------------------------ | --------- | ----------- |
| `$outputDirectory` | _string_                                               | No        |             |
| **Return**         | _spaceonfire\ApiDoc\Config\Processor\BuilderProcessor_ |           |             |

```php
public function withOutputDirectory(string $outputDirectory): spaceonfire\ApiDoc\Config\Processor\BuilderProcessor
```

File location: `Config/Processor/BuilderProcessor.php:103`

<a name="spaceonfire_apidoc_config_processor_builderprocessor_withscandirectories"></a>

### withScanDirectories()

-   **Visibility**: public

| Param              | Type                                                   | Reference | Description |
| ------------------ | ------------------------------------------------------ | --------- | ----------- |
| `$scanDirectories` | _string[]&#124;array_                                  | No        |             |
| **Return**         | _spaceonfire\ApiDoc\Config\Processor\BuilderProcessor_ |           |             |

```php
public function withScanDirectories(string[]|array $scanDirectories): spaceonfire\ApiDoc\Config\Processor\BuilderProcessor
```

File location: `Config/Processor/BuilderProcessor.php:114`

<a name="spaceonfire_apidoc_config_processor_builderprocessor_withscanfiles"></a>

### withScanFiles()

-   **Visibility**: public

| Param        | Type                                                   | Reference | Description |
| ------------ | ------------------------------------------------------ | --------- | ----------- |
| `$scanFiles` | _string[]&#124;array_                                  | No        |             |
| **Return**   | _spaceonfire\ApiDoc\Config\Processor\BuilderProcessor_ |           |             |

```php
public function withScanFiles(string[]|array $scanFiles): spaceonfire\ApiDoc\Config\Processor\BuilderProcessor
```

File location: `Config/Processor/BuilderProcessor.php:126`

<a name="spaceonfire_apidoc_config_processor_builderprocessor_withphpversion"></a>

### withPhpVersion()

-   **Visibility**: public

| Param         | Type                                                   | Reference | Description |
| ------------- | ------------------------------------------------------ | --------- | ----------- |
| `$phpVersion` | _string_                                               | No        |             |
| **Return**    | _spaceonfire\ApiDoc\Config\Processor\BuilderProcessor_ |           |             |

```php
public function withPhpVersion(string $phpVersion): spaceonfire\ApiDoc\Config\Processor\BuilderProcessor
```

File location: `Config/Processor/BuilderProcessor.php:134`

<a name="spaceonfire_apidoc_config_processor_builderprocessor_withbasenamespace"></a>

### withBaseNamespace()

-   **Visibility**: public

| Param            | Type                                                   | Reference | Description |
| ---------------- | ------------------------------------------------------ | --------- | ----------- |
| `$baseNamespace` | _string_                                               | No        |             |
| **Return**       | _spaceonfire\ApiDoc\Config\Processor\BuilderProcessor_ |           |             |

```php
public function withBaseNamespace(string $baseNamespace): spaceonfire\ApiDoc\Config\Processor\BuilderProcessor
```

File location: `Config/Processor/BuilderProcessor.php:141`

<a name="spaceonfire_apidoc_config_processor_builderprocessor_withfileextension"></a>

### withFileExtension()

-   **Visibility**: public

| Param            | Type                                                   | Reference | Description |
| ---------------- | ------------------------------------------------------ | --------- | ----------- |
| `$fileExtension` | _string_                                               | No        |             |
| **Return**       | _spaceonfire\ApiDoc\Config\Processor\BuilderProcessor_ |           |             |

```php
public function withFileExtension(string $fileExtension): spaceonfire\ApiDoc\Config\Processor\BuilderProcessor
```

File location: `Config/Processor/BuilderProcessor.php:148`

<a name="spaceonfire_apidoc_config_processor_builderprocessor_withtwigtemplatespath"></a>

### withTwigTemplatesPath()

-   **Visibility**: public

| Param                | Type                                                   | Reference | Description |
| -------------------- | ------------------------------------------------------ | --------- | ----------- |
| `$twigTemplatesPath` | _string_                                               | No        |             |
| **Return**           | _spaceonfire\ApiDoc\Config\Processor\BuilderProcessor_ |           |             |

```php
public function withTwigTemplatesPath(string $twigTemplatesPath): spaceonfire\ApiDoc\Config\Processor\BuilderProcessor
```

File location: `Config/Processor/BuilderProcessor.php:155`

<a name="spaceonfire_apidoc_config_processor_builderprocessor_withtwigoptions"></a>

### withTwigOptions()

-   **Visibility**: public

| Param          | Type                                                   | Reference | Description |
| -------------- | ------------------------------------------------------ | --------- | ----------- |
| `$twigOptions` | _array<string,mixed>&#124;array_                       | No        |             |
| **Return**     | _spaceonfire\ApiDoc\Config\Processor\BuilderProcessor_ |           |             |

```php
public function withTwigOptions(array<string,mixed>|array $twigOptions): spaceonfire\ApiDoc\Config\Processor\BuilderProcessor
```

File location: `Config/Processor/BuilderProcessor.php:166`

<a name="spaceonfire_apidoc_config_processor_builderprocessor_withlocale"></a>

### withLocale()

-   **Visibility**: public

| Param      | Type                                                   | Reference | Description |
| ---------- | ------------------------------------------------------ | --------- | ----------- |
| `$locale`  | _string_                                               | No        |             |
| **Return** | _spaceonfire\ApiDoc\Config\Processor\BuilderProcessor_ |           |             |

```php
public function withLocale(string $locale): spaceonfire\ApiDoc\Config\Processor\BuilderProcessor
```

File location: `Config/Processor/BuilderProcessor.php:173`

<a name="spaceonfire_apidoc_config_processor_builderprocessor_withtranslations"></a>

### withTranslations()

-   **Visibility**: public

| Param           | Type                                                   | Reference | Description |
| --------------- | ------------------------------------------------------ | --------- | ----------- |
| `$translations` | _array<string,string>&#124;array_                      | No        |             |
| **Return**      | _spaceonfire\ApiDoc\Config\Processor\BuilderProcessor_ |           |             |

```php
public function withTranslations(array<string,string>|array $translations): spaceonfire\ApiDoc\Config\Processor\BuilderProcessor
```

File location: `Config/Processor/BuilderProcessor.php:184`

<a name="spaceonfire_apidoc_config_processor_builderprocessor_withexamplesdirectories"></a>

### withExamplesDirectories()

-   **Visibility**: public

| Param                  | Type                                                   | Reference | Description |
| ---------------------- | ------------------------------------------------------ | --------- | ----------- |
| `$examplesDirectories` | _string[]&#124;array_                                  | No        |             |
| **Return**             | _spaceonfire\ApiDoc\Config\Processor\BuilderProcessor_ |           |             |

```php
public function withExamplesDirectories(string[]|array $examplesDirectories): spaceonfire\ApiDoc\Config\Processor\BuilderProcessor
```

File location: `Config/Processor/BuilderProcessor.php:197`

<a name="spaceonfire_apidoc_config_processor_builderprocessor_withvisibility"></a>

### withVisibility()

-   **Visibility**: public

| Param         | Type                                                   | Reference | Description |
| ------------- | ------------------------------------------------------ | --------- | ----------- |
| `$visibility` | _string[]&#124;array_                                  | No        |             |
| **Return**    | _spaceonfire\ApiDoc\Config\Processor\BuilderProcessor_ |           |             |

```php
public function withVisibility(string[]|array $visibility): spaceonfire\ApiDoc\Config\Processor\BuilderProcessor
```

File location: `Config/Processor/BuilderProcessor.php:209`

<a name="spaceonfire_apidoc_config_processor_builderprocessor_withconstantsvisibility"></a>

### withConstantsVisibility()

-   **Visibility**: public

| Param                  | Type                                                   | Reference | Description |
| ---------------------- | ------------------------------------------------------ | --------- | ----------- |
| `$constantsVisibility` | _string[]&#124;array_                                  | No        |             |
| **Return**             | _spaceonfire\ApiDoc\Config\Processor\BuilderProcessor_ |           |             |

```php
public function withConstantsVisibility(string[]|array $constantsVisibility): spaceonfire\ApiDoc\Config\Processor\BuilderProcessor
```

File location: `Config/Processor/BuilderProcessor.php:221`

<a name="spaceonfire_apidoc_config_processor_builderprocessor_withpropertiesvisibility"></a>

### withPropertiesVisibility()

-   **Visibility**: public

| Param                   | Type                                                   | Reference | Description |
| ----------------------- | ------------------------------------------------------ | --------- | ----------- |
| `$propertiesVisibility` | _string[]&#124;array_                                  | No        |             |
| **Return**              | _spaceonfire\ApiDoc\Config\Processor\BuilderProcessor_ |           |             |

```php
public function withPropertiesVisibility(string[]|array $propertiesVisibility): spaceonfire\ApiDoc\Config\Processor\BuilderProcessor
```

File location: `Config/Processor/BuilderProcessor.php:233`

<a name="spaceonfire_apidoc_config_processor_builderprocessor_withmethodsvisibility"></a>

### withMethodsVisibility()

-   **Visibility**: public

| Param                | Type                                                   | Reference | Description |
| -------------------- | ------------------------------------------------------ | --------- | ----------- |
| `$methodsVisibility` | _string[]&#124;array_                                  | No        |             |
| **Return**           | _spaceonfire\ApiDoc\Config\Processor\BuilderProcessor_ |           |             |

```php
public function withMethodsVisibility(string[]|array $methodsVisibility): spaceonfire\ApiDoc\Config\Processor\BuilderProcessor
```

File location: `Config/Processor/BuilderProcessor.php:245`

<a name="spaceonfire_apidoc_config_processor_builderprocessor_process"></a>

### process()

-   **Visibility**: public

| Param      | Type                               | Reference | Description |
| ---------- | ---------------------------------- | --------- | ----------- |
| `$config`  | _spaceonfire\ApiDoc\Config\Config_ | No        |             |
| **Return** | _void_                             |           |             |

```php
public function process(spaceonfire\ApiDoc\Config\Config $config): void
```

File location: `Config/Processor/BuilderProcessor.php:253`

---

This file automatically generated by [SpaceOnFire ApiDoc](https://github.com/spaceonfire/apidoc)
