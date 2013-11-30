<?php
namespace Sucre;

use LogicException;

class Assertion {
    protected static $enabled = true;

    public static function factory()
    {
        return new Assertion\CompositeAssertion(self::$enabled);
    }

    public static function enable()
    {
        self::$enabled = true;
    }

    public static function disable()
    {
        self::$enabled = false;
    }
}
