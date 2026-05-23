# Roadmap

## Available

| Document | Features |
| -------- | -------- |
| CPF | Validate, format, sanitize, generate |
| CNPJ | Validate, format, sanitize, generate |
| CEP | Validate, format, sanitize |
| CNH | Validate, format, sanitize, generate (registration number) |

## Planned

| Document | Scope |
| -------- | ----- |
| PIS/PASEP | Check-digit validation |
| CNS | National health card algorithm |
| Voter ID | Voter registration validation |
| State registration | Per-state (UF) strategies |
| PIX keys | Email, phone, EVP, CPF/CNPJ |
| Boleto | Linha digitável and barcode (FEBRABAN) |

Each new document follows the same pattern: Support class, handler, value object, rule, translations, and tests.
