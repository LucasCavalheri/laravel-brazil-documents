# Roadmap

## Disponível

| Documento | Recursos |
| --------- | -------- |
| CPF | Validar, formatar, sanitizar, gerar |
| CNPJ | Validar, formatar, sanitizar, gerar |
| CEP | Validar, formatar, sanitizar |
| CNH | Validar, formatar, sanitizar, gerar (número de registro) |
| PIS/PASEP | Validar, formatar, sanitizar, gerar (NIS) |
| CNS | Validar, formatar, sanitizar, gerar (definitivo e provisório) |
| Título de eleitor | Validar, formatar, sanitizar, gerar |

## Planejado

| Documento           | Escopo                                              |
| ------------------- | --------------------------------------------------- |
| Inscrição estadual  | Estratégias por UF (SP, MG, etc.)                   |
| Chaves PIX          | E-mail, telefone, EVP, CPF/CNPJ                     |
| Boleto              | Linha digitável e código de barras (FEBRABAN)       |

Cada novo documento seguirá o mesmo padrão: classe Support, handler, value object, rule, traduções e testes.
