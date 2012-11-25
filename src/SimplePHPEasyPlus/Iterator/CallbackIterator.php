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
        if(!$this->closure) {
            throw new RuntimeException('No closure available');
        }
        $closure = $this->closure;
        $closure($item);
    }
}
