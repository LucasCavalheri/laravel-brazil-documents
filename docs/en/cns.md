# CNS

Validation for the Brazilian **National Health Card** (CNS) — 15 digits, DATASUS algorithm.

- **Definitive** (starts with `1` or `2`): check digit computed from the first 11 digits.
- **Provisional** (starts with `7`, `8`, or `9`): weighted sum of all 15 digits must be a multiple of 11.

## Facade

```php
use Cavalheri\LaravelBrazilDocuments\Facades\BrazilDocuments;

BrazilDocuments::cns('279802393660003')->isValid();
BrazilDocuments::cns('279802393660003')->format();      // 279 8023 9366 0003
BrazilDocuments::cns('279 8023 9366 0003')->sanitize(); // 279802393660003
BrazilDocuments::cns()->generate();
```

## Support class

```php
use Cavalheri\LaravelBrazilDocuments\Support\Cns;

Cns::isValid('279802393660003');
Cns::format('279802393660003');
Cns::sanitize('279 8023 9366 0003');
Cns::generate();
```

## Helper

```php
cns('279802393660003')->format();
cns()->generate();
```

## Validation rule

```php
use Cavalheri\LaravelBrazilDocuments\Rules\Cns;

$request->validate(['cns' => ['required', new Cns]]);
```

Validation is mathematical (number integrity only); it does not confirm SUS registration.
