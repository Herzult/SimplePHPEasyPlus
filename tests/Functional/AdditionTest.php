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

class AdditionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Verifies that 1 + 1 = 2
     */
    public function testSimpleAddition()
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

        $this->assertEquals(5, $numericResult);
    }
}
