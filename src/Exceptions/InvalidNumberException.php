<?php

namespace THEANI\Zod\Exceptions;

class InvalidNumberException extends \Exception
{
    public static function make($value)
    {
        return new static('Invalid number. Expected a number, `' . gettype($value) . '` given.');
    }
}
