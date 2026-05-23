# CNH

Validates the **CNH registration number** (11 digits) using the official check-digit algorithm.

## Facade

```php
use Cavalheri\LaravelBrazilDocuments\Facades\BrazilDocuments;

BrazilDocuments::cnh('12345678900')->isValid();
BrazilDocuments::cnh('12345678900')->format();      // 123.456.789.00
BrazilDocuments::cnh('123.456.789.00')->sanitize(); // 12345678900
BrazilDocuments::cnh()->generate();
```

## Support class

```php
use Cavalheri\LaravelBrazilDocuments\Support\Cnh;

Cnh::isValid('12345678900');
Cnh::format('12345678900');
Cnh::sanitize('123.456.789.00');
Cnh::generate();
```

## Helper

```php
cnh('12345678900')->format();
cnh()->generate();
```

## Validation rule

```php
use Cavalheri\LaravelBrazilDocuments\Rules\Cnh;

$request->validate(['cnh' => ['required', new Cnh]]);
```

Invalid values include repeated sequences (`11111111111`), all-zero numbers, and incorrect check digits.

> This package validates the CNH **registration number**, not license category, expiry, or physical document restrictions.
