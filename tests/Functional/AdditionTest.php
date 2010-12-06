<?php

use SimplePHPEasyPlus\Number\NumberCollection;
use SimplePHPEasyPlus\Number\SimpleNumber;
use SimplePHPEasyPlus\Parser\SimpleNumberStringParser;
use SimplePHPEasyPlus\Iterator\CallbackIterator;
use SimplePHPEasyPlus\Operator\AdditionOperator;
use SimplePHPEasyPlus\Operation\ArithmeticOperation;
use SimplePHPEasyPlus\Operation\OperationStream;
use SimplePHPEasyPlus\Engine;
use SimplePHPEasyPlus\Calcul;
use SimplePHPEasyPlus\Calcul\CalculRunner;

class AdditionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Verifies that 1 + 1 = 2
     */
    public function testAddition()
    {
        $numberCollection = new NumberCollection();

        $numberParser = new SimpleNumberStringParser();

        $firstParsedNumber = $numberParser->parse('1');
        $firstNumber = new SimpleNumber($firstParsedNumber);

        $numberCollection->add($firstNumber);

        $secondParsedNumber = $numberParser->parse('1');
        $secondNumber = new SimpleNumber($secondParsedNumber);

        $numberCollection->add($secondNumber);

        $iterator = new CallbackIterator();
        $addition = new AdditionOperator($iterator);

        $operation = new ArithmeticOperation();
        $operation->setOperator($addition);

        $iterator = new CallbackIterator();
        $operationStream = new OperationStream($iterator);
        $operationStream->addOperation($operation);

        $engine = new Engine();
        $engine->setOperationStream($operationStream);

        $calcul = new Calcul();
        $calcul->setEngine($engine);
        $calcul->setNumberCollection($numberCollection);

        $runner = new CalculRunner();

        $result = $runner->run($calcul);
        $numericResult = $result->getNumericValue();

        $this->assertEquals(2, $numericResult);
    }
}
