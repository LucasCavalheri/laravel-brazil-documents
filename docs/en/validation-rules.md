# Validation Rules

```php
use Cavalheri\LaravelBrazilDocuments\Rules\Cpf;
use Cavalheri\LaravelBrazilDocuments\Rules\Cnpj;
use Cavalheri\LaravelBrazilDocuments\Rules\Cep;
use Cavalheri\LaravelBrazilDocuments\Rules\Cnh;
use Cavalheri\LaravelBrazilDocuments\Rules\Pis;

$request->validate([
    'cpf' => ['required', new Cpf],
    'cnpj' => ['required', new Cnpj],
    'cep' => ['required', new Cep],
    'cnh' => ['required', new Cnh],
    'pis' => ['required', new Pis],
]);
```

Rules accept formatted or sanitized input. Invalid values trigger localized messages from `brazil-documents::validation.*`.
