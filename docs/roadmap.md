# Roadmap

## Disponível

| Documento | Recursos |
| --------- | -------- |
| CPF | Validar, formatar, sanitizar, gerar |
| CNPJ | Validar, formatar, sanitizar, gerar |
| CEP | Validar, formatar, sanitizar |
| CNH | Validar, formatar, sanitizar, gerar (número de registro) |
| PIS/PASEP | Validar, formatar, sanitizar, gerar (NIS) |

## Planejado

| Documento           | Escopo                                              |
| ------------------- | --------------------------------------------------- |
| CNS                 | Algoritmo do cartão nacional de saúde               |
| Título de eleitor   | Validação de título de eleitor                      |
| Inscrição estadual  | Estratégias por UF (SP, MG, etc.)                   |
| Chaves PIX          | E-mail, telefone, EVP, CPF/CNPJ                     |
| Boleto              | Linha digitável e código de barras (FEBRABAN)       |

Cada novo documento seguirá o mesmo padrão: classe Support, handler, value object, rule, traduções e testes.
