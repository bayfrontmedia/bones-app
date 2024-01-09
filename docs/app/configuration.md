# Configuration

The configuration files are located at `/confg`.

- [App](#app)
- [Deploy](#deploy)

## App

The `app.php` file includes [configuration required by Bones](https://github.com/bayfrontmedia/bones/blob/master/docs/usage/config.md).

## Deploy

The `deploy.php` file includes configuration for deployment scripts (console commands).
This is only needed if intending to use the included [DeployApp](console.md#deployapp) or 
[DeployPurge](console.md#deploypurge) console commands.

- `backup_path` - The `backup_path` key specifies the path where deployment backups will be saved on the server.