<?php

namespace SimplePHPEasyPlus\Number;

use SplObjectStorage;
use OutOfRangeException;
use SimplePHPEasyPlus\Collection\CollectionInterface;
use SimplePHPEasyPlus\Collection\CollectionItemInterface;

/**
 * Represents a number collection
 */
class NumberCollection implements CollectionInterface
{
    /**
     * @var SplObjectStorage  A traversable of NumberValue items
     */
    protected $numbers;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->numbers = new SplObjectStorage();
    }

    /**
     * Adds a number to the collection
     *
     * @param CollectionItemInterface $number
     */
    public function add(CollectionItemInterface $number)
    {
        if (2 === $this->numbers->count()) {
            throw new OutOfRangeException('The number collection can not contain more than two numbers.');
        }

        $this->numbers->attach($number);
    }

    /**
     * Gets the first item
     *
     * @return CollectionItemInterface
     **/
    public function getFirstItem()
    {
        $this->numbers->rewind();

        return $this->numbers->current();
    }

    /**
     * Gets the second item
     *
     * @return CollectionItemInterface
     **/
    public function getSecondItem()
    {
        $this->numbers->rewind();
        $this->numbers->next();

        return $this->numbers->current();
    }
}
