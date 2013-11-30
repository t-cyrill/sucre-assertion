<?php

namespace Sucre\Assertion;

/**
 * @note "$this->enabled and $var || $this->addError" means "$this->enabled and ($var or $this->addError)"
 *       It's Operator Precedence trick!
 */
class CompositeAssertion
{
    private $errors = array();
    private $called_flag = false;
    private $enabled = true;

    public function __construct($enabled = true)
    {
        $this->enabled = $enabled;
    }

    public function __destruct()
    {
        if ($this->called_flag === false) {
            throw new \LogicException('Assert method must be called. Maybe your logic is wrong.');
        }
    }

    private function addError($message)
    {
        $this->errors[] = $message;
    }

    public function assert()
    {
        $this->called_flag = true;
        if ($this->errors !== array()) {
            throw CompositeAssertionException::build($this->errors);
        }

        return true;
    }

    /**
     * Assert $var must be not pass null.
     *
     * @param mixed $var
     */
    public function mustNotNull($var)
    {
        $this->enabled and $var !== null || $this->addError('$var must be not pass null');

        return $this;
    }

    /**
     * Assert $var must be pass null.
     *
     * @param mixed $var
     */
    public function mustNull($var)
    {
        $this->enabled and $var === null || $this->addError('$var must be pass null');
        return $this;
    }

    /**
     * Assert $var must be pass bool type.
     *
     * @param mixed $var
     */
    public function mustBool($var)
    {
        $this->enabled and is_bool($var) || $this->addError('$var must be pass bool type.');
        return $this;
    }

    /**
     * Assert $var must be pass float type.
     *
     * @param mixed $var
     */
    public function mustFloat($var)
    {
        $this->enabled and is_float($var) || $this->addError('$var must be pass float type.');
        return $this;
    }

    /**
     * Assert $var must be pass string type.
     *
     * @param mixed $var
     */
    public function mustString($var)
    {
        $this->enabled and is_string($var) || $this->addError('$var must be pass string type.');
        return $this;
    }

    /**
     * Assert $var must be pass int type.
     *
     * @param mixed $var
     */
    public function mustInt($var)
    {
        $this->enabled and is_int($var) || $this->addError('$var must be pass int type.');
        return $this;
    }
}
