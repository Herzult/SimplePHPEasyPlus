<?php

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

require_once(__DIR__.'/../tests/bootstrap.php');

function process($a, $b)
{
    $numberCollection = new NumberCollection();

    $numberParser = new SimpleNumberStringParser();

    $firstParsedNumber = $numberParser->parse('2');
    $firstNumber = new SimpleNumber($firstParsedNumber);
    $firstNumberProxy = new CollectionItemNumberProxy($firstNumber);

    $numberCollection->add($firstNumberProxy);

    $secondParsedNumber = $numberParser->parse('3');
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
    $numericResult = $result->getValue();
}

$number = 100000;
$a = $b = 1;

$start = microtime(true);
for($i=0;$i<10000;++$i) {
    $a+$b;
}
$time1 = microtime(true) - $start;
printf('Native PHP "+" operator: %01.2f ms.%s', $time1*1000, "\n");

$start = microtime(true);
for($i=0;$i<10000;++$i) {
    process($a, $b);
}
$time2 = microtime(true) - $start;
printf('SimplePHPEasyPlus: %01.2f ms.%s', $time2*1000, "\n");

printf('Ratio: %01.2f%s', $time2/$time1, "\n");
