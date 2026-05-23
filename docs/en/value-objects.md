# Value Objects

Immutable value objects wrap document strings:

```php
use Cavalheri\LaravelBrazilDocuments\ValueObjects\CpfValue;
use Cavalheri\LaravelBrazilDocuments\ValueObjects\CnpjValue;
use Cavalheri\LaravelBrazilDocuments\ValueObjects\CepValue;

CpfValue::from('12345678909')->formatted();
CpfValue::from('123.456.789-09')->sanitized();
CpfValue::from('12345678909')->isValid();

(string) CpfValue::from('12345678909'); // original input
```

Same API for `CnpjValue` and `CepValue`.
