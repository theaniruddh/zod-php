<?php

namespace THEANI\Zod\Schemas;

use THEANI\Zod\Exceptions\BigNumberException;
use THEANI\Zod\Exceptions\InvalidNumberException;
use THEANI\Zod\Exceptions\SmallNumberException;

class NumberSchema extends Schema
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
        if (! is_numeric($value)) {
            throw InvalidNumberException::make($value);
        }

        // Convert both integers and floats to numbers.
        $value = $value + 0;

        if (! is_null($this->min) && $value < $this->min) {
            throw SmallNumberException::make($value, $this->min);
        }

        if (! is_null($this->max) && $value > $this->max) {
            throw BigNumberException::make($value, $this->max);
        }

        return $value;
    }
}
