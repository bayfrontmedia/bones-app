# Configuration

The configuration files are located at `/confg`.

- [App](#app)
- [Deploy](#deploy)

## App

The `app.php` file includes [configuration required by Bones](https://github.com/bayfrontmedia/bones/blob/master/docs/usage/config.md).

In addition, this file also contains the following keys:

```php
[
    'version' => '1.0.0' // Current app version (string)
]
```

## Deploy

The `deploy.php` file includes configuration for deployment scripts (console commands).
This is only needed if intending to use the included [DeployApp](console.md#deployapp) or 
[DeployPurge](console.md#deploypurge) console commands.

Example:

```php
return [
    'backup_path' => App::getEnv('APP_BACKUP_PATH') // Path where deployment backups will be saved on the server
];
```