# Voter ID (Título de eleitor)

Validation for the Brazilian **voter registration number** — 12 digits (8 sequential + state code + 2 check digits), modulo 11.

Structure: `XXXX XXXX XXXX` — digits 9 and 10 are the state code (01 to 28, including abroad).

## Facade

```php
use Cavalheri\LaravelBrazilDocuments\Facades\BrazilDocuments;

BrazilDocuments::tituloEleitor('825169091279')->isValid();
BrazilDocuments::tituloEleitor('825169091279')->format();      // 8251 6909 1279
BrazilDocuments::tituloEleitor('8251 6909 1279')->sanitize(); // 825169091279
BrazilDocuments::tituloEleitor()->generate();
```

## Support class

```php
use Cavalheri\LaravelBrazilDocuments\Support\TituloEleitor;

TituloEleitor::isValid('825169091279');
TituloEleitor::format('825169091279');
TituloEleitor::sanitize('8251 6909 1279');
TituloEleitor::generate();
```

## Helper

```php
tituloEleitor('825169091279')->format();
tituloEleitor()->generate();
```

## Validation rule

```php
use Cavalheri\LaravelBrazilDocuments\Rules\TituloEleitor;

$request->validate(['titulo_eleitor' => ['required', new TituloEleitor]]);
```

Validation is mathematical only; it does not confirm TSE registration.
