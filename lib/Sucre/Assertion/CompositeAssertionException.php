<?php

namespace Sucre\Assertion;

class CompositeAssertionException extends \LogicException
{
    private $expections = array();

    public static function build(array $messages)
    {
        if ($messages === array()) {
            throw new \LogicException('$messages must be not empty');
        }

        $self = new self($messages[0]);

        foreach ($messages as $message) {
            $self->addException(new self($message));
        }

        return $self;
    }

    public function addException(\Exception $e)
    {
        $this->exceptions[] = $e;
    }

    public function getFirstException()
    {
        if ($this->exceptions === array()) {
            throw new \LogicException('exceptions is not set');
        }

        return $this->exceptions[0];
    }

    public function getLastException()
    {
        if ($this->exceptions === array()) {
            throw new \LogicException('exceptions is not set');
        }

        return $this->exceptions[count($this->exceptions)-1];
    }

    public function getExceptions()
    {
        if ($this->exceptions === array()) {
            throw new \LogicException('exceptions is not set');
        }

        return $this->exceptions;
    }
}
