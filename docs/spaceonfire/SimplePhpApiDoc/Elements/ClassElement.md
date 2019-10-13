# Class ClassElement

- Full name: `\spaceonfire\SimplePhpApiDoc\Elements\ClassElement`
- Parent class: `\spaceonfire\SimplePhpApiDoc\Elements\BaseElement`
- This class implements:
    - `\spaceonfire\SimplePhpApiDoc\Elements\ElementInterface`
    - `\spaceonfire\SimplePhpApiDoc\Elements\ElementDecoratorInterface`
    - `\spaceonfire\SimplePhpApiDoc\Elements\MethodOwnerInterface`
    - `\spaceonfire\SimplePhpApiDoc\Elements\PropertyOwnerInterface`

## Properties

|Property|Type|Description|Default Value|
|---|---|---|---|
|`protected $constants`|<code>\spaceonfire\SimplePhpApiDoc\Elements\ConstantElement[]</code>|||
|`protected $context`|<code>\spaceonfire\SimplePhpApiDoc\Context</code>|||
|`protected $docBlock`|<code>\phpDocumentor\Reflection\DocBlock&#124;null</code>|||
|`protected $element`|<code>\phpDocumentor\Reflection\Php\Class_</code>|||
|`protected $methods`|<code>\spaceonfire\SimplePhpApiDoc\Elements\Collections\MethodsCollection</code>|||
|`protected $properties`|<code>\spaceonfire\SimplePhpApiDoc\Elements\Collections\PropertiesCollection</code>|||
|`protected $traits`|<code>\spaceonfire\SimplePhpApiDoc\Elements\Collections\TraitsCollection</code>|||

## Methods

### __construct()

ClassElement constructor.

|Param|Type|Description|
|---|---|---|
|`$element`|*\phpDocumentor\Reflection\Php\Class_*||
|`$context`|*\spaceonfire\SimplePhpApiDoc\Context*||

```php
public function ClassElement::__construct(\phpDocumentor\Reflection\Php\Class_ $element, \spaceonfire\SimplePhpApiDoc\Context $context): mixed
```

File location: `src/Elements/ClassElement.php:52`

### getConstants()

Returns the constants of this class.

|Param|Type|Description|
|---|---|---|
|`$includeParent`|*bool*||
|**Return**|*\spaceonfire\SimplePhpApiDoc\Elements\ConstantElement[]*||

```php
public function ClassElement::getConstants(bool $includeParent = true): array
```

File location: `src/Elements/ClassElement.php:130`

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

```php
public function ClassElement::getDocBlock(): ?\spaceonfire\SimplePhpApiDoc\Elements\phpDocumentor\Reflection\DocBlock
```

File location: `src/Elements/ClassElement.php:239`

### getElement()

Getter for `element` property

|Param|Type|Description|
|---|---|---|
|**Return**|*\phpDocumentor\Reflection\Php\Class_*||

```php
public function ClassElement::getElement(): \spaceonfire\SimplePhpApiDoc\Elements\phpDocumentor\Reflection\Php\Class_
```

File location: `src/Elements/ClassElement.php:61`

### getFqsen()

```php
public function ClassElement::getFqsen(): \spaceonfire\SimplePhpApiDoc\Elements\phpDocumentor\Reflection\Fqsen
```

File location: `src/Elements/ClassElement.php:229`

### getInterfaces()

Returns the interfaces this class is implementing.

|Param|Type|Description|
|---|---|---|
|`$includeParent`|*bool*||
|**Return**|*\phpDocumentor\Reflection\Fqsen[]*||

```php
public function ClassElement::getInterfaces(bool $includeParent = true): array
```

File location: `src/Elements/ClassElement.php:114`

### getLocation()

```php
public function ClassElement::getLocation(): \spaceonfire\SimplePhpApiDoc\Elements\phpDocumentor\Reflection\Location
```

File location: `src/Elements/ClassElement.php:252`

### getMethods()

Returns collection of methods

|Param|Type|Description|
|---|---|---|
|`$includeParent`|*bool*||
|**Return**|*\spaceonfire\SimplePhpApiDoc\Elements\Collections\MethodsCollection*||

```php
public function ClassElement::getMethods(bool $includeParent = true): \spaceonfire\SimplePhpApiDoc\Elements\spaceonfire\SimplePhpApiDoc\Elements\Collections\MethodsCollection
```

File location: `src/Elements/ClassElement.php:151`

### getName()

```php
public function ClassElement::getName(): string
```

File location: `src/Elements/ClassElement.php:234`

### getParent()

```php
public function ClassElement::getParent(): ?\spaceonfire\SimplePhpApiDoc\Elements\spaceonfire\SimplePhpApiDoc\Elements\ClassElement
```

File location: `src/Elements/ClassElement.php:95`

### getParentFqsen()

Returns the superclass this class is extending if available.

|Param|Type|Description|
|---|---|---|
|**Return**|*\phpDocumentor\Reflection\Fqsen|null*||

```php
public function ClassElement::getParentFqsen(): ?\spaceonfire\SimplePhpApiDoc\Elements\phpDocumentor\Reflection\Fqsen
```

File location: `src/Elements/ClassElement.php:104`

### getProperties()

Returns collection of properties

|Param|Type|Description|
|---|---|---|
|`$includeParent`|*bool*||
|**Return**|*\spaceonfire\SimplePhpApiDoc\Elements\Collections\PropertiesCollection*||

```php
public function ClassElement::getProperties(bool $includeParent = true): \spaceonfire\SimplePhpApiDoc\Elements\spaceonfire\SimplePhpApiDoc\Elements\Collections\PropertiesCollection
```

File location: `src/Elements/ClassElement.php:185`

### getUsedTraits()


|Param|Type|Description|
|---|---|---|
|**Return**|*\spaceonfire\SimplePhpApiDoc\Elements\Collections\TraitsCollection*||

```php
public function ClassElement::getUsedTraits(): \spaceonfire\SimplePhpApiDoc\Elements\spaceonfire\SimplePhpApiDoc\Elements\Collections\TraitsCollection
```

File location: `src/Elements/ClassElement.php:213`

### getUsedTraitsFqsen()

```php
public function ClassElement::getUsedTraitsFqsen(): array
```

File location: `src/Elements/ClassElement.php:224`

### isAbstract()

Returns true when this class is abstract. Otherwise returns false.

|Param|Type|Description|
|---|---|---|
|**Return**|*bool*||

```php
public function ClassElement::isAbstract(): bool
```

File location: `src/Elements/ClassElement.php:90`

### isFinal()

Returns true when this class is final. Otherwise returns false.

|Param|Type|Description|
|---|---|---|
|**Return**|*bool*||

```php
public function ClassElement::isFinal(): bool
```

File location: `src/Elements/ClassElement.php:81`

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
|`$element`|*\phpDocumentor\Reflection\Php\Class_*||
|**Return**|*static*||

```php
public function ClassElement::setElement(mixed $element): mixed
```

File location: `src/Elements/ClassElement.php:71`

---

This file automatically generated by [Simple PHP ApiDoc](https://github.com/spaceonfire/simple-php-apidoc)