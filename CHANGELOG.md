# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

## [1.0.0] - 2026-05-23

### Added

- CPF validation, formatting, sanitization, and generation
- CNPJ validation, formatting, sanitization, and generation
- CEP validation, formatting, and sanitization
- `BrazilDocuments` facade with fluent API
- Static support classes: `Cpf`, `Cnpj`, and `Cep`
- Immutable value objects: `CpfValue`, `CnpjValue`, and `CepValue`
- Laravel validation rules: `Rules\Cpf`, `Rules\Cnpj`, and `Rules\Cep`
- Optional global helpers: `cpf()`, `cnpj()`, and `cep()`
- English and Brazilian Portuguese (`pt_BR`) validation messages
- Publishable configuration and translation files
- Rejection of repeated digit sequences (e.g. `11111111111`)
- Pest test suite with Orchestra Testbench for Laravel 13

[Unreleased]: https://github.com/cavalheri/laravel-brazil-documents/compare/v1.0.0...HEAD
[1.0.0]: https://github.com/cavalheri/laravel-brazil-documents/releases/tag/v1.0.0
