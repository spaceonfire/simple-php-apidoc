# Class ClassDocBlockResolver

Class ClassDocBlockResolver

- Full name: `\spaceonfire\SimplePhpApiDoc\Elements\DocBlockResolver\ClassDocBlockResolver`
- Parent class: `\spaceonfire\SimplePhpApiDoc\Elements\DocBlockResolver\BaseDocBlockResolver`

## Properties

|Property|Type|Description|Default Value|
|---|---|---|---|
|`protected $class`|<code>\spaceonfire\SimplePhpApiDoc\Elements\ClassElement</code>|||
|`protected $context`|<code>\spaceonfire\SimplePhpApiDoc\Context</code>|||
|`protected $docBlock`|<code>\phpDocumentor\Reflection\DocBlock</code>|||
|`protected static $inheritedTags`|||[author, copyright, package, subpackage, version]|

## Methods

### __construct()

ClassDocBlockResolver constructor.

|Param|Type|Description|
|---|---|---|
|`$docBlock`|*\phpDocumentor\Reflection\DocBlock*||
|`$class`|*\spaceonfire\SimplePhpApiDoc\Elements\ClassElement*||

```php
public function ClassDocBlockResolver::__construct(\phpDocumentor\Reflection\DocBlock $docBlock, \spaceonfire\SimplePhpApiDoc\Elements\ClassElement $class): mixed
```

File location: `src/Elements/DocBlockResolver/ClassDocBlockResolver.php:35`

### getClass()


|Param|Type|Description|
|---|---|---|
|**Return**|*\spaceonfire\SimplePhpApiDoc\Elements\ClassElement*||

```php
public function ClassDocBlockResolver::getClass(): \spaceonfire\SimplePhpApiDoc\Elements\DocBlockResolver\spaceonfire\SimplePhpApiDoc\Elements\ClassElement
```

File location: `src/Elements/DocBlockResolver/ClassDocBlockResolver.php:45`

### getContext()


|Param|Type|Description|
|---|---|---|
|**Return**|*\spaceonfire\SimplePhpApiDoc\Context*||

```php
public function BaseDocBlockResolver::getContext(): \spaceonfire\SimplePhpApiDoc\Elements\DocBlockResolver\spaceonfire\SimplePhpApiDoc\Context
```

File location: `src/Elements/DocBlockResolver/BaseDocBlockResolver.php:29`

### getDocBlock()


|Param|Type|Description|
|---|---|---|
|**Return**|*\phpDocumentor\Reflection\DocBlock*||

```php
public function BaseDocBlockResolver::getDocBlock(): \spaceonfire\SimplePhpApiDoc\Elements\DocBlockResolver\phpDocumentor\Reflection\DocBlock
```

File location: `src/Elements/DocBlockResolver/BaseDocBlockResolver.php:47`

### resolve()

```php
public function ClassDocBlockResolver::resolve(): \spaceonfire\SimplePhpApiDoc\Elements\DocBlockResolver\phpDocumentor\Reflection\DocBlock
```

File location: `src/Elements/DocBlockResolver/ClassDocBlockResolver.php:60`

### setClass()


|Param|Type|Description|
|---|---|---|
|`$class`|*\spaceonfire\SimplePhpApiDoc\Elements\ClassElement*||
|**Return**|*\spaceonfire\SimplePhpApiDoc\Elements\DocBlockResolver\ClassDocBlockResolver*||

```php
public function ClassDocBlockResolver::setClass(\spaceonfire\SimplePhpApiDoc\Elements\ClassElement $class): \spaceonfire\SimplePhpApiDoc\Elements\DocBlockResolver\spaceonfire\SimplePhpApiDoc\Elements\DocBlockResolver\ClassDocBlockResolver
```

File location: `src/Elements/DocBlockResolver/ClassDocBlockResolver.php:54`

### setContext()


|Param|Type|Description|
|---|---|---|
|`$context`|*\spaceonfire\SimplePhpApiDoc\Context*||
|**Return**|*static*||

```php
public function BaseDocBlockResolver::setContext(\spaceonfire\SimplePhpApiDoc\Context $context): mixed
```

File location: `src/Elements/DocBlockResolver/BaseDocBlockResolver.php:38`

### setDocBlock()


|Param|Type|Description|
|---|---|---|
|`$docBlock`|*\phpDocumentor\Reflection\DocBlock*||
|**Return**|*static*||

```php
public function BaseDocBlockResolver::setDocBlock(\phpDocumentor\Reflection\DocBlock $docBlock): mixed
```

File location: `src/Elements/DocBlockResolver/BaseDocBlockResolver.php:56`

---

This file automatically generated by [Simple PHP ApiDoc](https://github.com/spaceonfire/simple-php-apidoc)