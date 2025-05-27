<?php

namespace THEANI\Zod;

use THEANI\Zod\Schemas\EmailSchema;
use THEANI\Zod\Schemas\NumberSchema;
use THEANI\Zod\Schemas\ObjectSchema;
use THEANI\Zod\Schemas\StringSchema;
use THEANI\Zod\Schemas\TimeStampSchema;

class Zod
{
    public static function object($schema = [])
    {
        return ObjectSchema::make($schema);
    }

    public static function string()
    {
        return StringSchema::make();
    }

    public static function email()
    {
        return EmailSchema::make();
    }

    public static function timestamp()
    {
        return TimeStampSchema::make();
    }

    public static function number()
    {
        return NumberSchema::make();
    }
}
