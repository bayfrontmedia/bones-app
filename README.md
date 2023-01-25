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

* PHP >= 7.2.0

## Installation

### Create project

```shell
composer create-project bayfrontmedia/bones-app PROJECT_NAME
```

### Define environment variables

Rename `.env.example` to `.env` and update. ([see docs](https://github.com/bayfrontmedia/bones/blob/dev/docs/install/manual.md#add-required-environment-variables))

> **NOTE:** Be sure to define a cryptographically secure app key for the APP_KEY variable.
One can be created using the `php bones key:create` command once Bones is installed.

### Configure the app

Update `config/app.php` as needed. ([see docs](https://github.com/bayfrontmedia/bones/blob/master/docs/usage/config.md))

### Start using Bones

You are now ready to begin building your application! 

At this point, Bones should be installed and ready to use.
You can test this by running the console command `php bones about:bones`.

### Optional services

Optional services can be installed by using the `php bones install:service` [console command](https://github.com/bayfrontmedia/bones/blob/master/docs/usage/console.md).

## Documentation

Documentation for this application can be found [here](docs/README.md).

For more information, see [Bones documentation](https://github.com/bayfrontmedia/bones/tree/master/docs).