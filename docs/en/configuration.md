# Configuration

Publish the config file:

```bash
php artisan vendor:publish --tag=brazil-documents-config
```

```php
return [
    'helpers' => true,
    'locale' => null,
];
```

| Option    | Description                                                                 |
| --------- | --------------------------------------------------------------------------- |
| `helpers` | When `true`, registers global `cpf()`, `cnpj()`, and `cep()` helper functions. |
| `locale`  | Override validation message locale. When `null`, uses `app()->getLocale()`. |
