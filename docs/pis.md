# PIS / PASEP

Validação do número **PIS**, **PASEP** ou **NIS** (mesmo algoritmo — 11 dígitos com dígito verificador).

## Facade

```php
use Cavalheri\LaravelBrazilDocuments\Facades\BrazilDocuments;

BrazilDocuments::pis('12056413177')->isValid();
BrazilDocuments::pis('12056413177')->format();      // 120.56413.17-7
BrazilDocuments::pis('120.56413.17-7')->sanitize(); // 12056413177
BrazilDocuments::pis()->generate();
```

## Classe Support

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

## Regra de validação

```php
use Cavalheri\LaravelBrazilDocuments\Rules\Pis;

$request->validate(['pis' => ['required', new Pis]]);
```

Valores inválidos incluem sequências repetidas, número zerado e dígito verificador incorreto.
