# Class PropertyElement

- Full name: `\spaceonfire\SimplePhpApiDoc\Elements\PropertyElement`
- Parent class: `\spaceonfire\SimplePhpApiDoc\Elements\BaseElement`
- This class implements:
    - `\spaceonfire\SimplePhpApiDoc\Elements\ElementInterface`
    - `\spaceonfire\SimplePhpApiDoc\Elements\ElementDecoratorInterface`
    - `\spaceonfire\SimplePhpApiDoc\Elements\ElementVisibilityInterface`

## Properties

|Property|Type|Description|Default Value|
|---|---|---|---|
|`protected $context`|<code>\spaceonfire\SimplePhpApiDoc\Context</code>|||
|`protected $docBlock`|<code>\phpDocumentor\Reflection\DocBlock&#124;null</code>|||
|`protected $element`|<code>\phpDocumentor\Reflection\Php\Property</code>|||
|`protected $owner`|<code>\spaceonfire\SimplePhpApiDoc\Elements\PropertyOwnerInterface</code>|||

## Methods

### __construct()

PropertyElement constructor.

|Param|Type|Description|
|---|---|---|
|`$element`|*\phpDocumentor\Reflection\Php\Property*||
|`$context`|*\spaceonfire\SimplePhpApiDoc\Context*||

```php
public function PropertyElement::__construct(\phpDocumentor\Reflection\Php\Property $element, \spaceonfire\SimplePhpApiDoc\Context $context): mixed
```

File location: `src/Elements/PropertyElement.php:36`

### __toString()

```php
public function PropertyElement::__toString(): mixed
```

File location: `src/Elements/PropertyElement.php:178`

### getContext()

Getter for `context` property

|Param|Type|Description|
|---|---|---|
|**Return**|*\spaceonfire\SimplePhpApiDoc\Context*||

```php
public function BaseElement::getContext(): \spaceonfire\SimplePhpApiDoc\Elements\spaceonfire\SimplePhpApiDoc\Context
```

File location: `src/Elements/BaseElement.php:32`

### getDefault()

returns the default value of this property.

```php
public function PropertyElement::getDefault(): ?string
```

File location: `src/Elements/PropertyElement.php:84`

### getDescription()

```php
public function PropertyElement::getDescription(): string
```

File location: `src/Elements/PropertyElement.php:161`

### getDocBlock()

Returns the DocBlock of this property.

```php
public function PropertyElement::getDocBlock(): ?\spaceonfire\SimplePhpApiDoc\Elements\phpDocumentor\Reflection\DocBlock
```

File location: `src/Elements/PropertyElement.php:143`

### getElement()

Getter for `element` property

|Param|Type|Description|
|---|---|---|
|**Return**|*\phpDocumentor\Reflection\Php\Property*||

```php
public function PropertyElement::getElement(): \spaceonfire\SimplePhpApiDoc\Elements\phpDocumentor\Reflection\Php\Property
```

File location: `src/Elements/PropertyElement.php:45`

### getFqsen()

Returns the Fqsen of the element.

```php
public function PropertyElement::getFqsen(): \spaceonfire\SimplePhpApiDoc\Elements\phpDocumentor\Reflection\Fqsen
```

File location: `src/Elements/PropertyElement.php:127`

### getLocation()

```php
public function PropertyElement::getLocation(): \spaceonfire\SimplePhpApiDoc\Elements\phpDocumentor\Reflection\Location
```

File location: `src/Elements/PropertyElement.php:156`

### getName()

Returns the name of the element.

```php
public function PropertyElement::getName(): string
```

File location: `src/Elements/PropertyElement.php:135`

### getOwner()

Getter for `owner` property

|Param|Type|Description|
|---|---|---|
|**Return**|*\spaceonfire\SimplePhpApiDoc\Elements\PropertyOwnerInterface*||

```php
public function PropertyElement::getOwner(): \spaceonfire\SimplePhpApiDoc\Elements\spaceonfire\SimplePhpApiDoc\Elements\PropertyOwnerInterface
```

File location: `src/Elements/PropertyElement.php:65`

### getSignature()

```php
public function PropertyElement::getSignature(): string
```

File location: `src/Elements/PropertyElement.php:183`

### getTypes()

Returns the types of this property.

|Param|Type|Description|
|---|---|---|
|**Return**|*string[]*||

```php
public function PropertyElement::getTypes(): array
```

File location: `src/Elements/PropertyElement.php:101`

### getVisibility()

Returns the Visibility of this method.

|Param|Type|Description|
|---|---|---|
|**Return**|*\phpDocumentor\Reflection\Php\Visibility&#124;null*||

```php
public function PropertyElement::getVisibility(): ?\spaceonfire\SimplePhpApiDoc\Elements\phpDocumentor\Reflection\Php\Visibility
```

File location: `src/Elements/PropertyElement.php:119`

### isStatic()

Returns true when this method is static. Otherwise returns false.

```php
public function PropertyElement::isStatic(): bool
```

File location: `src/Elements/PropertyElement.php:92`

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
|`$element`|*\phpDocumentor\Reflection\Php\Property*||
|**Return**|*static*||

```php
public function PropertyElement::setElement(mixed $element): mixed
```

File location: `src/Elements/PropertyElement.php:55`

### setOwner()

Setter for `owner` property

|Param|Type|Description|
|---|---|---|
|`$owner`|*\spaceonfire\SimplePhpApiDoc\Elements\PropertyOwnerInterface*||
|**Return**|*\spaceonfire\SimplePhpApiDoc\Elements\PropertyElement*||

```php
public function PropertyElement::setOwner(\spaceonfire\SimplePhpApiDoc\Elements\PropertyOwnerInterface $owner): \spaceonfire\SimplePhpApiDoc\Elements\spaceonfire\SimplePhpApiDoc\Elements\PropertyElement
```

File location: `src/Elements/PropertyElement.php:75`

---

This file automatically generated by [Simple PHP ApiDoc](https://github.com/spaceonfire/simple-php-apidoc)