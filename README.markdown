### This awesome yet simple and pragmatic PHP library performs an addition of two numbers.

[![Build Status](https://travis-ci.org/Herzult/SimplePHPEasyPlus.svg?branch=master)](https://travis-ci.org/Herzult/SimplePHPEasyPlus)

In early stages of Internet, developers were forced to work with poor, dry, imperative, horrific languages.
Everything had to be done through austere functions and operators. There was no objects. No interfaces. No dependency injection.

For example, to make something as simple as an addition, our dads had to write: `1+1`.
Yeah, really.

Hopefully now, we have PHP 5.3 and its solid OOP implementation.
SimplePHPEasyPlus lets you make this addition in a more fashionable way, using real OOP.
It is fast, simple, flexible and tested. To add `1` to `1`, all you have to do is:

```php
use SimplePHPEasyPlus\Number\NumberCollection;
use SimplePHPEasyPlus\Number\SimpleNumber;
use SimplePHPEasyPlus\Number\CollectionItemNumberProxy;
use SimplePHPEasyPlus\Parser\SimpleNumberStringParser;
use SimplePHPEasyPlus\Iterator\CallbackIterator;
use SimplePHPEasyPlus\Operator\AdditionOperator;
use SimplePHPEasyPlus\Operation\ArithmeticOperation;
use SimplePHPEasyPlus\Operation\OperationStream;
use SimplePHPEasyPlus\Engine;
use SimplePHPEasyPlus\Calcul\Calcul;
use SimplePHPEasyPlus\Calcul\CalculRunner;


$numberCollection = new NumberCollection();

$numberParser = new SimpleNumberStringParser();

$firstParsedNumber = $numberParser->parse('1');
$firstNumber = new SimpleNumber($firstParsedNumber);
$firstNumberProxy = new CollectionItemNumberProxy($firstNumber);

$numberCollection->add($firstNumberProxy);

$secondParsedNumber = $numberParser->parse('1');
$secondNumber = new SimpleNumber($secondParsedNumber);
$secondNumberProxy = new CollectionItemNumberProxy($secondNumber);

$numberCollection->add($secondNumberProxy);

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
