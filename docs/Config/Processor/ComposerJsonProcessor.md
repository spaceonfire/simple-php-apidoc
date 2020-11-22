# Class ComposerJsonProcessor

Full name: `spaceonfire\ApiDoc\Config\Processor\ComposerJsonProcessor`

This class implements: `spaceonfire\ApiDoc\Config\Processor\ProcessorInterface`

## Class members

| Name                                                                                  | Type   | Summary                            | Additional                   |
| ------------------------------------------------------------------------------------- | ------ | ---------------------------------- | ---------------------------- |
| _Methods_                                                                             |        |                                    |                              |
| [\_\_construct](#spaceonfire_apidoc_config_processor_composerjsonprocessor_construct) |        | ComposerJsonProcessor constructor. | [📢](# "Visibility: public") |
| [process](#spaceonfire_apidoc_config_processor_composerjsonprocessor_process)         | _void_ | Process config                     | [📢](# "Visibility: public") |

## Methods

<a name="spaceonfire_apidoc_config_processor_composerjsonprocessor_construct"></a>

### \_\_construct()

ComposerJsonProcessor constructor.

-   **Visibility**: public

| Param               | Type     | Reference | Description |
| ------------------- | -------- | --------- | ----------- |
| `$composerJsonPath` | _string_ | No        |             |

```php
public function __construct(string $composerJsonPath)
```

File location: `Config/Processor/ComposerJsonProcessor.php:26`

<a name="spaceonfire_apidoc_config_processor_composerjsonprocessor_process"></a>

### process()

Process config

-   **Visibility**: public

| Param      | Type                               | Reference | Description |
| ---------- | ---------------------------------- | --------- | ----------- |
| `$config`  | _spaceonfire\ApiDoc\Config\Config_ | No        |             |
| **Return** | _void_                             |           |             |

```php
public function process(spaceonfire\ApiDoc\Config\Config $config): void
```

File location: `Config/Processor/ComposerJsonProcessor.php:54`

---

This file automatically generated by [SpaceOnFire ApiDoc](https://github.com/spaceonfire/apidoc)