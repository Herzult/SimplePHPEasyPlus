<?php

namespace SimplePHPEasyPlus\Parser;

class SimpleNumberStringParser implements SimpleNumberStringParserInterface
{
    /**
     * Parses the given string and returns its numeric value
     *
     * @param  string $string
     *
     * @return flaot
     */
    public function parse($string)
    {
        if ( ! is_numeric($string)) {
           throw new SimpleNumberStringParserException('Invalid numeric value.');
        }

        return floatval($string);
    }
}
