# Class BaseDocBlockResolver

- Full name: `\spaceonfire\SimplePhpApiDoc\Elements\DocBlockResolver\BaseDocBlockResolver`

## Properties

|Property|Type|Description|Default Value|
|---|---|---|---|
|`protected $context`|<code>\spaceonfire\SimplePhpApiDoc\Context</code>|||
|`protected $docBlock`|<code>\phpDocumentor\Reflection\DocBlock</code>|||
|`protected static $inheritedTags`|||[]|

## Methods

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
abstract public function BaseDocBlockResolver::resolve(): \spaceonfire\SimplePhpApiDoc\Elements\DocBlockResolver\phpDocumentor\Reflection\DocBlock
```

File location: `src/Elements/DocBlockResolver/BaseDocBlockResolver.php:62`

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