# Regras de validação

```php
use Cavalheri\LaravelBrazilDocuments\Rules\Cpf;
use Cavalheri\LaravelBrazilDocuments\Rules\Cnpj;
use Cavalheri\LaravelBrazilDocuments\Rules\Cep;
use Cavalheri\LaravelBrazilDocuments\Rules\Cnh;

$request->validate([
    'cpf' => ['required', new Cpf],
    'cnpj' => ['required', new Cnpj],
    'cep' => ['required', new Cep],
    'cnh' => ['required', new Cnh],
]);
```

As regras aceitam valores formatados ou sanitizados. Valores inválidos disparam mensagens localizadas de `brazil-documents::validation.*`.
