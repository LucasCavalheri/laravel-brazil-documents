# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

## [1.4.0] - 2026-05-23

### Added

- Voter ID (Título de eleitor) validation, formatting, sanitization, and generation
- Modulo 11 check digits with state code validation (UF 01–28)
- `Support\TituloEleitor`, `TituloEleitorValue`, `Rules\TituloEleitor`, `tituloEleitor()` helper, and `BrazilDocuments::tituloEleitor()` facade API
- English and Brazilian Portuguese validation messages
- Documentation pages for voter ID (pt-BR and English)

## [1.3.0] - 2026-05-23

### Added

- CNS (Cartão Nacional de Saúde) validation, formatting, sanitization, and generation
- Definitive (starts with 1 or 2) and provisional (starts with 7, 8, or 9) DATASUS algorithms
- `Support\Cns`, `CnsValue`, `Rules\Cns`, `cns()` helper, and `BrazilDocuments::cns()` facade API
- English and Brazilian Portuguese validation messages for CNS
- Documentation pages for CNS (pt-BR and English)

## [1.2.0] - 2026-05-23

### Added

- PIS/PASEP (NIS) validation, formatting, sanitization, and generation
- `Support\Pis`, `PisValue`, `Rules\Pis`, `pis()` helper, and `BrazilDocuments::pis()` facade API
- English and Brazilian Portuguese validation messages for PIS/PASEP
- Documentation pages for PIS/PASEP (pt-BR and English)

## [1.1.0] - 2026-05-23

### Added

- CNH registration number validation, formatting, sanitization, and generation
- `Support\Cnh`, `CnhValue`, `Rules\Cnh`, `cnh()` helper, and `BrazilDocuments::cnh()` facade API
- English and Brazilian Portuguese validation messages for CNH
- Documentation pages for CNH (pt-BR and English)

## [1.0.1] - 2026-05-23

### Changed

- Documentation hosted on Vercel at [laravel-brazil-documents.lucascavalheri.com.br](https://laravel-brazil-documents.lucascavalheri.com.br)
- GitHub Actions `docs.yml` validates VitePress build only (no GitHub Pages deploy)
- VitePress `base` set to `/` for custom domain

### Added

- Bilingual documentation (pt-BR default, English at `/en/`)
- Author page and footer links (website, GitHub, LinkedIn)
- `VERSION` file as single source of truth for package and docs version
- Contributor guides: `AGENTS.md`, `CLAUDE.md`, and `.cursor/rules/`
- GitHub issue and pull request templates
- `SECURITY.md` policy

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

[Unreleased]: https://github.com/LucasCavalheri/laravel-brazil-documents/compare/v1.4.0...HEAD
[1.4.0]: https://github.com/LucasCavalheri/laravel-brazil-documents/compare/v1.3.0...v1.4.0
[1.3.0]: https://github.com/LucasCavalheri/laravel-brazil-documents/compare/v1.2.0...v1.3.0
[1.2.0]: https://github.com/LucasCavalheri/laravel-brazil-documents/compare/v1.1.0...v1.2.0
[1.1.0]: https://github.com/LucasCavalheri/laravel-brazil-documents/compare/v1.0.1...v1.1.0
[1.0.1]: https://github.com/LucasCavalheri/laravel-brazil-documents/compare/v1.0.0...v1.0.1
[1.0.0]: https://github.com/LucasCavalheri/laravel-brazil-documents/releases/tag/v1.0.0
