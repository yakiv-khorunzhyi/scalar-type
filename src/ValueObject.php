<?php

namespace Core;

class ValueObject
{
    /**
     * @var string
     */
    protected $type;

    /**
     * @var int|float|string|bool
     */
    protected $value;

    /**
     * @var int|float|string|bool
     */
    protected $formatted;

    /**
     * ValueType constructor.
     *
     * @param int|float|string|bool $value
     * @param string $type
     *
     * @throws Exceptions\UnexpectedTypeException
     * @throws Exceptions\UnexpectedValueException
     */
    public function __construct($value, $type)
    {
        $validator = new Validator();

        $validator
            ->validateType($type)
            ->validateValue($value, $type);

        $this->type = $type;
        $this->value = $this->formatted = $value;
    }

    /**
     * @return bool|float|int|string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return bool|float|int|string
     */
    public function getFormattedValue()
    {
        return $this->formatted;
    }

    /**
     * @param callable $rule
     *
     * @return void
     */
    public function setFormatRule($rule)
    {
        $this->formatted = $rule($this->value);
    }
}