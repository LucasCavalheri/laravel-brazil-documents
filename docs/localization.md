# Localização

O idioma padrão das mensagens de validação é **inglês**. O português brasileiro (`pt_BR`) também está incluído.

## Locale em tempo de execução

```php
app()->setLocale('pt_BR');
```

## Sobrescrever via config

```php
// config/brazil-documents.php
'locale' => 'pt_BR',
```

## Publicar traduções

```bash
php artisan vendor:publish --tag=brazil-documents-lang
```

Os arquivos são publicados em `lang/vendor/brazil-documents/`.

## Mensagens

| Chave  | Inglês (padrão)            | Português (`pt_BR`)               |
| ------ | -------------------------- | --------------------------------- |
| `cpf`  | The CPF is invalid.        | O CPF informado é inválido.       |
| `cnpj` | The CNPJ is invalid.       | O CNPJ informado é inválido.      |
| `cep`  | The CEP is invalid.        | O CEP informado é inválido.       |
| `cnh`  | The CNH is invalid.        | A CNH informada é inválida.       |
| `pis`  | The PIS/PASEP is invalid.  | O PIS/PASEP informado é inválido. |
| `cns`  | The CNS is invalid.        | O CNS informado é inválido.       |
| `titulo_eleitor` | The voter ID is invalid. | O título de eleitor informado é inválido. |
