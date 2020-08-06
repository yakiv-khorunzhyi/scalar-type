<?php

namespace Core\Exceptions;

class UnexpectedTypeException extends \Exception
{
    protected $code = 1;

    protected $message = 'This type is not scalar.';

    public function __construct($previous = null)
    {
        parent::__construct($this->message, $this->code, $previous);
    }
}