# Título de eleitor

Validação do **título de eleitor** — 12 dígitos (8 sequenciais + código UF + 2 verificadores), módulo 11.

Estrutura: `XXXX XXXX XXXX` — os dígitos 9 e 10 indicam o código do estado (01 a 28, incluindo exterior).

## Facade

```php
use Cavalheri\LaravelBrazilDocuments\Facades\BrazilDocuments;

BrazilDocuments::tituloEleitor('825169091279')->isValid();
BrazilDocuments::tituloEleitor('825169091279')->format();      // 8251 6909 1279
BrazilDocuments::tituloEleitor('8251 6909 1279')->sanitize(); // 825169091279
BrazilDocuments::tituloEleitor()->generate();
```

## Classe Support

```php
use Cavalheri\LaravelBrazilDocuments\Support\TituloEleitor;

TituloEleitor::isValid('825169091279');
TituloEleitor::format('825169091279');
TituloEleitor::sanitize('8251 6909 1279');
TituloEleitor::generate();
```

## Helper

```php
tituloEleitor('825169091279')->format();
tituloEleitor()->generate();
```

## Regra de validação

```php
use Cavalheri\LaravelBrazilDocuments\Rules\TituloEleitor;

$request->validate(['titulo_eleitor' => ['required', new TituloEleitor]]);
```

A validação é matemática; não confirma cadastro no TSE.
