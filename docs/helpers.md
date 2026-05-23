# Helpers

Quando `config('brazil-documents.helpers')` é `true` (padrão), estas funções ficam disponíveis globalmente:

```php
cpf('12345678909')->format();
cnpj('11222333000181')->format();
cep('01001000')->format();
cnh('12345678900')->format();

cpf()->generate();
cnpj()->generate();
cnh()->generate();
```

Desative os helpers na config se preferir evitar funções globais:

```php
'helpers' => false,
```
