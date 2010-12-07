<?php

namespace SimplePHPEasyPlus\Calcul;

use SimplePHPEasyPlus\Engine;
use SimplePHPEasyPlus\Number\NumberCollection;
use SimplePHPEasyPlus\Runner\RunnableInterface;

class Calcul implements RunnableInterface
{
    protected $engine;

    public function __construct(Engine $engine)
    {
        $this->engine = $engine;
    }

    public function run(NumberCollection $collection)
    {
        $this->engine->run($collection);
    }
}
