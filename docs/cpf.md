# CPF

## Facade

```php
use Cavalheri\LaravelBrazilDocuments\Facades\BrazilDocuments;

BrazilDocuments::cpf('12345678909')->isValid();
BrazilDocuments::cpf('12345678909')->format();      // 123.456.789-09
BrazilDocuments::cpf('123.456.789-09')->sanitize(); // 12345678909
BrazilDocuments::cpf()->generate();
```

## Classe Support

```php
use Cavalheri\LaravelBrazilDocuments\Support\Cpf;

Cpf::isValid('12345678909');
Cpf::format('12345678909');
Cpf::sanitize('123.456.789-09');
Cpf::generate();
```

## Helper

```php
cpf('12345678909')->format();
cpf()->generate();
```

Exemplos inválidos (rejeitados):

- Dígitos verificadores incorretos
- Sequências repetidas como `11111111111` ou `00000000000`
