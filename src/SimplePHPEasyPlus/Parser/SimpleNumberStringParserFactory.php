<?php

namespace SimplePHPEasyPlus\Parser;

class SimpleNumberStringParserFactory implements SimpleNumberStringParserFactoryInterface
{
    public function createParser()
    {
        return new SimpleNumberStringParser();
    }
}
