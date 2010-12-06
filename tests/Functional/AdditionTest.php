<?php

class AdditionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Verifies that 1 + 1 = 2
     */
    public function testAddition()
    {
        $numberCollection= new NumberCollection();

        $numberReader = new NumberStringReader('1');
        $number = new Number($numberReader);

        $numberCollection->add(new Number(1));
        $numberCollection->add(new Number(1));

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
