# AGENTS.md — Laravel Brazil Documents

Guia para agentes de IA trabalhando neste repositório.

## O que é este projeto

Pacote Laravel open-source para **validação**, **formatação**, **sanitização** e **geração** de documentos brasileiros.

| Item | Valor |
|------|--------|
| Pacote | `cavalheri/laravel-brazil-documents` |
| Namespace | `Cavalheri\LaravelBrazilDocuments` |
| PHP | 8.3+ |
| Laravel | 13.x |
| Docs | VitePress — **pt-BR padrão**, inglês em `/en/` |
| Versão | Arquivo **`VERSION`** na raiz (lido pela documentação) |

### Escopo atual (v1)

- **CPF** — validar, formatar, sanitizar, gerar
- **CNPJ** — validar, formatar, sanitizar, gerar
- **CEP** — validar, formatar, sanitizar (sem geração)

### Planejado (não implementar sem pedido)

CNH, PIS/PASEP, CNS, título de eleitor, inscrição estadual, chaves PIX, boleto.

---

## Arquitetura

```
src/
├── Support/           # Algoritmos (fonte da verdade)
├── Services/Documents/# Handlers fluentes
├── ValueObjects/      # DTOs imutáveis
├── Rules/             # ValidationRule do Laravel
├── Facades/           # BrazilDocuments::
├── Helpers/           # cpf(), cnpj(), cep()
├── Concerns/          # Traits compartilhados
├── Contracts/         # Interfaces
└── Exceptions/
```

**Fluxo:** Facade/Helper → `BrazilDocumentsManager` → `{Doc}Handler` → `Support\{Doc}`

---

## Regras de implementação

1. **Algoritmos só em `Support/`** — handlers e rules delegam, não duplicam.
2. **Rejeitar sequências repetidas** — trait `ValidatesRepeatedDigits`.
3. **`declare(strict_types=1);`** em todos os arquivos PHP.
4. **Classes `final`** quando não há extensão planejada.
5. **Diff mínimo** — não refatorar código não relacionado à tarefa.
6. **Testes Pest** — Unit para Support; Feature para Laravel (rules, facade, i18n).
7. **Traduções** — `resources/lang/en/` e `pt_BR/`; chaves em `validation.php`.
8. **Documentação** — sempre `docs/` (pt-BR) **e** `docs/en/` (inglês).
9. **`VERSION`** — ao alterar versão do pacote, atualizar `VERSION` + `CHANGELOG.md`; docs usam `docs/.vitepress/read-version.ts`.

**Autor do pacote:** Lucas Cavalheri — [lucascavalheri.com.br](https://lucascavalheri.com.br) · [GitHub](https://github.com/LucasCavalheri) · [LinkedIn](https://linkedin.com/in/lucas-cavalheri)

---

## Comandos úteis

```bash
composer install
composer test
npm install
npm run docs:dev      # http://localhost:5173/ (pt-BR) e /en/
npm run docs:build
```

---

## Adicionar um novo documento

1. `Support\{Name}.php`
2. `Services/Documents\{Name}Handler.php`
3. `ValueObjects\{Name}Value.php`
4. `Rules\{Name}.php`
5. Atualizar `BrazilDocumentsManager` + `@method` na Facade
6. Helper (opcional) + traduções EN/pt_BR
7. Testes Unit + Feature
8. Páginas `docs/{slug}.md` + `docs/en/{slug}.md` + sidebar em `config.mts`

---

## Testes

- `tests/Pest.php` liga `TestCase` aos testes em `tests/Feature/`
- Orchestra Testbench ^11 com Laravel 13
- Exemplos válidos: CPF `12345678909`, CNPJ `11222333000181`, CEP `01001000`

---

## Git e CI

- **Não commitar** sem pedido explícito do usuário
- Workflows: `.github/workflows/tests.yml` (PHP 8.3/8.4), `docs.yml` (GitHub Pages)
- CHANGELOG: [Keep a Changelog](https://keepachangelog.com/)

---

## Cursor rules

Regras detalhadas em `.cursor/rules/`:

| Arquivo | Escopo |
|---------|--------|
| `package-core.mdc` | Sempre ativo |
| `php-documents.mdc` | `src/**/*.php` |
| `tests-pest.mdc` | `tests/**/*` |
| `docs-i18n.mdc` | `docs/**/*` |
| `versioning.mdc` | Sempre ativo (`VERSION`) |

---

## Comunicação

Responder ao usuário em **português (pt-BR)** salvo pedido em outro idioma.
