# Interface RendererInterface

- Full name: `\spaceonfire\SimplePhpApiDoc\Renderers\RendererInterface`

## Methods

### getContext()

Getter for `context` property

|Param|Type|Description|
|---|---|---|
|**Return**|*\spaceonfire\SimplePhpApiDoc\Context*||

```php
public function RendererInterface::getContext(): \spaceonfire\SimplePhpApiDoc\Renderers\spaceonfire\SimplePhpApiDoc\Context
```

File location: `src/Renderers/RendererInterface.php:55`

### getFileName()

Generates file name with extension

|Param|Type|Description|
|---|---|---|
|`$fqsen`|*\phpDocumentor\Reflection\Fqsen*||
|**Return**|*string*||

```php
public function RendererInterface::getFileName(\phpDocumentor\Reflection\Fqsen $fqsen): string
```

File location: `src/Renderers/RendererInterface.php:27`

### getFs()

Getter for `fs` property

|Param|Type|Description|
|---|---|---|
|**Return**|*\Symfony\Component\Filesystem\Filesystem*||

```php
public function RendererInterface::getFs(): \spaceonfire\SimplePhpApiDoc\Renderers\Symfony\Component\Filesystem\Filesystem
```

File location: `src/Renderers/RendererInterface.php:94`

### getMethodsVisibility()

Getter for `methodsVisibility` property

|Param|Type|Description|
|---|---|---|
|**Return**|*int*||

```php
public function RendererInterface::getMethodsVisibility(): int
```

File location: `src/Renderers/RendererInterface.php:133`

### getOutput()

Getter for `output` property

|Param|Type|Description|
|---|---|---|
|**Return**|*\Symfony\Component\Console\Output\OutputInterface*||

```php
public function RendererInterface::getOutput(): \spaceonfire\SimplePhpApiDoc\Renderers\Symfony\Component\Console\Output\OutputInterface
```

File location: `src/Renderers/RendererInterface.php:107`

### getOutputDir()

Getter for `outputDir` property

|Param|Type|Description|
|---|---|---|
|**Return**|*string*||

```php
public function RendererInterface::getOutputDir(): string
```

File location: `src/Renderers/RendererInterface.php:68`

### getPropertiesVisibility()

Getter for `propertiesVisibility` property

|Param|Type|Description|
|---|---|---|
|**Return**|*int*||

```php
public function RendererInterface::getPropertiesVisibility(): int
```

File location: `src/Renderers/RendererInterface.php:120`

### getViewsDir()

Getter for `viewsDir` property

|Param|Type|Description|
|---|---|---|
|**Return**|*string*||

```php
public function RendererInterface::getViewsDir(): string
```

File location: `src/Renderers/RendererInterface.php:81`

### renderClasses()

Render documentation content for class

|Param|Type|Description|
|---|---|---|
|`$interface`|*\spaceonfire\SimplePhpApiDoc\Elements\ClassElement*||
|**Return**|*string*||

```php
public function RendererInterface::renderClasses(\spaceonfire\SimplePhpApiDoc\Elements\ClassElement $interface): string
```

File location: `src/Renderers/RendererInterface.php:41`

### renderInterfaces()

Render documentation content for interface

|Param|Type|Description|
|---|---|---|
|`$interface`|*\spaceonfire\SimplePhpApiDoc\Elements\InterfaceElement*||
|**Return**|*string*||

```php
public function RendererInterface::renderInterfaces(\spaceonfire\SimplePhpApiDoc\Elements\InterfaceElement $interface): string
```

File location: `src/Renderers/RendererInterface.php:34`

### renderTraits()

Render documentation content for class

|Param|Type|Description|
|---|---|---|
|`$trait`|*\spaceonfire\SimplePhpApiDoc\Elements\TraitElement*||
|**Return**|*string*||

```php
public function RendererInterface::renderTraits(\spaceonfire\SimplePhpApiDoc\Elements\TraitElement $trait): string
```

File location: `src/Renderers/RendererInterface.php:48`

### run()

Render documentation

```php
public function RendererInterface::run(): void
```

File location: `src/Renderers/RendererInterface.php:20`

### setContext()

Setter for `context` property

|Param|Type|Description|
|---|---|---|
|`$context`|*\spaceonfire\SimplePhpApiDoc\Context*||
|**Return**|*static*||

```php
public function RendererInterface::setContext(\spaceonfire\SimplePhpApiDoc\Context $context): \spaceonfire\SimplePhpApiDoc\Renderers\spaceonfire\SimplePhpApiDoc\Renderers\RendererInterface
```

File location: `src/Renderers/RendererInterface.php:62`

### setFs()

Setter for `fs` property

|Param|Type|Description|
|---|---|---|
|`$fs`|*\Symfony\Component\Filesystem\Filesystem*||
|**Return**|*static*||

```php
public function RendererInterface::setFs(\Symfony\Component\Filesystem\Filesystem $fs): \spaceonfire\SimplePhpApiDoc\Renderers\spaceonfire\SimplePhpApiDoc\Renderers\RendererInterface
```

File location: `src/Renderers/RendererInterface.php:101`

### setMethodsVisibility()

Setter for `methodsVisibility` property

|Param|Type|Description|
|---|---|---|
|`$methodsVisibility`|*int*||
|**Return**|*static*||

```php
public function RendererInterface::setMethodsVisibility(int $methodsVisibility): \spaceonfire\SimplePhpApiDoc\Renderers\spaceonfire\SimplePhpApiDoc\Renderers\RendererInterface
```

File location: `src/Renderers/RendererInterface.php:140`

### setOutput()

Setter for `output` property

|Param|Type|Description|
|---|---|---|
|`$output`|*\Symfony\Component\Console\Output\OutputInterface*||
|**Return**|*static*||

```php
public function RendererInterface::setOutput(\Symfony\Component\Console\Output\OutputInterface $output): \spaceonfire\SimplePhpApiDoc\Renderers\spaceonfire\SimplePhpApiDoc\Renderers\RendererInterface
```

File location: `src/Renderers/RendererInterface.php:114`

### setOutputDir()

Setter for `outputDir` property

|Param|Type|Description|
|---|---|---|
|`$outputDir`|*string*||
|**Return**|*static*||

```php
public function RendererInterface::setOutputDir(string $outputDir): \spaceonfire\SimplePhpApiDoc\Renderers\spaceonfire\SimplePhpApiDoc\Renderers\RendererInterface
```

File location: `src/Renderers/RendererInterface.php:75`

### setPropertiesVisibility()

Setter for `propertiesVisibility` property

|Param|Type|Description|
|---|---|---|
|`$propertiesVisibility`|*int*||
|**Return**|*static*||

```php
public function RendererInterface::setPropertiesVisibility(int $propertiesVisibility): \spaceonfire\SimplePhpApiDoc\Renderers\spaceonfire\SimplePhpApiDoc\Renderers\RendererInterface
```

File location: `src/Renderers/RendererInterface.php:127`

### setViewsDir()

Setter for `viewsDir` property

|Param|Type|Description|
|---|---|---|
|`$viewsDir`|*string*||
|**Return**|*static*||

```php
public function RendererInterface::setViewsDir(string $viewsDir): \spaceonfire\SimplePhpApiDoc\Renderers\spaceonfire\SimplePhpApiDoc\Renderers\RendererInterface
```

File location: `src/Renderers/RendererInterface.php:88`

---

This file automatically generated by [Simple PHP ApiDoc](https://github.com/spaceonfire/simple-php-apidoc)