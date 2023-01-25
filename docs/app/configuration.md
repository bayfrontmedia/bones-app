# Configuration

The configuration files are located at `/confg`.

Bones app configuration documentation can be found [here](https://github.com/bayfrontmedia/bones/blob/master/docs/usage/config.md).

- [App](#app)

## App

The required `app.php` app configuration file has the following additional keys:

### backup_path

The `backup_path` key specifies the path where deployment backups will be saved on the server.

This key must exist in order to use the deployment-related [console commands](console.md).