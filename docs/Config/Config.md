# Class Config

Full name: `spaceonfire\ApiDoc\Config\Config`

## Class members

| Name                                                                              | Type                                      | Summary | Additional                   |
| --------------------------------------------------------------------------------- | ----------------------------------------- | ------- | ---------------------------- |
| _Properties_                                                                      |                                           |         |                              |
| [\$projectName](#spaceonfire_apidoc_config_config_$projectname)                   | _string_                                  |         | [📢](# "Visibility: public") |
| [\$sourceDirectories](#spaceonfire_apidoc_config_config_$sourcedirectories)       | _string[]_                                |         | [📢](# "Visibility: public") |
| [\$outputDirectory](#spaceonfire_apidoc_config_config_$outputdirectory)           | _string_                                  |         | [📢](# "Visibility: public") |
| [\$scanDirectories](#spaceonfire_apidoc_config_config_$scandirectories)           | _string[]_                                |         | [📢](# "Visibility: public") |
| [\$scanFiles](#spaceonfire_apidoc_config_config_$scanfiles)                       | _string[]_                                |         | [📢](# "Visibility: public") |
| [\$phpVersion](#spaceonfire_apidoc_config_config_$phpversion)                     | _string_                                  |         | [📢](# "Visibility: public") |
| [\$baseNamespace](#spaceonfire_apidoc_config_config_$basenamespace)               | _string_                                  |         | [📢](# "Visibility: public") |
| [\$fileExtension](#spaceonfire_apidoc_config_config_$fileextension)               | _string_                                  |         | [📢](# "Visibility: public") |
| [\$twigTemplatesPath](#spaceonfire_apidoc_config_config_$twigtemplatespath)       | _string_                                  |         | [📢](# "Visibility: public") |
| [\$twigOptions](#spaceonfire_apidoc_config_config_$twigoptions)                   | _array<string,mixed>_                     |         | [📢](# "Visibility: public") |
| [\$locale](#spaceonfire_apidoc_config_config_$locale)                             | _string_                                  |         | [📢](# "Visibility: public") |
| [\$translations](#spaceonfire_apidoc_config_config_$translations)                 | _array<string,string>_                    |         | [📢](# "Visibility: public") |
| [\$examplesDirectories](#spaceonfire_apidoc_config_config_$examplesdirectories)   | _string[]_                                |         | [📢](# "Visibility: public") |
| [\$visibility](#spaceonfire_apidoc_config_config_$visibility)                     | _string[]_                                |         | [📢](# "Visibility: public") |
| [\$constantsVisibility](#spaceonfire_apidoc_config_config_$constantsvisibility)   | _string[]_                                |         | [📢](# "Visibility: public") |
| [\$propertiesVisibility](#spaceonfire_apidoc_config_config_$propertiesvisibility) | _string[]_                                |         | [📢](# "Visibility: public") |
| [\$methodsVisibility](#spaceonfire_apidoc_config_config_$methodsvisibility)       | _string[]_                                |         | [📢](# "Visibility: public") |
| [\$composerClassLoader](#spaceonfire_apidoc_config_config_$composerclassloader)   | _Composer\Autoload\ClassLoader&#124;null_ |         | [📢](# "Visibility: public") |

## Properties

<a name="spaceonfire_apidoc_config_config_$projectname"></a>

### \$projectName

-   **Visibility**: public
-   **Static**: No
-   **Type**: _string_
-   **Default value**: none

```php
public string $projectName
```

File location: `Config/Config.php:14`

<a name="spaceonfire_apidoc_config_config_$sourcedirectories"></a>

### \$sourceDirectories

-   **Visibility**: public
-   **Static**: No
-   **Type**: _string[]_
-   **Default value**: none

```php
public string[] $sourceDirectories
```

File location: `Config/Config.php:18`

<a name="spaceonfire_apidoc_config_config_$outputdirectory"></a>

### \$outputDirectory

-   **Visibility**: public
-   **Static**: No
-   **Type**: _string_
-   **Default value**: none

```php
public string $outputDirectory
```

File location: `Config/Config.php:22`

<a name="spaceonfire_apidoc_config_config_$scandirectories"></a>

### \$scanDirectories

-   **Visibility**: public
-   **Static**: No
-   **Type**: _string[]_
-   **Default value**: `[]`

```php
public string[] $scanDirectories = []
```

File location: `Config/Config.php:26`

<a name="spaceonfire_apidoc_config_config_$scanfiles"></a>

### \$scanFiles

-   **Visibility**: public
-   **Static**: No
-   **Type**: _string[]_
-   **Default value**: `[]`

```php
public string[] $scanFiles = []
```

File location: `Config/Config.php:30`

<a name="spaceonfire_apidoc_config_config_$phpversion"></a>

### \$phpVersion

-   **Visibility**: public
-   **Static**: No
-   **Type**: _string_
-   **Default value**: none

```php
public string $phpVersion
```

File location: `Config/Config.php:34`

<a name="spaceonfire_apidoc_config_config_$basenamespace"></a>

### \$baseNamespace

-   **Visibility**: public
-   **Static**: No
-   **Type**: _string_
-   **Default value**: none

```php
public string $baseNamespace
```

File location: `Config/Config.php:38`

<a name="spaceonfire_apidoc_config_config_$fileextension"></a>

### \$fileExtension

-   **Visibility**: public
-   **Static**: No
-   **Type**: _string_
-   **Default value**: none

```php
public string $fileExtension
```

File location: `Config/Config.php:42`

<a name="spaceonfire_apidoc_config_config_$twigtemplatespath"></a>

### \$twigTemplatesPath

-   **Visibility**: public
-   **Static**: No
-   **Type**: _string_
-   **Default value**: none

```php
public string $twigTemplatesPath
```

File location: `Config/Config.php:46`

<a name="spaceonfire_apidoc_config_config_$twigoptions"></a>

### \$twigOptions

-   **Visibility**: public
-   **Static**: No
-   **Type**: _array<string,mixed>_
-   **Default value**: `[]`

```php
public array<string,mixed> $twigOptions = []
```

File location: `Config/Config.php:50`

<a name="spaceonfire_apidoc_config_config_$locale"></a>

### \$locale

-   **Visibility**: public
-   **Static**: No
-   **Type**: _string_
-   **Default value**: none

```php
public string $locale
```

File location: `Config/Config.php:54`

<a name="spaceonfire_apidoc_config_config_$translations"></a>

### \$translations

-   **Visibility**: public
-   **Static**: No
-   **Type**: _array<string,string>_
-   **Default value**: `[]`

```php
public array<string,string> $translations = []
```

File location: `Config/Config.php:58`

<a name="spaceonfire_apidoc_config_config_$examplesdirectories"></a>

### \$examplesDirectories

-   **Visibility**: public
-   **Static**: No
-   **Type**: _string[]_
-   **Default value**: none

```php
public string[] $examplesDirectories
```

File location: `Config/Config.php:62`

<a name="spaceonfire_apidoc_config_config_$visibility"></a>

### \$visibility

-   **Visibility**: public
-   **Static**: No
-   **Type**: _string[]_
-   **Default value**: `[]`

```php
public string[] $visibility = []
```

File location: `Config/Config.php:66`

<a name="spaceonfire_apidoc_config_config_$constantsvisibility"></a>

### \$constantsVisibility

-   **Visibility**: public
-   **Static**: No
-   **Type**: _string[]_
-   **Default value**: `[]`

```php
public string[] $constantsVisibility = []
```

File location: `Config/Config.php:70`

<a name="spaceonfire_apidoc_config_config_$propertiesvisibility"></a>

### \$propertiesVisibility

-   **Visibility**: public
-   **Static**: No
-   **Type**: _string[]_
-   **Default value**: `[]`

```php
public string[] $propertiesVisibility = []
```

File location: `Config/Config.php:74`

<a name="spaceonfire_apidoc_config_config_$methodsvisibility"></a>

### \$methodsVisibility

-   **Visibility**: public
-   **Static**: No
-   **Type**: _string[]_
-   **Default value**: `[]`

```php
public string[] $methodsVisibility = []
```

File location: `Config/Config.php:78`

<a name="spaceonfire_apidoc_config_config_$composerclassloader"></a>

### \$composerClassLoader

-   **Visibility**: public
-   **Static**: No
-   **Type**: _Composer\Autoload\ClassLoader|null_
-   **Default value**: none

```php
public Composer\Autoload\ClassLoader|null $composerClassLoader
```

File location: `Config/Config.php:82`

---

This file automatically generated by [SpaceOnFire ApiDoc](https://github.com/spaceonfire/apidoc)
