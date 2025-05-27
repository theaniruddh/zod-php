<?php

namespace THEANI\Zod\Schemas;

use THEANI\Zod\Exceptions\InvalidEmailException;
use THEANI\Zod\Exceptions\InvalidStringException;
use THEANI\Zod\Exceptions\LongStringException;
use THEANI\Zod\Exceptions\ShortStringException;

class EmailSchema extends Schema
{
    private $min;

    private $max;

    public static function make()
    {
        return new static();
    }

    public function min($min)
    {
        $this->min = $min;

        return $this;
    }

    public function max($max)
    {
        $this->max = $max;

        return $this;
    }

    protected function parseValue($value)
    {
        if (! is_string($value)) {
            throw InvalidStringException::make($value);
        }

        if (! is_null($this->min) && strlen($value) < $this->min) {
            throw ShortStringException::make($value, $this->min);
        }

        if (! is_null($this->max) && strlen($value) > $this->max) {
            throw LongStringException::make($value, $this->max);
        }

        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw InvalidEmailException::make($value);
        }

        return $value;
    }
}
