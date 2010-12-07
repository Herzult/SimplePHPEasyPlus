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
use SimplePHPEasyPlus\Calcul;
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

        $firstParsedNumber = $numberParser->parse('1');
        $firstNumber = new SimpleNumber($firstParsedNumber);
        $firstNumberProxy = new CollectionItemNumberProxy($firstNumber);

        $numberCollection->add($firstNumberProxy);

        $secondParsedNumber = $numberParser->parse('1');
        $secondNumber = new SimpleNumber($secondParsedNumber);
        $secondNumberProxy = new CollectionItemNumberProxy($secondNumber);

        $numberCollection->add($secondNumberProxy);

        $addition = new AdditionOperator();

        $operation = new ArithmeticOperation($addition);

        $engine = new Engine();
        $engine->setOperation($operation);

        $calcul = new Calcul($engine);

        $runner = new CalculRunner($numberCollection);

        $result = $runner->run($calcul);
        $numericResult = $result->getValue();

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
        $numericResult = $result->getValue();

        $this->assertEquals(2, $numericResult);
    }

    /**
     * Verifies that 1 + 1 + 1 = 3
     */
    public function testComplexAddition()
    {
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

        $thirdParsedNumber = $numberParser->parse('1');
        $thirdNumber = new SimpleNumber($thirdParsedNumber);
        $thirdNumberProxy = new CollectionItemNumberProxy($thirdNumber);

        $numberCollection->add($thirdNumberProxy);

        $addition = new AdditionOperator();

        $operation = new ArithmeticOperation($addition);

        $engine = new Engine();
        $engine->setOperation($operation);

        $calcul = new Calcul($engine);

        $runner = new CalculRunner();

        $result = $runner->run($calcul);
        $numericResult = $result->getValue();

        $this->assertEquals(2, $numericResult);
    }

}
