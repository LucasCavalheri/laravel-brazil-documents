# Regras de validação

```php
use Cavalheri\LaravelBrazilDocuments\Rules\Cpf;
use Cavalheri\LaravelBrazilDocuments\Rules\Cnpj;
use Cavalheri\LaravelBrazilDocuments\Rules\Cep;
use Cavalheri\LaravelBrazilDocuments\Rules\Cnh;
use Cavalheri\LaravelBrazilDocuments\Rules\Pis;
use Cavalheri\LaravelBrazilDocuments\Rules\Cns;

$request->validate([
    'cpf' => ['required', new Cpf],
    'cnpj' => ['required', new Cnpj],
    'cep' => ['required', new Cep],
    'cnh' => ['required', new Cnh],
    'pis' => ['required', new Pis],
    'cns' => ['required', new Cns],
]);
```

As regras aceitam valores formatados ou sanitizados. Valores inválidos disparam mensagens localizadas de `brazil-documents::validation.*`.
