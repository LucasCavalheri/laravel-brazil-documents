# Localization

Default language is **English**. Portuguese (`pt_BR`) is included.

## Runtime locale

```php
app()->setLocale('pt_BR');
```

## Config override

```php
// config/brazil-documents.php
'locale' => 'pt_BR',
```

## Publish translations

```bash
php artisan vendor:publish --tag=brazil-documents-lang
```

Files are published to `lang/vendor/brazil-documents/`.

## Messages

| Key   | English                    | Portuguese (`pt_BR`)              |
| ----- | -------------------------- | --------------------------------- |
| `cpf` | The CPF is invalid.        | O CPF informado é inválido.       |
| `cnpj`| The CNPJ is invalid.       | O CNPJ informado é inválido.      |
| `cep` | The CEP is invalid.        | O CEP informado é inválido.       |
| `cnh` | The CNH is invalid.        | A CNH informada é inválida.       |
| `pis` | The PIS/PASEP is invalid.  | O PIS/PASEP informado é inválido. |
| `cns` | The CNS is invalid.        | O CNS informado é inválido.       |
| `titulo_eleitor` | The voter ID is invalid. | O título de eleitor informado é inválido. |
