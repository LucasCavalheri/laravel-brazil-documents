# Helpers

Quando `config('brazil-documents.helpers')` é `true` (padrão), estas funções ficam disponíveis globalmente:

```php
cpf('12345678909')->format();
cnpj('11222333000181')->format();
cep('01001000')->format();

cpf()->generate();
cnpj()->generate();
```

Desative os helpers na config se preferir evitar funções globais:

```php
'helpers' => false,
```
