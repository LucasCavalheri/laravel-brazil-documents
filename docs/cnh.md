# CNH

Validação do **número de registro da CNH** (11 dígitos), com algoritmo oficial de dígitos verificadores.

## Facade

```php
use Cavalheri\LaravelBrazilDocuments\Facades\BrazilDocuments;

BrazilDocuments::cnh('12345678900')->isValid();
BrazilDocuments::cnh('12345678900')->format();      // 123.456.789.00
BrazilDocuments::cnh('123.456.789.00')->sanitize(); // 12345678900
BrazilDocuments::cnh()->generate();
```

## Classe Support

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

## Regra de validação

```php
use Cavalheri\LaravelBrazilDocuments\Rules\Cnh;

$request->validate(['cnh' => ['required', new Cnh]]);
```

Valores inválidos incluem sequências repetidas (`11111111111`), número zerado e dígitos verificadores incorretos.

> Este pacote valida o **número de registro** da CNH, não a categoria, validade ou restrições do documento físico.
