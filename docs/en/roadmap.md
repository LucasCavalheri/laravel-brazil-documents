# Roadmap

Version 1 ships **CPF**, **CNPJ**, and **CEP**.

## Planned

| Document              | Scope                                      |
| --------------------- | ------------------------------------------ |
| CNH                   | Number validation by state rules           |
| PIS/PASEP             | Check-digit validation                     |
| CNS                   | National health card algorithm             |
| Voter ID              | Título de eleitor validation               |
| State registration    | Per-UF inscrição estadual strategies       |
| PIX keys              | Email, phone, EVP, CPF/CNPJ                |
| Boleto                | Linha digitável and barcode validation     |

Each new document will follow the same pattern: Support class, handler, value object, rule, translations, and tests.
