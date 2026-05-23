# Helpers

When `config('brazil-documents.helpers')` is `true` (default), these functions are available globally:

```php
cpf('12345678909')->format();
cnpj('11222333000181')->format();
cep('01001000')->format();
cnh('12345678900')->format();
pis('12056413177')->format();
cns('279802393660003')->format();
tituloEleitor('825169091279')->format();

cpf()->generate();
cnpj()->generate();
cnh()->generate();
pis()->generate();
cns()->generate();
tituloEleitor()->generate();
```

Disable helpers in config if you prefer to avoid global functions:

```php
'helpers' => false,
```
