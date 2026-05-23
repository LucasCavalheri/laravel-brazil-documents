# CEP

O CEP suporta validação, formatação e sanitização. A geração não está incluída na v1.

## Facade

```php
use Cavalheri\LaravelBrazilDocuments\Facades\BrazilDocuments;

BrazilDocuments::cep('01001000')->isValid();
BrazilDocuments::cep('01001000')->format();     // 01001-000
BrazilDocuments::cep('01001-000')->sanitize();  // 01001000
```

## Classe Support

```php
use Cavalheri\LaravelBrazilDocuments\Support\Cep;

Cep::isValid('01001000');
Cep::format('01001000');
Cep::sanitize('01001-000');
```

## Helper

```php
cep('01001000')->format();
```

O CEP deve conter exatamente 8 dígitos numéricos. Sequências repetidas são rejeitadas.
