<?php

namespace SimplePHPEasyPlus\Collection;
use SimplePHPEasyPlus\Collection\CollectionItemInterface;

interface CollectionInterface
{
    /**
     * This method must add an item to the collection
     *
     * @param  CollectionItemInterface $item
     */
    function add(CollectionItemInterface $item);

    /**
     * Gets the first item
     *
     * @return CollectionItemInterface
     **/
    public function getFirstItem();

    /**
     * Gets the second item
     *
     * @return CollectionItemInterface
     **/
    public function getSecondItem();
}
