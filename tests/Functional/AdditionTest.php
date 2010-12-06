<?php

use SimplePHPEasyPlus\Number\NumberCollection;
use SimplePHPEasyPlus\Number\SimpleNumber;

class AdditionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Verifies that 1 + 1 = 2
     */
    public function testAddition()
    {
        $numberCollection = new NumberCollection();

        $numberParser = new SimpleNumberStringParser();
        $number = new Number($numberParser->parse('1'));

        $numberCollection->add(clone $number);
        $numberCollection->add(clone $number);

        $iterator = new CallbackIterator();
        $addition = new Addition($iterator);

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
