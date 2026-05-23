# CNPJ

## Facade

```php
use Cavalheri\LaravelBrazilDocuments\Facades\BrazilDocuments;

BrazilDocuments::cnpj('11222333000181')->isValid();
BrazilDocuments::cnpj('11222333000181')->format();        // 11.222.333/0001-81
BrazilDocuments::cnpj('11.222.333/0001-81')->sanitize();  // 11222333000181
BrazilDocuments::cnpj()->generate();
```

## Classe Support

```php
use Cavalheri\LaravelBrazilDocuments\Support\Cnpj;

Cnpj::isValid('11222333000181');
Cnpj::format('11222333000181');
Cnpj::sanitize('11.222.333/0001-81');
Cnpj::generate();
```

## Helper

```php
cnpj('11222333000181')->format();
cnpj()->generate();
```
