# Class MethodElement

- Full name: `\spaceonfire\SimplePhpApiDoc\Elements\MethodElement`
- Parent class: `\spaceonfire\SimplePhpApiDoc\Elements\BaseElement`
- This class implements:
    - `\spaceonfire\SimplePhpApiDoc\Elements\ElementInterface`
    - `\spaceonfire\SimplePhpApiDoc\Elements\ElementDecoratorInterface`
    - `\spaceonfire\SimplePhpApiDoc\Elements\ElementVisibilityInterface`

## Properties

|Property|Type|Description|Default Value|
|---|---|---|---|
|`protected $arguments`|<code>\spaceonfire\SimplePhpApiDoc\Elements\ArgumentElement[]</code>|||
|`protected $context`|<code>\spaceonfire\SimplePhpApiDoc\Context</code>|||
|`protected $docBlock`|<code>\phpDocumentor\Reflection\DocBlock</code>|||
|`protected $element`|<code>\phpDocumentor\Reflection\Php\Method</code>|||
|`protected $owner`|<code>\spaceonfire\SimplePhpApiDoc\Elements\MethodOwnerInterface</code>|||

## Methods

### __construct()

MethodElement constructor.

|Param|Type|Description|
|---|---|---|
|`$element`|*\phpDocumentor\Reflection\Php\Method*||
|`$context`|*\spaceonfire\SimplePhpApiDoc\Context*||

```php
public function MethodElement::__construct(\phpDocumentor\Reflection\Php\Method $element, \spaceonfire\SimplePhpApiDoc\Context $context): mixed
```

File location: `src/Elements/MethodElement.php:40`

### __toString()

```php
public function MethodElement::__toString(): mixed
```

File location: `src/Elements/MethodElement.php:212`

### getArguments()

Returns the arguments of this method.

|Param|Type|Description|
|---|---|---|
|**Return**|*\spaceonfire\SimplePhpApiDoc\Elements\ArgumentElement[]*||

```php
public function MethodElement::getArguments(): array
```

File location: `src/Elements/MethodElement.php:119`

### getContext()

Getter for `context` property

|Param|Type|Description|
|---|---|---|
|**Return**|*\spaceonfire\SimplePhpApiDoc\Context*||

```php
public function BaseElement::getContext(): \spaceonfire\SimplePhpApiDoc\Elements\spaceonfire\SimplePhpApiDoc\Context
```

File location: `src/Elements/BaseElement.php:32`

### getDocBlock()

Returns the DocBlock of this method if available.

```php
public function MethodElement::getDocBlock(): ?\spaceonfire\SimplePhpApiDoc\Elements\phpDocumentor\Reflection\DocBlock
```

File location: `src/Elements/MethodElement.php:150`

### getElement()

Getter for `element` property

|Param|Type|Description|
|---|---|---|
|**Return**|*\phpDocumentor\Reflection\Php\Method*||

```php
public function MethodElement::getElement(): \spaceonfire\SimplePhpApiDoc\Elements\phpDocumentor\Reflection\Php\Method
```

File location: `src/Elements/MethodElement.php:49`

### getFileLocation()

```php
public function MethodElement::getFileLocation(): ?string
```

File location: `src/Elements/MethodElement.php:217`

### getFqsen()

Returns the Fqsen of the element.

```php
public function MethodElement::getFqsen(): \spaceonfire\SimplePhpApiDoc\Elements\phpDocumentor\Reflection\Fqsen
```

File location: `src/Elements/MethodElement.php:133`

### getLocation()

```php
public function MethodElement::getLocation(): \spaceonfire\SimplePhpApiDoc\Elements\phpDocumentor\Reflection\Location
```

File location: `src/Elements/MethodElement.php:163`

### getName()

Returns the name of the element.

```php
public function MethodElement::getName(): string
```

File location: `src/Elements/MethodElement.php:141`

### getOwner()

Getter for `owner` property

|Param|Type|Description|
|---|---|---|
|**Return**|*\spaceonfire\SimplePhpApiDoc\Elements\MethodOwnerInterface*||

```php
public function MethodElement::getOwner(): \spaceonfire\SimplePhpApiDoc\Elements\spaceonfire\SimplePhpApiDoc\Elements\MethodOwnerInterface
```

File location: `src/Elements/MethodElement.php:69`

### getReturnType()

Returns the in code defined return type.

Return types are introduced in php 7.0 when your could doesn't have a
return type defined this method will return Mixed_ by default. The return value of this
method is not affected by the return tag in your docblock.

|Param|Type|Description|
|---|---|---|
|**Return**|*\phpDocumentor\Reflection\Type*||

```php
public function MethodElement::getReturnType(): \spaceonfire\SimplePhpApiDoc\Elements\phpDocumentor\Reflection\Type
```

File location: `src/Elements/MethodElement.php:177`

### getShortFqsen()

```php
public function MethodElement::getShortFqsen(): string
```

File location: `src/Elements/MethodElement.php:182`

### getSignature()

```php
public function MethodElement::getSignature(): string
```

File location: `src/Elements/MethodElement.php:188`

### getVisibility()

Returns the Visibility of this method.

|Param|Type|Description|
|---|---|---|
|**Return**|*\phpDocumentor\Reflection\Php\Visibility&#124;null*||

```php
public function MethodElement::getVisibility(): ?\spaceonfire\SimplePhpApiDoc\Elements\phpDocumentor\Reflection\Php\Visibility
```

File location: `src/Elements/MethodElement.php:110`

### isAbstract()

Returns true when this method is abstract. Otherwise returns false.

```php
public function MethodElement::isAbstract(): bool
```

File location: `src/Elements/MethodElement.php:88`

### isFinal()

Returns true when this method is final. Otherwise returns false.

```php
public function MethodElement::isFinal(): bool
```

File location: `src/Elements/MethodElement.php:96`

### isStatic()

Returns true when this method is static. Otherwise returns false.

```php
public function MethodElement::isStatic(): bool
```

File location: `src/Elements/MethodElement.php:104`

### setContext()

Setter for `context` property

|Param|Type|Description|
|---|---|---|
|`$context`|*\spaceonfire\SimplePhpApiDoc\Context*||
|**Return**|*static*||

```php
public function BaseElement::setContext(\spaceonfire\SimplePhpApiDoc\Context $context): mixed
```

File location: `src/Elements/BaseElement.php:42`

### setElement()

Setter for `element` property

|Param|Type|Description|
|---|---|---|
|`$element`|*\phpDocumentor\Reflection\Php\Method*||
|**Return**|*static*||

```php
public function MethodElement::setElement(mixed $element): mixed
```

File location: `src/Elements/MethodElement.php:59`

### setOwner()

Setter for `owner` property

|Param|Type|Description|
|---|---|---|
|`$owner`|*\spaceonfire\SimplePhpApiDoc\Elements\MethodOwnerInterface*||
|**Return**|*static*||

```php
public function MethodElement::setOwner(\spaceonfire\SimplePhpApiDoc\Elements\MethodOwnerInterface $owner): \spaceonfire\SimplePhpApiDoc\Elements\spaceonfire\SimplePhpApiDoc\Elements\MethodElement
```

File location: `src/Elements/MethodElement.php:79`

---

This file automatically generated by [Simple PHP ApiDoc](https://github.com/spaceonfire/simple-php-apidoc)