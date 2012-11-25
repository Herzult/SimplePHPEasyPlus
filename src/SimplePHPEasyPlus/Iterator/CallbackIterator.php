<?php

namespace SimplePHPEasyPlus\Iterator;

use RuntimeException;
use Closure;

class CallbackIterator implements IteratorInterface
{
    protected $closure;

    public function __construct(Closure $closure)
    {
        $this->closure = $closure;
    }

    public function iterate(IteratorableInterface $iteratorable)
    {
        foreach($iteratorable->getItems() as $item) {
            $this->apply($item);
        }
    }

    protected function apply($item)
    {
        $closure = $this->closure;
        $closure($item);
    }
}
