### This awesome yet simple and pragmatic PHP library performs an addition of two numbers.

[![Build Status](https://secure.travis-ci.org/Herzult/SimplePHPEasyPlus.png)](http://travis-ci.org/Herzult/SimplePHPEasyPlus)

In early stages of Internet, developers were forced to work with poor, dry, imperative, horrific languages.
Everything had to be done through austere functions and operators. There was no objects. No interfaces. No dependency injection.

For example, to make something as simple as an addition, our dads had to write: `1+1`.
Yeah, really.

Hopefuly now, we have PHP 5.3 and its solid OOP implementation.
SimplePHPEasyPlus lets you make this addition in a more fashionable way, using real OOP.
It is fast, simple, flexible and tested. To add `1` to `1`, all you have to do is:

```php
use SimplePHPEasyPlus\Number\NumberCollectionBuilder;
use SimplePHPEasyPlus\Operator\AdditionOperator;
use SimplePHPEasyPlus\Operation\ArithmeticOperation;
use SimplePHPEasyPlus\Engine;
use SimplePHPEasyPlus\Calcul\Calcul;
use SimplePHPEasyPlus\Calcul\CalculRunner;

$numberCollectionBuilder = new NumberCollectionBuilder(
    new SimpleNumberStringParserFactory(),
    new SimpleNumberFactory(),
    new CollectionItemNumberProxyFactory()
);
$numberCollectionBuilder->add('2');
$numberCollectionBuilder->add('3');

$numberCollection = $numberCollectionBuilder->resolve();

$addition = new AdditionOperator('SimplePHPEasyPlus\Number\SimpleNumber');

$operation = new ArithmeticOperation($addition);

$engine = new Engine($operation);

$calcul = new Calcul($engine, $numberCollection);

$runner = new CalculRunner();

$runner->run($calcul);

$result = $calcul->getResult();
$numericResult = $result->getValue(); // 2
```

This library is now available for production purposes. Enjoy!
