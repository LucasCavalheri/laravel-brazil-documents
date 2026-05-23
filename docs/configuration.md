# Configuração

Publique o arquivo de configuração:

```bash
php artisan vendor:publish --tag=brazil-documents-config
```

```php
return [
    'helpers' => true,
    'locale' => null,
];
```

| Opção     | Descrição                                                                                    |
| --------- | -------------------------------------------------------------------------------------------- |
| `helpers` | Quando `true`, registra as funções globais `cpf()`, `cnpj()` e `cep()`.                      |
| `locale`  | Sobrescreve o idioma das mensagens de validação. Quando `null`, usa `app()->getLocale()`.    |
