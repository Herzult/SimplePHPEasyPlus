<?php

namespace SimplePHPEasyPlus\Parser;

class SimpleNumberStringParser implements SimpleNumberStringParserInterface
{
    /**
     * Parses the given string and returns its numeric value
     *
     * @param string $string
     *
     * @return float
     */
    public function parse($string)
    {
        if (! is_string($string)) {
            throw new ParserInvalidArgumentException('This is not a string.');
        } elseif (! is_numeric($string)) {
            throw new ParserInvalidArgumentException('Invalid numeric value.');
        }

        return floatval($string);
    }
}
