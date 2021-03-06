# Interface FilterableByVisibilityCollectionInterface

- Full name: `\spaceonfire\SimplePhpApiDoc\Elements\Collections\FilterableByVisibilityCollectionInterface`
- This interface extends: `\spaceonfire\Collection\CollectionInterface`

## Constants

|Constant|Value|Description|
|---|---|---|
|`VISIBILITY_PUBLIC`|`0b1`||
|`VISIBILITY_PROTECTED`|`0b10`||
|`VISIBILITY_PRIVATE`|`0b100`||

## Methods

### filterByVisibility()

Filter elements by their visibility

|Param|Type|Description|
|---|---|---|
|`$visibility`|*int*|Visibility bitmask|
|**Return**|*\spaceonfire\SimplePhpApiDoc\Elements\Collections\FilterableByVisibilityCollectionInterface*||

```php
public function FilterableByVisibilityCollectionInterface::filterByVisibility(int $visibility): \spaceonfire\SimplePhpApiDoc\Elements\Collections\spaceonfire\SimplePhpApiDoc\Elements\Collections\FilterableByVisibilityCollectionInterface
```

File location: `src/Elements/Collections/FilterableByVisibilityCollectionInterface.php:20`

---

This file automatically generated by [Simple PHP ApiDoc](https://github.com/spaceonfire/simple-php-apidoc)