# Class PropertySignatureRenderer

Full name: `spaceonfire\ApiDoc\Element\Signature\PropertySignatureRenderer`

This class implements: `spaceonfire\ApiDoc\Element\Signature\SignatureRendererInterface`

## Class members

| Name                                                                                 | Type                                                 | Summary | Additional                   |
| ------------------------------------------------------------------------------------ | ---------------------------------------------------- | ------- | ---------------------------- |
| _Methods_                                                                            |                                                      |         |                              |
| [supports](#spaceonfire_apidoc_element_signature_propertysignaturerenderer_supports) | _bool_                                               |         | [📢](# "Visibility: public") |
| [render](#spaceonfire_apidoc_element_signature_propertysignaturerenderer_render)     | _spaceonfire\ApiDoc\Element\ValueObject\CodeSnippet_ |         | [📢](# "Visibility: public") |

## Methods

<a name="spaceonfire_apidoc_element_signature_propertysignaturerenderer_supports"></a>

### supports()

-   **Visibility**: public

| Param      | Type                                          | Reference | Description |
| ---------- | --------------------------------------------- | --------- | ----------- |
| `$element` | _spaceonfire\ApiDoc\Element\ElementInterface_ | No        |             |
| **Return** | _bool_                                        |           |             |

```php
public function supports(spaceonfire\ApiDoc\Element\ElementInterface $element): bool
```

File location: `Element/Signature/PropertySignatureRenderer.php:17`

<a name="spaceonfire_apidoc_element_signature_propertysignaturerenderer_render"></a>

### render()

-   **Visibility**: public

| Param      | Type                                                                                          | Reference | Description |
| ---------- | --------------------------------------------------------------------------------------------- | --------- | ----------- |
| `$element` | _spaceonfire\ApiDoc\Element\PropertyElement&#124;spaceonfire\ApiDoc\Element\ElementInterface_ | No        |             |
| **Return** | _spaceonfire\ApiDoc\Element\ValueObject\CodeSnippet_                                          |           |             |

```php
public function render(spaceonfire\ApiDoc\Element\PropertyElement|spaceonfire\ApiDoc\Element\ElementInterface $element): spaceonfire\ApiDoc\Element\ValueObject\CodeSnippet
```

File location: `Element/Signature/PropertySignatureRenderer.php:26`

---

This file automatically generated by [SpaceOnFire ApiDoc](https://github.com/spaceonfire/apidoc)