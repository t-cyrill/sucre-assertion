<?php
namespace Sucre;

use LogicException;

class Assertion {
    use Traits\TypeAssertion;

    protected static $enabled = true;

    public static function enable()
    {
        self::$enabled = true;
    }

    public static function disable()
    {
        self::$enabled = false;
    }
}
