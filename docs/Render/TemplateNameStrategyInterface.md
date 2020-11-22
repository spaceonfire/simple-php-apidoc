# Interface TemplateNameStrategyInterface

Full name: `spaceonfire\ApiDoc\Render\TemplateNameStrategyInterface`

This interface extends: `Psr\Container\ContainerInterface`

## Class members

| Name                                         | Type    | Summary                                                                     | Additional                                              |
| -------------------------------------------- | ------- | --------------------------------------------------------------------------- | ------------------------------------------------------- |
| _Methods_                                    |         |                                                                             |                                                         |
| [get](#psr_container_containerinterface_get) | _mixed_ | Finds an entry of the container by its identifier and returns it.           | [🇦](# "Abstract element") [📢](# "Visibility: public") |
| [has](#psr_container_containerinterface_has) | _bool_  | Returns true if the container can return an entry for the given identifier. | [🇦](# "Abstract element") [📢](# "Visibility: public") |

## Methods

<a name="psr_container_containerinterface_get"></a>

### get()

Finds an entry of the container by its identifier and returns it.

-   **Abstract method**: Yes
-   **Visibility**: public

| Param      | Type                                        | Reference | Description                                 |
| ---------- | ------------------------------------------- | --------- | ------------------------------------------- |
| `$id`      | _string_                                    | No        | Identifier of the entry to look for.        |
| **Return** | _mixed_                                     |           | Entry.                                      |
| **Throws** | _Psr\Container\NotFoundExceptionInterface_  |           | No entry was found for **this** identifier. |
| **Throws** | _Psr\Container\ContainerExceptionInterface_ |           | Error while retrieving the entry.           |

```php
abstract public function get(string $id): mixed
```

File location: `/var/www/html/vendor/composer/../psr/container/src/ContainerInterface.php:23`

<a name="psr_container_containerinterface_has"></a>

### has()

Returns true if the container can return an entry for the given identifier.

Returns false otherwise.

`has($id)` returning true does not mean that `get($id)` will not throw an exception.
It does however mean that `get($id)` will not throw a `NotFoundExceptionInterface`.

-   **Abstract method**: Yes
-   **Visibility**: public

| Param      | Type     | Reference | Description                          |
| ---------- | -------- | --------- | ------------------------------------ |
| `$id`      | _string_ | No        | Identifier of the entry to look for. |
| **Return** | _bool_   |           |                                      |

```php
abstract public function has(string $id): bool
```

File location: `/var/www/html/vendor/composer/../psr/container/src/ContainerInterface.php:36`

---

This file automatically generated by [SpaceOnFire ApiDoc](https://github.com/spaceonfire/apidoc)