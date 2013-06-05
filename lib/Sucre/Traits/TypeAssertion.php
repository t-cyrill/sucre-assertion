<?php
namespace Sucre\Traits;

use LogicException;

trait TypeAssertion {
    /**
     * $varがnullであることを保障する
     *
     * @param mixed $var 調べる変数
     */
    public static function mustNull($var)
    {
        if (static::$enabled && $var !== null) {
            throw new LogicException('$var must be pass null.');
        }
    }

    /**
     * $varがnullでないことを保障する
     *
     * @param mixed $var 調べる変数
     */
    public static function mustNotNull($var)
    {
        if (static::$enabled && $var === null) {
            throw new LogicException('$var must not be pass null.');
        }
    }

    /**
     * $varがboolであることを保障する
     *
     * @param mixed $var 調べる変数
     */
    public static function mustBool($var)
    {
        if (static::$enabled && !is_bool($var)) {
            throw new LogicException('$var must be pass bool type.');
        }
    }

    /**
     * $varがfloatであることを保障する
     *
     * @param mixed $var 調べる変数
     */
    public static function mustFloat($var)
    {
        if (static::$enabled && !is_float($var)) {
            throw new LogicException('$var must be pass float type.');
        }
    }

    /**
     * $varがstringであることを保障する
     *
     * @param mixed $var 調べる変数
     */
    public static function mustString($var)
    {
        if (static::$enabled && !is_string($var)) {
            throw new LogicException('$var must be pass string type.');
        }
    }

    /**
     * $varがintであることを保障する
     *
     * @param mixed $var 調べる変数
     */
    public static function mustInt($var)
    {
        if (static::$enabled && !is_int($var)) {
            throw new LogicException('$var must be pass int type.');
        }
    }
}
