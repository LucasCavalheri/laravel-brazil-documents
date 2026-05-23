# CNS

Validação do **Cartão Nacional de Saúde** (CNS) — 15 dígitos, algoritmo DATASUS.

- **Definitivo** (inicia com `1` ou `2`): dígito verificador calculado sobre os 11 primeiros dígitos.
- **Provisório** (inicia com `7`, `8` ou `9`): soma ponderada dos 15 dígitos deve ser múltipla de 11.

## Facade

```php
use Cavalheri\LaravelBrazilDocuments\Facades\BrazilDocuments;

BrazilDocuments::cns('279802393660003')->isValid();
BrazilDocuments::cns('279802393660003')->format();      // 279 8023 9366 0003
BrazilDocuments::cns('279 8023 9366 0003')->sanitize(); // 279802393660003
BrazilDocuments::cns()->generate();
```

## Classe Support

```php
use Cavalheri\LaravelBrazilDocuments\Support\Cns;

Cns::isValid('279802393660003');
Cns::format('279802393660003');
Cns::sanitize('279 8023 9366 0003');
Cns::generate();
```

## Helper

```php
cns('279802393660003')->format();
cns()->generate();
```

## Regra de validação

```php
use Cavalheri\LaravelBrazilDocuments\Rules\Cns;

$request->validate(['cns' => ['required', new Cns]]);
```

A validação é matemática (integridade do número), não confirma cadastro no SUS.
