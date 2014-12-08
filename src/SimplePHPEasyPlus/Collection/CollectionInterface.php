<?php

namespace SimplePHPEasyPlus\Collection;

interface CollectionInterface
{
    /**
     * This method must add an item to the collection
     *
     * @param CollectionItemInterface $item
     */
    public function add(CollectionItemInterface $item);

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
