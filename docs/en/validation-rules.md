# Validation Rules

```php
use Cavalheri\LaravelBrazilDocuments\Rules\Cpf;
use Cavalheri\LaravelBrazilDocuments\Rules\Cnpj;
use Cavalheri\LaravelBrazilDocuments\Rules\Cep;

$request->validate([
    'cpf' => ['required', new Cpf],
    'cnpj' => ['required', new Cnpj],
    'cep' => ['required', new Cep],
]);
```

Rules accept formatted or sanitized input. Invalid values trigger localized messages from `brazil-documents::validation.*`.
