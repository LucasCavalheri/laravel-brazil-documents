# Laravel Brazil Documents

[![Latest Version on Packagist](https://img.shields.io/packagist/v/cavalheri/laravel-brazil-documents.svg)](https://packagist.org/packages/cavalheri/laravel-brazil-documents)
[![Total Downloads](https://img.shields.io/packagist/dt/cavalheri/laravel-brazil-documents.svg)](https://packagist.org/packages/cavalheri/laravel-brazil-documents)
[![License](https://img.shields.io/packagist/l/cavalheri/laravel-brazil-documents.svg)](https://packagist.org/packages/cavalheri/laravel-brazil-documents)
[![Tests](https://github.com/cavalheri/laravel-brazil-documents/actions/workflows/tests.yml/badge.svg)](https://github.com/cavalheri/laravel-brazil-documents/actions/workflows/tests.yml)

An elegant, Laravel-first toolkit for validating, formatting, sanitizing, and generating Brazilian documents.

**Version 1** includes **CPF**, **CNPJ**, and **CEP**. Current version: see [`VERSION`](VERSION). The architecture is prepared for future document types.

**Author:** [Lucas Cavalheri](https://lucascavalheri.com.br) · [GitHub](https://github.com/LucasCavalheri) · [LinkedIn](https://linkedin.com/in/lucas-cavalheri)

**Install via Composer:** [packagist.org/packages/cavalheri/laravel-brazil-documents](https://packagist.org/packages/cavalheri/laravel-brazil-documents)

## Requirements

- PHP 8.3+
- Laravel 13.x

## Documentation

Documentação completa (padrão **pt-BR**): [cavalheri.github.io/laravel-brazil-documents](https://cavalheri.github.io/laravel-brazil-documents/)

English version: [/en/](https://cavalheri.github.io/laravel-brazil-documents/en/)

Local preview:

```bash
npm install
npm run docs:dev
```

## Changelog

See [CHANGELOG.md](CHANGELOG.md) for release notes.

## Installation

Published on [Packagist](https://packagist.org/packages/cavalheri/laravel-brazil-documents):

```bash
composer require cavalheri/laravel-brazil-documents
```

The package supports Laravel auto-discovery. No manual registration is required.

## Configuration

Publish the configuration file:

```bash
php artisan vendor:publish --tag=brazil-documents-config
```

```php
return [
    'helpers' => true,
    'locale' => null,
];
```

- **helpers** — Registers global `cpf()`, `cnpj()`, and `cep()` helpers when `true`.
- **locale** — Overrides the locale used for validation messages. When `null`, Laravel's current locale is used.

## Quick Start

### Facade

```php
use Cavalheri\LaravelBrazilDocuments\Facades\BrazilDocuments;

BrazilDocuments::cpf('12345678909')->isValid();
BrazilDocuments::cpf('12345678909')->format();
BrazilDocuments::cpf('123.456.789-09')->sanitize();
BrazilDocuments::cpf()->generate();

BrazilDocuments::cnpj('11222333000181')->isValid();
BrazilDocuments::cep('01001000')->format();
```

### Support classes

```php
use Cavalheri\LaravelBrazilDocuments\Support\Cpf;
use Cavalheri\LaravelBrazilDocuments\Support\Cnpj;
use Cavalheri\LaravelBrazilDocuments\Support\Cep;

Cpf::isValid('12345678909');
Cpf::format('12345678909');
Cpf::sanitize('123.456.789-09');
Cpf::generate();
```

### Value objects

```php
use Cavalheri\LaravelBrazilDocuments\ValueObjects\CpfValue;

CpfValue::from('12345678909')->formatted();
CpfValue::from('123.456.789-09')->sanitized();
CpfValue::from('12345678909')->isValid();
```

### Validation rules

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

### Helpers

When enabled in config:

```php
cpf('12345678909')->format();
cnpj('11222333000181')->format();
cep('01001000')->format();
```

## Localization

Validation messages are available in **English** (default) and **Portuguese (pt_BR)**.

Publish translations:

```bash
php artisan vendor:publish --tag=brazil-documents-lang
```

Switch locale at runtime:

```php
app()->setLocale('pt_BR');
```

Or override via config:

```php
'locale' => 'pt_BR',
```

## Validation behavior

- **CPF** and **CNPJ** use official check-digit algorithms.
- **Repeated sequences** (e.g. `11111111111`, `00000000000`) are rejected.
- **CEP** must contain exactly 8 numeric digits.

## Testing

```bash
composer test
```

With coverage:

```bash
composer test:coverage
```

## Project structure

```txt
config/brazil-documents.php
resources/lang/en/validation.php
resources/lang/pt_BR/validation.php
src/
├── Concerns/
├── Contracts/
├── Exceptions/
├── Facades/
├── Helpers/
├── Rules/
├── Services/
│   └── Documents/
├── Support/
├── ValueObjects/
└── LaravelBrazilDocumentsServiceProvider.php
tests/
├── Feature/
└── Unit/
```

## Roadmap

Planned document types for future releases:

- CNH (driver license)
- PIS/PASEP
- CNS (national health card)
- Voter ID (Título de Eleitor)
- State registration (Inscrição Estadual)
- PIX keys
- Boleto validation

## Contributing

Contributions are welcome. Please open an issue before large changes, and ensure tests pass:

```bash
composer test
```

Follow PSR-12 and keep the public API consistent with existing document handlers.

For AI-assisted development, see [AGENTS.md](AGENTS.md) and [CLAUDE.md](CLAUDE.md). Cursor rules live in `.cursor/rules/`.

## License

The MIT License (MIT). See [LICENSE](LICENSE) for details.
