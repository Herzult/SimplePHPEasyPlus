<?php

namespace SimplePHPEasyPlus\Calcul;

use SimplePHPEasyPlus\Engine;
use SimplePHPEasyPlus\Number\NumberCollection;
use SimplePHPEasyPlus\Runner\RunnableInterface;
use RuntimeException;

class Calcul implements RunnableInterface
{
    protected $engine;
    protected $numberCollection;
    protected $result;

    public function __construct(Engine $engine, NumberCollection $numberCollection)
    {
        $this->engine = $engine;
        $this->numberCollection = $numberCollection;
    }

    public function run()
    {
        $this->result = $this->engine->run($this->numberCollection);
    }

    public function getResult()
    {
        if(null === $this->result) {
            throw new RuntimeException('You must run me before');
        }

        return $this->result;
    }
}
