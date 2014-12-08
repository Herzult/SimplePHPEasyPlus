<?php

namespace SimplePHPEasyPlus\Parser;

interface SimpleNumberStringParserFactoryInterface
{
    /**
     * @return SimpleNumberStringParserInterface
     */
    public function createParser();
}
