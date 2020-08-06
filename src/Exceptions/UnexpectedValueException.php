<?php

namespace Core\Exceptions;

class UnexpectedValueException extends \Exception
{
    protected $code = 2;

    protected $message = 'The value does not match the type.';

    public function __construct($value, $type, $previous = null)
    {
        $realType = gettype($value);
        $this->message .= " Your value: {$value}, your type: {$realType}, needed type: {$type}.";

        parent::__construct($this->message, $this->code, $previous);
    }
}