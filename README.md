![CleanShot 2023-02-14 at 17 17 03@2x](https://user-images.githubusercontent.com/1394539/218795579-da45e8c0-2f7d-44d9-9e50-08fd8c99aa6b.png)
# This Package Adds Missing Livewire Test Assertions

[![Latest Version on Packagist](https://img.shields.io/packagist/v/christophrumpel/missing-livewire-assertions.svg?style=flat-square)](https://packagist.org/packages/christophrumpel/missing-livewire-assertions)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/christophrumpel/missing-livewire-assertions/run-tests?label=tests)](https://github.com/christophrumpel/missing-livewire-assertions/actions?query=workflow%3Arun-tests+branch%3Aproduction)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/christophrumpel/missing-livewire-assertions/Check%20&%20fix%20styling?label=code%20style)](https://github.com/christophrumpel/missing-livewire-assertions/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Aproduction)
[![Total Downloads](https://img.shields.io/packagist/dt/christophrumpel/missing-livewire-assertions.svg?style=flat-square)](https://packagist.org/packages/christophrumpel/missing-livewire-assertions)

This package adds some nice new Livewire assertions which I was missing while testing my applications using Livewire. If you want to know more about WHY I needed them, check out my [blog article](https://christoph-rumpel.com/2021/4/how-I-test-livewire-components).

## Installation

You can install the package via composer:

```bash
composer require christophrumpel/missing-livewire-assertions
```

## Usage

The new assertions get added automatically, so you can use them immediately.

### Check if a Livewire property is wired to an HTML field

```php
Livewire::test(FeedbackForm::class)
    ->assertPropertyWired('email');
```

It looks for a string like `wire:model="email"` in your component's view file. It also detects variations like `wire:model.live="email"`, `wire:model.lazy="email"`, `wire:model.debounce="email"`, `wire:model.lazy.10s="email"` or `wire:model.debounce.500ms="email"`.

### Check if a Livewire method is wired to an HTML field

```php
Livewire::test(FeedbackForm::class)
    ->assertMethodWired('submit');
```

### Check if a Livewire method is wired to an HTML form

```php
Livewire::test(FeedbackForm::class)
    ->assertMethodWiredToForm('upload');
```

It looks for a string like `wire:submit.prevent="upload"` in your component's view file.

### Check if a Livewire component contains another Livewire component
```php
Livewire::test(FeedbackForm::class)
    ->assertContainsLivewireComponent(CategoryList::class);
```

You can use the component tag name as well:

```php
Livewire::test(FeedbackForm::class)
    ->assertContainsLivewireComponent('category-list');
```

### Check if a Livewire component contains a Blade component
```php
Livewire::test(FeedbackForm::class)
    ->assertContainsBladeComponent(Button::class);
```

You can use the component tag name as well:

```php
Livewire::test(FeedbackForm::class)
    ->assertContainsBladeComponent('button');
```

### Check to see if a string comes before another string
```php
Livewire::test(FeedbackForm::class)
    ->assertSeeBefore('first string', 'second string');
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
