<?php

namespace THEANI\Zod\Exceptions;

class LongStringException extends \Exception
{
    public static function make($value, $expected)
    {
        return new static('String is too long. Expected a string with at most ' . $expected . ' characters, `' . strlen($value) . '` given.');
    }
}
