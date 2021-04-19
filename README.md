# This package adds missing livewire test assertions.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/christophrumpel/missing_livewire_assertions.svg?style=flat-square)](https://packagist.org/packages/christophrumpel/missing_livewire_assertions)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/christophrumpel/missing_livewire_assertions/run-tests?label=tests)](https://github.com/christophrumpel/missing_livewire_assertions/actions?query=workflow%3Arun-tests+branch%3Amaster)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/christophrumpel/missing_livewire_assertions/Check%20&%20fix%20styling?label=code%20style)](https://github.com/christophrumpel/missing_livewire_assertions/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/christophrumpel/missing_livewire_assertions.svg?style=flat-square)](https://packagist.org/packages/christophrumpel/missing_livewire_assertions)

[](delete) 1) manually replace `Christoph Rumpel, christophrumpel, auhor@domain.com, christophrumpel, christophrumpel, Vendor Name, missing-livewire-assertions, missing_livewire_assertions, missing_livewire_assertions, MissingLivewireAssertions, This package adds missing livewire test assertions.` with their correct values
[](delete) in `CHANGELOG.md, LICENSE.md, README.md, ExampleTest.php, ModelFactory.php, MissingLivewireAssertions.php, MissingLivewireAssertionsCommand.php, MissingLivewireAssertionsFacade.php, MissingLivewireAssertionsServiceProvider.php, TestCase.php, composer.json, create_missing_livewire_assertions_table.php.stub`
[](delete) and delete `configure-missing_livewire_assertions.sh`

[](delete) 2) You can also run `./configure-missing_livewire_assertions.sh` to do this automatically.

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/package-missing_livewire_assertions-laravel.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/package-missing_livewire_assertions-laravel)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).

## Installation

You can install the package via composer:

```bash
composer require christophrumpel/missing_livewire_assertions
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --provider="Christophrumpel\MissingLivewireAssertions\MissingLivewireAssertionsServiceProvider" --tag="missing_livewire_assertions-migrations"
php artisan migrate
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Christophrumpel\MissingLivewireAssertions\MissingLivewireAssertionsServiceProvider" --tag="missing_livewire_assertions-config"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$missing_livewire_assertions = new Christophrumpel\MissingLivewireAssertions();
echo $missing_livewire_assertions->echoPhrase('Hello, Spatie!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Christoph Rumpel](https://github.com/christophrumpel)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
