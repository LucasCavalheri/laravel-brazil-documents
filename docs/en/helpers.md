# Helpers

When `config('brazil-documents.helpers')` is `true` (default), these functions are available globally:

```php
cpf('12345678909')->format();
cnpj('11222333000181')->format();
cep('01001000')->format();

cpf()->generate();
cnpj()->generate();
```

Disable helpers in config if you prefer to avoid global functions:

```php
'helpers' => false,
```
