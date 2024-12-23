## Bones App

A simple boilerplate to begin building an application using the Bones framework.

- [License](#license)
- [Author](#author)
- [Requirements](#requirements)
- [Installation](#installation)
- [Documentation](#documentation)

## License

This project is open source and available under the [MIT License](LICENSE).

## Author

<img src="https://cdn1.onbayfront.com/bfm/brand/bfm-logo.svg" alt="Bayfront Media" width="250" />

- [Bayfront Media homepage](https://www.bayfrontmedia.com?utm_source=github&amp;utm_medium=direct)
- [Bayfront Media GitHub](https://github.com/bayfrontmedia)

## Requirements

* PHP `^8.0` (Tested up to `8.4`)

## Installation

[![Deploy to DO](https://www.deploytodo.com/do-btn-blue.svg)](https://cloud.digitalocean.com/apps/new?repo=https://github.com/bayfrontmedia/bones-app/tree/master&refcode=7e41d0ac1ab5)

When deploying to DigitalOcean, be sure to update and encrypt the `APP_KEY` environment variable as described below.

### Create project

```shell
composer create-project bayfrontmedia/bones-app PROJECT_NAME
```

### Define environment variables

Rename `.env.example` to `.env` and update. ([see docs](https://github.com/bayfrontmedia/bones/blob/master/docs/install/manual.md#add-required-environment-variables))

> **NOTE:** Be sure to define a cryptographically secure app key for the APP_KEY variable.

Once Bones is installed, you can use the `php bones install:key` command to replace `SECURE_APP_KEY` with a valid key, 
or you can use the `php bones make:key` command to generate a key you can define manually.

### Configure the app

Update `config/app.php` as needed. ([see docs](docs/app/configuration.md#app))

### Set file permissions

The web server must have write permissions to the `storage/app` directory.
Typically, this is done by granting the `www-data` group ownership and write access:

```shell
chgrp -R www-data /path/to/storage/app
chmod -R 775 /path/to/storage/app
```

### Start using Bones

You are now ready to begin building your application! 

At this point, Bones should be installed and ready to use.
You can test this by running the console command `php bones about:bones`,
or by viewing the public web root in your browser.

### Optional services

Optional services can be installed by using the `php bones install:service` [console command](https://github.com/bayfrontmedia/bones/blob/master/docs/usage/console.md).

## Documentation

Documentation for this application can be found [here](docs/README.md).

For more information, see [Bones documentation](https://github.com/bayfrontmedia/bones/tree/master/docs).