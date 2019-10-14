# Class MarkdownRenderer

Class MarkdownRenderer

Renders documentation for your code in markdown format

- Full name: `\spaceonfire\SimplePhpApiDoc\Renderers\Markdown\MarkdownRenderer`
- Parent class: `\spaceonfire\SimplePhpApiDoc\Renderers\BaseRenderer`
- This class implements: `\spaceonfire\SimplePhpApiDoc\Renderers\RendererInterface`

## Properties

|Property|Type|Description|Default Value|
|---|---|---|---|
|`protected $context`|<code>\spaceonfire\SimplePhpApiDoc\Context</code>|||
|`protected $fs`|<code>\Symfony\Component\Filesystem\Filesystem</code>|Symfony Filesystem Component||
|`protected $methodsVisibility`|<code>int</code>|||
|`protected $output`|<code>\Symfony\Component\Console\Output\OutputInterface</code>|Output interface of Symfony Console Component||
|`protected $outputDir`|<code>string</code>|||
|`protected $propertiesVisibility`|<code>int</code>|||
|`protected $viewsDir`|<code>string</code>|||

## Methods

### __construct()

MarkdownRenderer constructor.

|Param|Type|Description|
|---|---|---|
|`$context`|*\spaceonfire\SimplePhpApiDoc\Context&#124;null*||
|`$outputDir`|*string&#124;null*||

```php
public function MarkdownRenderer::__construct(\spaceonfire\SimplePhpApiDoc\Context $context = null, string $outputDir = null): mixed
```

File location: `src/Renderers/Markdown/MarkdownRenderer.php:29`

### getContext()

Getter for `context` property

|Param|Type|Description|
|---|---|---|
|**Return**|*\spaceonfire\SimplePhpApiDoc\Context*||

```php
public function BaseRenderer::getContext(): \spaceonfire\SimplePhpApiDoc\Renderers\spaceonfire\SimplePhpApiDoc\Context
```

File location: `src/Renderers/BaseRenderer.php:55`

### getFileName()

Generates file name with extension

|Param|Type|Description|
|---|---|---|
|`$fqsen`|*\phpDocumentor\Reflection\Fqsen*||
|**Return**|*string*||

```php
public function MarkdownRenderer::getFileName(\phpDocumentor\Reflection\Fqsen $fqsen): string
```

File location: `src/Renderers/Markdown/MarkdownRenderer.php:36`

### getFs()

Getter for `fs` property

|Param|Type|Description|
|---|---|---|
|**Return**|*\Symfony\Component\Filesystem\Filesystem*||

```php
public function BaseRenderer::getFs(): \spaceonfire\SimplePhpApiDoc\Renderers\Symfony\Component\Filesystem\Filesystem
```

File location: `src/Renderers/BaseRenderer.php:102`

### getMethodsVisibility()

Getter for `methodsVisibility` property

|Param|Type|Description|
|---|---|---|
|**Return**|*int*||

```php
public function BaseRenderer::getMethodsVisibility(): int
```

File location: `src/Renderers/BaseRenderer.php:141`

### getOutput()

Getter for `output` property

|Param|Type|Description|
|---|---|---|
|**Return**|*\Symfony\Component\Console\Output\OutputInterface*||

```php
public function BaseRenderer::getOutput(): \spaceonfire\SimplePhpApiDoc\Renderers\Symfony\Component\Console\Output\OutputInterface
```

File location: `src/Renderers/BaseRenderer.php:115`

### getOutputDir()

Getter for `outputDir` property

|Param|Type|Description|
|---|---|---|
|**Return**|*string*||

```php
public function BaseRenderer::getOutputDir(): string
```

File location: `src/Renderers/BaseRenderer.php:68`

### getPropertiesVisibility()

Getter for `propertiesVisibility` property

|Param|Type|Description|
|---|---|---|
|**Return**|*int*||

```php
public function BaseRenderer::getPropertiesVisibility(): int
```

File location: `src/Renderers/BaseRenderer.php:128`

### getViewsDir()

Getter for `viewsDir` property

|Param|Type|Description|
|---|---|---|
|**Return**|*string*||

```php
public function BaseRenderer::getViewsDir(): string
```

File location: `src/Renderers/BaseRenderer.php:85`

### renderClasses()

Render documentation content for class

|Param|Type|Description|
|---|---|---|
|`$interface`|*\spaceonfire\SimplePhpApiDoc\Elements\ClassElement*||
|**Return**|*string*||

```php
public function MarkdownRenderer::renderClasses(\spaceonfire\SimplePhpApiDoc\Elements\ClassElement $class): string
```

File location: `src/Renderers/Markdown/MarkdownRenderer.php:69`

### renderInterfaces()

Render documentation content for interface

