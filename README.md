## Bones App

The simplest bare-bones configuration to begin building an application using the Bones framework.

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

### Update required files

- Rename `.env.example` to `.env` and update* ([see docs](https://github.com/bayfrontmedia/bones/blob/master/docs/README.md#environment-variables))
- Update `config/app.php` as needed ([see docs](https://github.com/bayfrontmedia/bones/blob/master/docs/usage/config.md))

\* There is typically no need to update the line `APP_KEY=SECURE_APP_KEY`, as the installation command below
will automatically update this with a valid app key. 
If an app key is not generated after running the installation command, one can be created with the
`php bones key:create` command.

### Run installation command

```shell
php bones install:bare
```

[Optional services](https://github.com/bayfrontmedia/bones/blob/dev/docs/README.md#services) can be installed by including any of the following options:

- `--db`
- `--filesystem`
- `--logs`
- `--router`
- `--scheduler`
- `--veil`

At this point, Bones is installed and configured.
You can test this by running the `php bones about:bones` command.

You are now ready to begin building your application.

## Documentation

Documentation for this application can be found [here](docs/README.md).

For more information, see [Bones documentation](https://github.com/bayfrontmedia/bones/tree/master/docs).