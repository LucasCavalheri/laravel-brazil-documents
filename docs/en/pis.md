# PIS / PASEP

Validates **PIS**, **PASEP**, or **NIS** numbers (same 11-digit algorithm with one check digit).

## Facade

```php
use Cavalheri\LaravelBrazilDocuments\Facades\BrazilDocuments;

BrazilDocuments::pis('12056413177')->isValid();
BrazilDocuments::pis('12056413177')->format();      // 120.56413.17-7
BrazilDocuments::pis('120.56413.17-7')->sanitize(); // 12056413177
BrazilDocuments::pis()->generate();
```

## Support class

```php
use Cavalheri\LaravelBrazilDocuments\Support\Pis;

Pis::isValid('12056413177');
Pis::format('12056413177');
Pis::sanitize('120.56413.17-7');
Pis::generate();
```

## Helper

```php
pis('12056413177')->format();
pis()->generate();
```

## Validation rule

```php
use Cavalheri\LaravelBrazilDocuments\Rules\Pis;

$request->validate(['pis' => ['required', new Pis]]);
```

Invalid values include repeated sequences, all-zero numbers, and incorrect check digits.
