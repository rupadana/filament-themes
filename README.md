# This is my package filament-themes


[![Total Downloads](https://img.shields.io/packagist/dt/rupadana/filament-themes.svg?style=flat-square)](https://packagist.org/packages/rupadana/filament-themes)
[![Latest Version on Packagist](https://img.shields.io/packagist/v/rupadana/filament-themes.svg?style=flat-square)](https://packagist.org/packages/rupadana/filament-themes)


filament-themes is a versatile theme management package for Filament applications. It enables seamless integration of themes from third-party publishers while providing a customizable default theme out of the box. With features like dynamic theme switching, extensibility for custom themes, and support for multi-tenant setups, filament-themes simplifies the process of managing and personalizing your application's appearance. Perfect for developers building white-label solutions or offering theme marketplaces, filament-themes is your go-to solution for streamlined and flexible theme management.

## Installation

You can install the package via composer:

```bash
composer require rupadana/filament-themes
```

Register it to your filament Provider

```php
use Rupadana\FilamentThemes\FilamentThemesPlugin;

$panel->plugins([
    FilamentThemesPlugin::make()
])
```

### Config

```bash
php artisan vendor:publish --tag="filament-themes-config"
```
## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Rupadana](https://github.com/rupadana)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
