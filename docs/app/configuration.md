# Configuration

The app configuration files are located at `/confg`.

Bones app configuration documentation can be found [here](https://github.com/bayfrontmedia/bones/blob/master/docs/usage/config.md).

## App configuration

The `backup_path` key specifies the path where deployment backups will be saved on the server.

In order to use the deployment-related [console commands](console.md#app-commands), the `backup_path` key
has been added to the `/config/app.php` file.

This key defines the path where deployment backups will be stored.