# Class TraitElement

- Full name: `\spaceonfire\SimplePhpApiDoc\Elements\TraitElement`
- Parent class: `\spaceonfire\SimplePhpApiDoc\Elements\BaseElement`
- This class implements:
    - `\spaceonfire\SimplePhpApiDoc\Elements\ElementInterface`
    - `\spaceonfire\SimplePhpApiDoc\Elements\ElementDecoratorInterface`
    - `\spaceonfire\SimplePhpApiDoc\Elements\MethodOwnerInterface`
    - `\spaceonfire\SimplePhpApiDoc\Elements\PropertyOwnerInterface`

## Properties

|Property|Type|Description|Default Value|
|---|---|---|---|
|`protected $context`|<code>\spaceonfire\SimplePhpApiDoc\Context</code>|||
|`protected $element`|<code>\phpDocumentor\Reflection\Php\Trait_</code>|||
|`protected $methods`|<code>\spaceonfire\SimplePhpApiDoc\Elements\Collections\MethodsCollection</code>|||
|`protected $properties`|<code>\spaceonfire\SimplePhpApiDoc\Elements\Collections\PropertiesCollection</code>|||
|`protected $traits`|<code>\spaceonfire\SimplePhpApiDoc\Elements\Collections\TraitsCollection</code>|||

## Methods

### __construct()

TraitElement constructor.

|Param|Type|Description|
|---|---|---|
|`$element`|*\phpDocumentor\Reflection\Php\Trait_*||
|`$context`|*\spaceonfire\SimplePhpApiDoc\Context*||

```php
public function TraitElement::__construct(\phpDocumentor\Reflection\Php\Trait_ $element, \spaceonfire\SimplePhpApiDoc\Context $context): mixed
```

File location: `src/Elements/TraitElement.php:43`

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
public function TraitElement::getDocBlock(): ?\spaceonfire\SimplePhpApiDoc\Elements\phpDocumentor\Reflection\DocBlock
```

File location: `src/Elements/TraitElement.php:124`

### getElement()

Getter for `element` property

|Param|Type|Description|
|---|---|---|
|**Return**|*\phpDocumentor\Reflection\Php\Trait_*||

```php
public function TraitElement::getElement(): \spaceonfire\SimplePhpApiDoc\Elements\phpDocumentor\Reflection\Php\Trait_
```

File location: `src/Elements/TraitElement.php:52`

### getFqsen()

Returns the Fqsen of the element.

```php
public function TraitElement::getFqsen(): \spaceonfire\SimplePhpApiDoc\Elements\phpDocumentor\Reflection\Fqsen
```

File location: `src/Elements/TraitElement.php:111`

### getLocation()

```php
public function TraitElement::getLocation(): \spaceonfire\SimplePhpApiDoc\Elements\phpDocumentor\Reflection\Location
```

File location: `src/Elements/TraitElement.php:152`

### getMethods()

Returns collection of methods

|Param|Type|Description|
|---|---|---|
|**Return**|*\spaceonfire\SimplePhpApiDoc\Elements\Collections\MethodsCollection*||

```php
public function TraitElement::getMethods(): \spaceonfire\SimplePhpApiDoc\Elements\spaceonfire\SimplePhpApiDoc\Elements\Collections\MethodsCollection
```

File location: `src/Elements/TraitElement.php:71`

### getName()

Returns the name of the element.

```php
public function TraitElement::getName(): string
```

File location: `src/Elements/TraitElement.php:119`

### getProperties()

Returns collection of properties

|Param|Type|Description|
|---|---|---|
|**Return**|*\spaceonfire\SimplePhpApiDoc\Elements\Collections\PropertiesCollection*||

```php
public function TraitElement::getProperties(): \spaceonfire\SimplePhpApiDoc\Elements\spaceonfire\SimplePhpApiDoc\Elements\Collections\PropertiesCollection
```

File location: `src/Elements/TraitElement.php:91`

### getUsedTraits()


|Param|Type|Description|
|---|---|---|
|**Return**|*\spaceonfire\SimplePhpApiDoc\Elements\Collections\TraitsCollection*||

```php
public function TraitElement::getUsedTraits(): \spaceonfire\SimplePhpApiDoc\Elements\spaceonfire\SimplePhpApiDoc\Elements\Collections\TraitsCollection
```

File location: `src/Elements/TraitElement.php:132`

### getUsedTraitsFqsen()

Returns fqsen of all traits used by this trait.

|Param|Type|Description|
|---|---|---|
|**Return**|*\phpDocumentor\Reflection\Fqsen[]*||

```php
public function TraitElement::getUsedTraitsFqsen(): array
```

File location: `src/Elements/TraitElement.php:147`

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
|`$element`|*\phpDocumentor\Reflection\Php\Trait_*||
|**Return**|*static*||

```php
public function TraitElement::setElement(mixed $element): mixed
```

File location: `src/Elements/TraitElement.php:62`

---

This file automatically generated by [Simple PHP ApiDoc](https://github.com/spaceonfire/simple-php-apidoc)