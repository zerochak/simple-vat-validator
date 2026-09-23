# EU VAT Validation

Offline EU VAT number validation for Laravel: per-country format checks plus check-digit verification for Italy, Greece and Romania. It never calls VIES.

## Installation

```bash
composer require 0chak/eu-vat-validation
```

Laravel auto-discovers the service provider. On Lumen, register it yourself:

```php
$app->register(Chak\EuVatValidation\EuVatValidationServiceProvider::class);
```

## Usage

### Validation rule

```php
use Chak\EuVatValidation\Rules\VatNumber;

$request->validate([
    'vat' => ['required', new VatNumber('IT')],   // validate against a country
    'vat2' => ['nullable', new VatNumber()],     // infer the country from the prefix (e.g. "DE123456789")
]);
```

### Standalone

```php
use Chak\EuVatValidation\Vat;

Vat::isValid('IT00851670943');        // true
Vat::isValid('00851670943', 'IT');    // true, since Italy and Lithuania accept numbers without a prefix
Vat::isValid('EL997969920', 'GR');    // true, because GR is treated as an alias for VIES's EL
Vat::supports('FR');                  // true
Vat::codes();                         // ['AT', 'BE', ...]
```

Input is case-insensitive, and spaces are ignored.

## Supported countries

AT, BE, BG, CY, CZ, DE, DK, EE, EL (GR), ES, FI, FR, GB, HR, HU, IE, IT, LT, LU, LV, MT, NL, PL, PT, RO, SE, SI, SK, SM

## Translations

The package ships English and Italian messages. To customise them, publish the language files:

```bash
php artisan vendor:publish --tag=eu-vat-validation-lang
```

## Testing

```bash
composer install
vendor/bin/pest
```

## License

MIT
