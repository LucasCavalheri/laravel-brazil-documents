# Roadmap

A versão 1 inclui **CPF**, **CNPJ** e **CEP**.

## Planejado

| Documento           | Escopo                                              |
| ------------------- | --------------------------------------------------- |
| CNH                 | Validação de número conforme regras por estado      |
| PIS/PASEP           | Validação de dígito verificador                     |
| CNS                 | Algoritmo do cartão nacional de saúde               |
| Título de eleitor   | Validação de título de eleitor                      |
| Inscrição estadual  | Estratégias por UF (SP, MG, etc.)                   |
| Chaves PIX          | E-mail, telefone, EVP, CPF/CNPJ                     |
| Boleto              | Linha digitável e código de barras (FEBRABAN)       |

Cada novo documento seguirá o mesmo padrão: classe Support, handler, value object, rule, traduções e testes.