|Param|Type|Description|
|---|---|---|
|`$interface`|*\spaceonfire\SimplePhpApiDoc\Elements\InterfaceElement*||
|**Return**|*string*||

```php
public function MarkdownRenderer::renderInterfaces(\spaceonfire\SimplePhpApiDoc\Elements\InterfaceElement $interface): string
```

File location: `src/Renderers/Markdown/MarkdownRenderer.php:60`

### renderTableOfContents()

Renders table of contents

|Param|Type|Description|
|---|---|---|
|**Return**|*string*||

```php
public function MarkdownRenderer::renderTableOfContents(): string
```

File location: `src/Renderers/Markdown/MarkdownRenderer.php:88`

### renderTraits()

Render documentation content for class

|Param|Type|Description|
|---|---|---|
|`$trait`|*\spaceonfire\SimplePhpApiDoc\Elements\TraitElement*||
|**Return**|*string*||

```php
public function MarkdownRenderer::renderTraits(\spaceonfire\SimplePhpApiDoc\Elements\TraitElement $trait): string
```

File location: `src/Renderers/Markdown/MarkdownRenderer.php:78`

### run()

Render documentation

```php
public function MarkdownRenderer::run(): void
```

File location: `src/Renderers/Markdown/MarkdownRenderer.php:45`

### setContext()

Setter for `context` property

|Param|Type|Description|
|---|---|---|
|`$context`|*\spaceonfire\SimplePhpApiDoc\Context*||
|**Return**|*static*||

```php
public function BaseRenderer::setContext(\spaceonfire\SimplePhpApiDoc\Context $context): \spaceonfire\SimplePhpApiDoc\Renderers\spaceonfire\SimplePhpApiDoc\Renderers\RendererInterface
```

File location: `src/Renderers/BaseRenderer.php:61`

### setFs()

Setter for `fs` property

|Param|Type|Description|
|---|---|---|
|`$fs`|*\Symfony\Component\Filesystem\Filesystem*||
|**Return**|*static*||

```php
public function BaseRenderer::setFs(\Symfony\Component\Filesystem\Filesystem $fs): \spaceonfire\SimplePhpApiDoc\Renderers\spaceonfire\SimplePhpApiDoc\Renderers\RendererInterface
```

File location: `src/Renderers/BaseRenderer.php:108`

### setMethodsVisibility()

Setter for `methodsVisibility` property

|Param|Type|Description|
|---|---|---|
|`$methodsVisibility`|*int*||
|**Return**|*static*||

```php
public function BaseRenderer::setMethodsVisibility(int $methodsVisibility): \spaceonfire\SimplePhpApiDoc\Renderers\spaceonfire\SimplePhpApiDoc\Renderers\RendererInterface
```

File location: `src/Renderers/BaseRenderer.php:147`

### setOutput()

Setter for `output` property

|Param|Type|Description|
|---|---|---|
|`$output`|*\Symfony\Component\Console\Output\OutputInterface*||
|**Return**|*static*||

```php
public function BaseRenderer::setOutput(\Symfony\Component\Console\Output\OutputInterface $output): \spaceonfire\SimplePhpApiDoc\Renderers\spaceonfire\SimplePhpApiDoc\Renderers\RendererInterface
```

File location: `src/Renderers/BaseRenderer.php:121`

### setOutputDir()

Setter for `outputDir` property

|Param|Type|Description|
|---|---|---|
|`$outputDir`|*string*||
|**Return**|*static*||

```php
public function BaseRenderer::setOutputDir(string $outputDir): \spaceonfire\SimplePhpApiDoc\Renderers\spaceonfire\SimplePhpApiDoc\Renderers\RendererInterface
```

File location: `src/Renderers/BaseRenderer.php:74`

### setPropertiesVisibility()

Setter for `propertiesVisibility` property

|Param|Type|Description|
|---|---|---|
|`$propertiesVisibility`|*int*||
|**Return**|*static*||

```php
public function BaseRenderer::setPropertiesVisibility(int $propertiesVisibility): \spaceonfire\SimplePhpApiDoc\Renderers\spaceonfire\SimplePhpApiDoc\Renderers\RendererInterface
```

File location: `src/Renderers/BaseRenderer.php:134`

### setViewsDir()

Setter for `viewsDir` property

|Param|Type|Description|
|---|---|---|
|`$viewsDir`|*string*||
|**Return**|*static*||

```php
public function BaseRenderer::setViewsDir(string $viewsDir): \spaceonfire\SimplePhpApiDoc\Renderers\spaceonfire\SimplePhpApiDoc\Renderers\RendererInterface
```

File location: `src/Renderers/BaseRenderer.php:91`

---

This file automatically generated by [Simple PHP ApiDoc](https://github.com/spaceonfire/simple-php-apidoc)