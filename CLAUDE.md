# CLAUDE.md — Laravel Brazil Documents

Contexto persistente para Claude (e agentes compatíveis) neste repositório.

## Projeto

**cavalheri/laravel-brazil-documents** — pacote Laravel para documentos brasileiros.

- PHP 8.3+, Laravel 13, Pest, Orchestra Testbench 11
- Namespace: `Cavalheri\LaravelBrazilDocuments`
- Licença: MIT

## API pública (v1)

```php
// Facade
BrazilDocuments::cpf('12345678909')->isValid();
BrazilDocuments::cpf()->generate();

// Support estático
Cpf::format('12345678909');

// Value Object
CpfValue::from('123.456.789-09')->sanitized();

// Validation
new \Cavalheri\LaravelBrazilDocuments\Rules\Cpf;

// Helpers (se config helpers=true)
cpf('12345678909')->format();
```

Mesmo padrão para CNPJ e CEP (CEP sem `generate()`).

## Onde colocar código

| Responsabilidade | Local |
|------------------|--------|
| Dígitos verificadores, sanitize, format | `src/Support/` |
| API fluente (`->isValid()`) | `src/Services/Documents/*Handler.php` |
| Entrada Facade | `src/Services/BrazilDocumentsManager.php` |
| Form Request / validate | `src/Rules/` |
| Mensagens i18n | `resources/lang/{en,pt_BR}/validation.php` |
| Testes sem Laravel | `tests/Unit/` |
| Testes com app Laravel | `tests/Feature/` + `tests/TestCase.php` |

## invariantes

- Sequências repetidas (`11111111111`) são **inválidas**
- Handler sem valor lança `InvalidDocumentException` em `format`/`sanitize`/`isValid`
- Regras usam `ResolvesValidationLocale` + `brazil-documents::validation.*`
- Não expandir escopo além de CPF/CNPJ/CEP sem solicitação

## Documentação

- **Padrão: pt-BR** em `docs/`
- **Inglês** em `docs/en/`
- Alterou uma página → atualize **ambos** os idiomas
- Config: `docs/.vitepress/config.mts` (`locales.root` + `locales.en`)
- Versão na docs: ler **`VERSION`** via `docs/.vitepress/read-version.ts` (nunca hardcodar)
- Autor: Lucas Cavalheri — https://lucascavalheri.com.br · https://github.com/LucasCavalheri · https://linkedin.com/in/lucas-cavalheri
- Docs (Vercel): https://laravel-brazil-documents.lucascavalheri.com.br · `base: '/'` no VitePress

## Workflow do agente

1. Ler código existente antes de escrever (mesmo padrão do documento mais próximo)
2. Implementar Support primeiro, depois handler/rule/VO
3. Rodar `composer test` após mudanças PHP
4. Atualizar **`README.md`** + docs bilíngues se a API ou instalação mudou
5. Packagist: https://packagist.org/packages/cavalheri/laravel-brazil-documents
6. Não commitar/push sem pedido explícito
7. **Sempre sugerir** (English): branch name, commit message, PR title `[M.m] …` from `VERSION`, PR body (Markdown) — see `git-workflow.mdc`

## Comandos

```bash
composer test
npm run docs:dev
```

## Referência rápida de testes

| Documento | Válido | Inválido (repetido) |
|-----------|--------|---------------------|
| CPF | `12345678909` | `11111111111` |
| CNPJ | `11222333000181` | `11111111111111` |
| CEP | `01001000` | `11111111` |

## Mais detalhes

Ver `AGENTS.md` e `.cursor/rules/*.mdc` para checklists completos.
