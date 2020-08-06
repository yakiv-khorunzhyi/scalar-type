<?php

namespace Core;

use Core\Exceptions\UnexpectedTypeException;
use Core\Exceptions\UnexpectedValueException;

class Validator
{
    /**
     * @var array
     */
    protected $types;

    /**
     * ValueTypeValidator constructor.
     */
    public function __construct()
    {
        $this->types = Types::get();
    }

    /**
     * @param int|float|string|bool $value
     * @param string $type
     *
     * @return $this
     * @throws Exceptions\UnexpectedValueException
     */
    public function validateValue($value, $type)
    {
        if (!$this->isValidValue($value, $type)) {
            throw new UnexpectedValueException($value, $type);
        }

        return $this;
    }

    /**
     * @param string $type
     *
     * @return $this
     * @throws Exceptions\UnexpectedTypeException
     */
    public function validateType($type)
    {
        if (!$this->isValidType($type)) {
            throw new UnexpectedTypeException();
        }

        return $this;
    }

    /**
     * @param string $type
     *
     * @return bool
     */
    protected function isValidType($type)
    {
        if (in_array($type, $this->types)) {
            return true;
        }

        return false;
    }

    /**
     * @param int|float|string|bool $value
     * @param string $type
     *
     * @return bool
     */
    protected function isValidValue($value, $type)
    {
        $isScalarType = "is_{$type}";


        if ($isScalarType($value)) {
            return true;
        }

        return false;
    }
}