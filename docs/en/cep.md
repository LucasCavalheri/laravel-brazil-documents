# CEP

CEP supports validation, formatting, and sanitization. Generation is not included in v1.

## Facade

```php
use Cavalheri\LaravelBrazilDocuments\Facades\BrazilDocuments;

BrazilDocuments::cep('01001000')->isValid();
BrazilDocuments::cep('01001000')->format();     // 01001-000
BrazilDocuments::cep('01001-000')->sanitize();  // 01001000
```

## Support class

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

CEP must contain exactly 8 numeric digits. Repeated sequences are rejected.
