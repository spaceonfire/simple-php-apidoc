# Class GenerateCommand

Full name: `spaceonfire\ApiDoc\Application\Console\GenerateCommand`

Parent class name: `Symfony\Component\Console\Command\Command`

## Class members

| Name                                                                                                | Type                                                   | Summary                                                                                                                                       | Additional                                            |
| --------------------------------------------------------------------------------------------------- | ------------------------------------------------------ | --------------------------------------------------------------------------------------------------------------------------------------------- | ----------------------------------------------------- |
| _Constants_                                                                                         |                                                        |                                                                                                                                               |                                                       |
| [SUCCESS](#symfony_component_console_command_command_success)                                       |                                                        |                                                                                                                                               | [📢](# "Visibility: public")                          |
| [FAILURE](#symfony_component_console_command_command_failure)                                       |                                                        |                                                                                                                                               | [📢](# "Visibility: public")                          |
| _Methods_                                                                                           |                                                        |                                                                                                                                               |                                                       |
| [\_\_construct](#spaceonfire_apidoc_application_console_generatecommand_construct)                  |                                                        |                                                                                                                                               | [📢](# "Visibility: public")                          |
| [getDefaultName](#symfony_component_console_command_command_getdefaultname)                         | _string&#124;null_                                     |                                                                                                                                               | [🇸](# "Static element") [📢](# "Visibility: public") |
| [ignoreValidationErrors](#symfony_component_console_command_command_ignorevalidationerrors)         |                                                        | Ignores validation errors.                                                                                                                    | [📢](# "Visibility: public")                          |
| [setApplication](#symfony_component_console_command_command_setapplication)                         |                                                        |                                                                                                                                               | [📢](# "Visibility: public")                          |
| [setHelperSet](#symfony_component_console_command_command_sethelperset)                             |                                                        |                                                                                                                                               | [📢](# "Visibility: public")                          |
| [getHelperSet](#symfony_component_console_command_command_gethelperset)                             | _Symfony\Component\Console\Helper\HelperSet&#124;null_ | Gets the helper set.                                                                                                                          | [📢](# "Visibility: public")                          |
| [getApplication](#symfony_component_console_command_command_getapplication)                         | _Symfony\Component\Console\Application&#124;null_      | Gets the application instance for this command.                                                                                               | [📢](# "Visibility: public")                          |
| [isEnabled](#symfony_component_console_command_command_isenabled)                                   | _bool_                                                 | Checks whether the command is enabled or not in the current environment.                                                                      | [📢](# "Visibility: public")                          |
| [run](#symfony_component_console_command_command_run)                                               | _int_                                                  | Runs the command.                                                                                                                             | [📢](# "Visibility: public")                          |
| [setCode](#symfony_component_console_command_command_setcode)                                       | _Symfony\Component\Console\Command\Command_            | Sets the code to execute when running this command.                                                                                           | [📢](# "Visibility: public")                          |
| [mergeApplicationDefinition](#symfony_component_console_command_command_mergeapplicationdefinition) |                                                        | Merges the application definition with the command definition.                                                                                | [📢](# "Visibility: public")                          |
| [setDefinition](#symfony_component_console_command_command_setdefinition)                           | _Symfony\Component\Console\Command\Command_            | Sets an array of argument and option instances.                                                                                               | [📢](# "Visibility: public")                          |
| [getDefinition](#symfony_component_console_command_command_getdefinition)                           | _Symfony\Component\Console\Input\InputDefinition_      | Gets the InputDefinition attached to this Command.                                                                                            | [📢](# "Visibility: public")                          |
| [getNativeDefinition](#symfony_component_console_command_command_getnativedefinition)               | _Symfony\Component\Console\Input\InputDefinition_      | Gets the InputDefinition to be used to create representations of this Command.                                                                | [📢](# "Visibility: public")                          |
| [addArgument](#symfony_component_console_command_command_addargument)                               | _Symfony\Component\Console\Command\Command_            | Adds an argument.                                                                                                                             | [📢](# "Visibility: public")                          |
| [addOption](#symfony_component_console_command_command_addoption)                                   | _Symfony\Component\Console\Command\Command_            | Adds an option.                                                                                                                               | [📢](# "Visibility: public")                          |
| [setName](#symfony_component_console_command_command_setname)                                       | _Symfony\Component\Console\Command\Command_            | Sets the name of the command.                                                                                                                 | [📢](# "Visibility: public")                          |
| [setProcessTitle](#symfony_component_console_command_command_setprocesstitle)                       | _Symfony\Component\Console\Command\Command_            | Sets the process title of the command.                                                                                                        | [📢](# "Visibility: public")                          |
| [getName](#symfony_component_console_command_command_getname)                                       | _string&#124;null_                                     | Returns the command name.                                                                                                                     | [📢](# "Visibility: public")                          |
| [setHidden](#symfony_component_console_command_command_sethidden)                                   | _Symfony\Component\Console\Command\Command_            |                                                                                                                                               | [📢](# "Visibility: public")                          |
| [isHidden](#symfony_component_console_command_command_ishidden)                                     | _bool_                                                 |                                                                                                                                               | [📢](# "Visibility: public")                          |
| [setDescription](#symfony_component_console_command_command_setdescription)                         | _Symfony\Component\Console\Command\Command_            | Sets the description for the command.                                                                                                         | [📢](# "Visibility: public")                          |
| [getDescription](#symfony_component_console_command_command_getdescription)                         | _string_                                               | Returns the description for the command.                                                                                                      | [📢](# "Visibility: public")                          |
| [setHelp](#symfony_component_console_command_command_sethelp)                                       | _Symfony\Component\Console\Command\Command_            | Sets the help for the command.                                                                                                                | [📢](# "Visibility: public")                          |
| [getHelp](#symfony_component_console_command_command_gethelp)                                       | _string_                                               | Returns the help for the command.                                                                                                             | [📢](# "Visibility: public")                          |
| [getProcessedHelp](#symfony_component_console_command_command_getprocessedhelp)                     | _string_                                               | Returns the processed help for the command replacing the %command.name% and<br>%command.full_name% patterns with the real values dynamically. | [📢](# "Visibility: public")                          |
| [setAliases](#symfony_component_console_command_command_setaliases)                                 | _Symfony\Component\Console\Command\Command_            | Sets the aliases for the command.                                                                                                             | [📢](# "Visibility: public")                          |
| [getAliases](#symfony_component_console_command_command_getaliases)                                 | _mixed[]_                                              | Returns the aliases for the command.                                                                                                          | [📢](# "Visibility: public")                          |
| [getSynopsis](#symfony_component_console_command_command_getsynopsis)                               | _string_                                               | Returns the synopsis for the command.                                                                                                         | [📢](# "Visibility: public")                          |
| [addUsage](#symfony_component_console_command_command_addusage)                                     | _Symfony\Component\Console\Command\Command_            | Add a command usage example, it'll be prefixed with the command name.                                                                         | [📢](# "Visibility: public")                          |
| [getUsages](#symfony_component_console_command_command_getusages)                                   | _mixed[]_                                              | Returns alternative usages of the command.                                                                                                    | [📢](# "Visibility: public")                          |
| [getHelper](#symfony_component_console_command_command_gethelper)                                   | _mixed_                                                | Gets a helper instance by name.                                                                                                               | [📢](# "Visibility: public")                          |

## Constants

<a name="symfony_component_console_command_command_success"></a>

### SUCCESS

-   **Visibility**: public
-   **Value**: `0`

File location: `/var/www/html/vendor/composer/../symfony/console/Command/Command.php:32`

<a name="symfony_component_console_command_command_failure"></a>

### FAILURE

-   **Visibility**: public
-   **Value**: `1`

File location: `/var/www/html/vendor/composer/../symfony/console/Command/Command.php:33`

## Methods

<a name="spaceonfire_apidoc_application_console_generatecommand_construct"></a>

### \_\_construct()

-   **Visibility**: public

| Param     | Type                                          | Reference | Description |
| --------- | --------------------------------------------- | --------- | ----------- |
| `$kernel` | _spaceonfire\ApiDoc\Application\ApiDocKernel_ | No        |             |
| `$name`   | _string&#124;null_                            | No        |             |

```php
public function __construct(spaceonfire\ApiDoc\Application\ApiDocKernel $kernel, string|null $name = null)
```

File location: `Application/Console/GenerateCommand.php:27`

<a name="symfony_component_console_command_command_getdefaultname"></a>

### getDefaultName()

-   **Visibility**: public
-   **Static**: Yes

| Param      | Type               | Reference | Description                                                  |
| ---------- | ------------------ | --------- | ------------------------------------------------------------ |
| **Return** | _string&#124;null_ |           | The default command name or null when no default name is set |

```php
public static function getDefaultName(): string|null
```

File location: `/var/www/html/vendor/composer/../symfony/console/Command/Command.php:59`

<a name="symfony_component_console_command_command_ignorevalidationerrors"></a>

### ignoreValidationErrors()

Ignores validation errors.

This is mainly useful for the help command.

-   **Visibility**: public

```php
public function ignoreValidationErrors()
```

File location: `/var/www/html/vendor/composer/../symfony/console/Command/Command.php:88`

<a name="symfony_component_console_command_command_setapplication"></a>

### setApplication()

-   **Visibility**: public

| Param          | Type                                              | Reference | Description |
| -------------- | ------------------------------------------------- | --------- | ----------- |
| `$application` | _Symfony\Component\Console\Application&#124;null_ | No        |             |

```php
public function setApplication(Symfony\Component\Console\Application|null $application = null)
```

File location: `/var/www/html/vendor/composer/../symfony/console/Command/Command.php:93`

<a name="symfony_component_console_command_command_sethelperset"></a>

### setHelperSet()

-   **Visibility**: public

| Param        | Type                                         | Reference | Description |
| ------------ | -------------------------------------------- | --------- | ----------- |
| `$helperSet` | _Symfony\Component\Console\Helper\HelperSet_ | No        |             |

```php
public function setHelperSet(Symfony\Component\Console\Helper\HelperSet $helperSet)
```

File location: `/var/www/html/vendor/composer/../symfony/console/Command/Command.php:103`

<a name="symfony_component_console_command_command_gethelperset"></a>

### getHelperSet()

Gets the helper set.

-   **Visibility**: public

| Param      | Type                                                   | Reference | Description          |
| ---------- | ------------------------------------------------------ | --------- | -------------------- |
| **Return** | _Symfony\Component\Console\Helper\HelperSet&#124;null_ |           | A HelperSet instance |

```php
public function getHelperSet(): Symfony\Component\Console\Helper\HelperSet|null
```

File location: `/var/www/html/vendor/composer/../symfony/console/Command/Command.php:113`

<a name="symfony_component_console_command_command_getapplication"></a>

### getApplication()

Gets the application instance for this command.

-   **Visibility**: public

| Param      | Type                                              | Reference | Description             |
| ---------- | ------------------------------------------------- | --------- | ----------------------- |
| **Return** | _Symfony\Component\Console\Application&#124;null_ |           | An Application instance |

```php
public function getApplication(): Symfony\Component\Console\Application|null
```

File location: `/var/www/html/vendor/composer/../symfony/console/Command/Command.php:123`

<a name="symfony_component_console_command_command_isenabled"></a>

### isEnabled()

Checks whether the command is enabled or not in the current environment.

Override this to check for x or y and return false if the command can not
run properly under the current conditions.

-   **Visibility**: public

| Param      | Type   | Reference | Description |
| ---------- | ------ | --------- | ----------- |
| **Return** | _bool_ |           |             |

```php
public function isEnabled(): bool
```

File location: `/var/www/html/vendor/composer/../symfony/console/Command/Command.php:136`

<a name="symfony_component_console_command_command_run"></a>

### run()

Runs the command.

The code to execute is either defined directly with the
setCode() method or by overriding the execute() method
in a sub-class.

-   **Visibility**: public

| Param      | Type                                               | Reference | Description                                                                        |
| ---------- | -------------------------------------------------- | --------- | ---------------------------------------------------------------------------------- |
| `$input`   | _Symfony\Component\Console\Input\InputInterface_   | No        |                                                                                    |
| `$output`  | _Symfony\Component\Console\Output\OutputInterface_ | No        |                                                                                    |
| **Return** | _int_                                              |           | The command exit code                                                              |
| **Throws** | _Exception_                                        |           | When binding input fails. Bypass this by calling {@link ignoreValidationErrors()}. |

```php
public function run(Symfony\Component\Console\Input\InputInterface $input, Symfony\Component\Console\Output\OutputInterface $output): int
```

**Links**:

-   [\Symfony\Component\Console\Command\setCode](../../Symfony/Component/Console/Command/setCode.md#symfony_component_console_command_setcode)
-   [\Symfony\Component\Console\Command\execute](../../Symfony/Component/Console/Command/execute.md#symfony_component_console_command_execute)

File location: `/var/www/html/vendor/composer/../symfony/console/Command/Command.php:206`

<a name="symfony_component_console_command_command_setcode"></a>

### setCode()

Sets the code to execute when running this command.

If this method is used, it overrides the code defined
in the execute() method.

-   **Visibility**: public

| Param      | Type                                                           | Reference | Description                                                |
| ---------- | -------------------------------------------------------------- | --------- | ---------------------------------------------------------- |
| `$code`    | _callable_                                                     | No        | A callable(InputInterface $input, OutputInterface $output) |
| **Return** | _Symfony\Component\Console\Command\Command_                    |           |                                                            |
| **Throws** | _Symfony\Component\Console\Exception\InvalidArgumentException_ |           |                                                            |

```php
public function setCode(callable $code): Symfony\Component\Console\Command\Command
```

**Links**:

-   [\Symfony\Component\Console\Command\execute](../../Symfony/Component/Console/Command/execute.md#symfony_component_console_command_execute)

File location: `/var/www/html/vendor/composer/../symfony/console/Command/Command.php:282`

<a name="symfony_component_console_command_command_mergeapplicationdefinition"></a>

### mergeApplicationDefinition()

Merges the application definition with the command definition.

This method is not part of public API and should not be used directly.

-   **Visibility**: public

| Param        | Type   | Reference | Description                                                                                  |
| ------------ | ------ | --------- | -------------------------------------------------------------------------------------------- |
| `$mergeArgs` | _bool_ | No        | Whether to merge or not the Application definition arguments to Command definition arguments |

```php
public function mergeApplicationDefinition(bool $mergeArgs = true)
```

File location: `/var/www/html/vendor/composer/../symfony/console/Command/Command.php:303`

<a name="symfony_component_console_command_command_setdefinition"></a>

### setDefinition()

Sets an array of argument and option instances.

-   **Visibility**: public

| Param         | Type                                                           | Reference | Description                                                        |
| ------------- | -------------------------------------------------------------- | --------- | ------------------------------------------------------------------ |
| `$definition` | _mixed[]&#124;Symfony\Component\Console\Input\InputDefinition_ | No        | An array of argument and option instances or a definition instance |
| **Return**    | _Symfony\Component\Console\Command\Command_                    |           |                                                                    |

```php
public function setDefinition(mixed[]|Symfony\Component\Console\Input\InputDefinition $definition): Symfony\Component\Console\Command\Command
```

File location: `/var/www/html/vendor/composer/../symfony/console/Command/Command.php:329`

<a name="symfony_component_console_command_command_getdefinition"></a>

### getDefinition()

Gets the InputDefinition attached to this Command.

-   **Visibility**: public

| Param      | Type                                              | Reference | Description                 |
| ---------- | ------------------------------------------------- | --------- | --------------------------- |
| **Return** | _Symfony\Component\Console\Input\InputDefinition_ |           | An InputDefinition instance |

```php
public function getDefinition(): Symfony\Component\Console\Input\InputDefinition
```

File location: `/var/www/html/vendor/composer/../symfony/console/Command/Command.php:347`

<a name="symfony_component_console_command_command_getnativedefinition"></a>

### getNativeDefinition()

Gets the InputDefinition to be used to create representations of this Command.

Can be overridden to provide the original command representation when it would otherwise
be changed by merging with the application InputDefinition.

This method is not part of public API and should not be used directly.

-   **Visibility**: public

| Param      | Type                                              | Reference | Description                 |
| ---------- | ------------------------------------------------- | --------- | --------------------------- |
| **Return** | _Symfony\Component\Console\Input\InputDefinition_ |           | An InputDefinition instance |

```php
public function getNativeDefinition(): Symfony\Component\Console\Input\InputDefinition
```

File location: `/var/www/html/vendor/composer/../symfony/console/Command/Command.php:366`

<a name="symfony_component_console_command_command_addargument"></a>

### addArgument()

Adds an argument.

-   **Visibility**: public

| Param          | Type                                                           | Reference | Description                                                           |
| -------------- | -------------------------------------------------------------- | --------- | --------------------------------------------------------------------- |
| `$name`        | _string_                                                       | No        |                                                                       |
| `$mode`        | _int&#124;null_                                                | No        | The argument mode: InputArgument::REQUIRED or InputArgument::OPTIONAL |
| `$description` | _string_                                                       | No        |                                                                       |
| `$default`     | _string&#124;string[]&#124;null_                               | No        | The default value (for InputArgument::OPTIONAL mode only)             |
| **Return**     | _Symfony\Component\Console\Command\Command_                    |           |                                                                       |
| **Throws**     | _Symfony\Component\Console\Exception\InvalidArgumentException_ |           | When argument mode is not valid                                       |

```php
public function addArgument(string $name, int|null $mode = null, string $description = '', string|string[]|null $default = null): Symfony\Component\Console\Command\Command
```

File location: `/var/www/html/vendor/composer/../symfony/console/Command/Command.php:381`

<a name="symfony_component_console_command_command_addoption"></a>

### addOption()

Adds an option.

-   **Visibility**: public

| Param          | Type                                                           | Reference | Description                                                                                    |
| -------------- | -------------------------------------------------------------- | --------- | ---------------------------------------------------------------------------------------------- |
| `$name`        | _string_                                                       | No        |                                                                                                |
| `$shortcut`    | _string&#124;mixed[]&#124;null_                                | No        | The shortcuts, can be null, a string of shortcuts delimited by &#124; or an array of shortcuts |
| `$mode`        | _int&#124;null_                                                | No        | The option mode: One of the InputOption::VALUE\_\* constants                                   |
| `$description` | _string_                                                       | No        |                                                                                                |
| `$default`     | _string&#124;string[]&#124;int&#124;bool&#124;null_            | No        | The default value (must be null for InputOption::VALUE_NONE)                                   |
| **Return**     | _Symfony\Component\Console\Command\Command_                    |           |                                                                                                |
| **Throws**     | _Symfony\Component\Console\Exception\InvalidArgumentException_ |           | If option mode is invalid or incompatible                                                      |

```php
public function addOption(string $name, string|mixed[]|null $shortcut = null, int|null $mode = null, string $description = '', string|string[]|int|bool|null $default = null): Symfony\Component\Console\Command\Command
```

File location: `/var/www/html/vendor/composer/../symfony/console/Command/Command.php:399`

<a name="symfony_component_console_command_command_setname"></a>

### setName()

Sets the name of the command.

This method can set both the namespace and the name if
you separate them by a colon (:)

    $command->setName('foo:bar');

-   **Visibility**: public

| Param      | Type                                                           | Reference | Description              |
| ---------- | -------------------------------------------------------------- | --------- | ------------------------ |
| `$name`    | _string_                                                       | No        |                          |
| **Return** | _Symfony\Component\Console\Command\Command_                    |           |                          |
| **Throws** | _Symfony\Component\Console\Exception\InvalidArgumentException_ |           | When the name is invalid |

```php
public function setName(string $name): Symfony\Component\Console\Command\Command
```

File location: `/var/www/html/vendor/composer/../symfony/console/Command/Command.php:418`

<a name="symfony_component_console_command_command_setprocesstitle"></a>

### setProcessTitle()

Sets the process title of the command.

This feature should be used only when creating a long process command,
like a daemon.

-   **Visibility**: public

| Param      | Type                                        | Reference | Description |
| ---------- | ------------------------------------------- | --------- | ----------- |
| `$title`   | _string_                                    | No        |             |
| **Return** | _Symfony\Component\Console\Command\Command_ |           |             |

```php
public function setProcessTitle(string $title): Symfony\Component\Console\Command\Command
```

File location: `/var/www/html/vendor/composer/../symfony/console/Command/Command.php:435`

<a name="symfony_component_console_command_command_getname"></a>

### getName()

Returns the command name.

-   **Visibility**: public

| Param      | Type               | Reference | Description |
| ---------- | ------------------ | --------- | ----------- |
| **Return** | _string&#124;null_ |           |             |

```php
public function getName(): string|null
```

File location: `/var/www/html/vendor/composer/../symfony/console/Command/Command.php:447`

<a name="symfony_component_console_command_command_sethidden"></a>

### setHidden()

-   **Visibility**: public

| Param      | Type                                        | Reference | Description                                                                                                            |
| ---------- | ------------------------------------------- | --------- | ---------------------------------------------------------------------------------------------------------------------- |
| `$hidden`  | _bool_                                      | No        | Whether or not the command should be hidden from the list of commands<br>The default value will be true in Symfony 6.0 |
| **Return** | _Symfony\Component\Console\Command\Command_ |           | The current instance                                                                                                   |

```php
public function setHidden(bool $hidden): Symfony\Component\Console\Command\Command
```

File location: `/var/www/html/vendor/composer/../symfony/console/Command/Command.php:460`

<a name="symfony_component_console_command_command_ishidden"></a>

### isHidden()

-   **Visibility**: public

| Param      | Type   | Reference | Description                                         |
| ---------- | ------ | --------- | --------------------------------------------------- |
| **Return** | _bool_ |           | whether the command should be publicly shown or not |

```php
public function isHidden(): bool
```

File location: `/var/www/html/vendor/composer/../symfony/console/Command/Command.php:470`

<a name="symfony_component_console_command_command_setdescription"></a>

### setDescription()

Sets the description for the command.

-   **Visibility**: public

| Param          | Type                                        | Reference | Description |
| -------------- | ------------------------------------------- | --------- | ----------- |
| `$description` | _string_                                    | No        |             |
| **Return**     | _Symfony\Component\Console\Command\Command_ |           |             |

```php
public function setDescription(string $description): Symfony\Component\Console\Command\Command
```

File location: `/var/www/html/vendor/composer/../symfony/console/Command/Command.php:480`

<a name="symfony_component_console_command_command_getdescription"></a>

### getDescription()

Returns the description for the command.

-   **Visibility**: public

| Param      | Type     | Reference | Description                     |
| ---------- | -------- | --------- | ------------------------------- |
| **Return** | _string_ |           | The description for the command |

```php
public function getDescription(): string
```

File location: `/var/www/html/vendor/composer/../symfony/console/Command/Command.php:492`

<a name="symfony_component_console_command_command_sethelp"></a>

### setHelp()

Sets the help for the command.

-   **Visibility**: public

| Param      | Type                                        | Reference | Description |
| ---------- | ------------------------------------------- | --------- | ----------- |
| `$help`    | _string_                                    | No        |             |
| **Return** | _Symfony\Component\Console\Command\Command_ |           |             |

```php
public function setHelp(string $help): Symfony\Component\Console\Command\Command
```

File location: `/var/www/html/vendor/composer/../symfony/console/Command/Command.php:502`

<a name="symfony_component_console_command_command_gethelp"></a>

### getHelp()

Returns the help for the command.

-   **Visibility**: public

| Param      | Type     | Reference | Description              |
| ---------- | -------- | --------- | ------------------------ |
| **Return** | _string_ |           | The help for the command |

```php
public function getHelp(): string
```

File location: `/var/www/html/vendor/composer/../symfony/console/Command/Command.php:514`

<a name="symfony_component_console_command_command_getprocessedhelp"></a>

### getProcessedHelp()

Returns the processed help for the command replacing the %command.name% and
%command.full_name% patterns with the real values dynamically.

-   **Visibility**: public

| Param      | Type     | Reference | Description                        |
| ---------- | -------- | --------- | ---------------------------------- |
| **Return** | _string_ |           | The processed help for the command |

```php
public function getProcessedHelp(): string
```

File location: `/var/www/html/vendor/composer/../symfony/console/Command/Command.php:525`

<a name="symfony_component_console_command_command_setaliases"></a>

### setAliases()

Sets the aliases for the command.

-   **Visibility**: public

| Param      | Type                                                           | Reference | Description                         |
| ---------- | -------------------------------------------------------------- | --------- | ----------------------------------- |
| `$aliases` | _string[]&#124;iterable_                                       | No        | An array of aliases for the command |
| **Return** | _Symfony\Component\Console\Command\Command_                    |           |                                     |
| **Throws** | _Symfony\Component\Console\Exception\InvalidArgumentException_ |           | When an alias is invalid            |

```php
public function setAliases(string[]|iterable $aliases): Symfony\Component\Console\Command\Command
```

File location: `/var/www/html/vendor/composer/../symfony/console/Command/Command.php:551`

<a name="symfony_component_console_command_command_getaliases"></a>

### getAliases()

Returns the aliases for the command.

-   **Visibility**: public

| Param      | Type      | Reference | Description                         |
| ---------- | --------- | --------- | ----------------------------------- |
| **Return** | _mixed[]_ |           | An array of aliases for the command |

```php
public function getAliases(): mixed[]
```

File location: `/var/www/html/vendor/composer/../symfony/console/Command/Command.php:567`

<a name="symfony_component_console_command_command_getsynopsis"></a>

### getSynopsis()

Returns the synopsis for the command.

-   **Visibility**: public

| Param      | Type     | Reference | Description                                                                    |
| ---------- | -------- | --------- | ------------------------------------------------------------------------------ |
| `$short`   | _bool_   | No        | Whether to show the short version of the synopsis (with options folded) or not |
| **Return** | _string_ |           | The synopsis                                                                   |

```php
public function getSynopsis(bool $short = false): string
```

File location: `/var/www/html/vendor/composer/../symfony/console/Command/Command.php:579`

<a name="symfony_component_console_command_command_addusage"></a>

### addUsage()

Add a command usage example, it'll be prefixed with the command name.

-   **Visibility**: public

| Param      | Type                                        | Reference | Description |
| ---------- | ------------------------------------------- | --------- | ----------- |
| `$usage`   | _string_                                    | No        |             |
| **Return** | _Symfony\Component\Console\Command\Command_ |           |             |

```php
public function addUsage(string $usage): Symfony\Component\Console\Command\Command
```

File location: `/var/www/html/vendor/composer/../symfony/console/Command/Command.php:595`

<a name="symfony_component_console_command_command_getusages"></a>

### getUsages()

Returns alternative usages of the command.

-   **Visibility**: public

| Param      | Type      | Reference | Description |
| ---------- | --------- | --------- | ----------- |
| **Return** | _mixed[]_ |           |             |

```php
public function getUsages(): mixed[]
```

File location: `/var/www/html/vendor/composer/../symfony/console/Command/Command.php:611`

<a name="symfony_component_console_command_command_gethelper"></a>

### getHelper()

Gets a helper instance by name.

-   **Visibility**: public

| Param      | Type                                                           | Reference | Description                  |
| ---------- | -------------------------------------------------------------- | --------- | ---------------------------- |
| `$name`    | _string_                                                       | No        |                              |
| **Return** | _mixed_                                                        |           | The helper value             |
| **Throws** | _Symfony\Component\Console\Exception\LogicException_           |           | if no HelperSet is defined   |
| **Throws** | _Symfony\Component\Console\Exception\InvalidArgumentException_ |           | if the helper is not defined |

```php
public function getHelper(string $name): mixed
```

File location: `/var/www/html/vendor/composer/../symfony/console/Command/Command.php:624`

---

This file automatically generated by [SpaceOnFire ApiDoc](https://github.com/spaceonfire/apidoc)
