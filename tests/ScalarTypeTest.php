<?php

use Core\Types;
use Core\Exceptions\UnexpectedValueException;
use Core\Exceptions\UnexpectedTypeException;

class ScalarTypeTest extends PHPUnit_Framework_TestCase
{
    public function getProvidedData()
    {
        return [
            // int
            [
                'value' => 1,
                'type' => Types::INT,
                'formatted' => 1.0,
                'formatRule' => function () {
                    return floatval(1);
                },
                'exception' => false,
            ],
            [
                'value' => '1',
                'type' => Types::INT,
                'formatted' => null,
                'formatRule' => null,
                'exception' => UnexpectedValueException::class,
            ],
            [
                'value' => 1,
                'type' => Types::STRING,
                'formatted' => null,
                'formatRule' => null,
                'exception' => UnexpectedValueException::class,
            ],
            [
                'value' => 1,
                'type' => 'Undefined type',
                'formatted' => null,
                'formatRule' => null,
                'exception' => UnexpectedTypeException::class,
            ],
            // float
            [
                'value' => 1.0,
                'type' => Types::FLOAT,
                'formatted' => 1,
                'formatRule' => function () {
                    return intval(1.0);
                },
                'exception' => false,
            ],
            [
                'value' => 1.0,
                'type' => Types::STRING,
                'formatted' => null,
                'formatRule' => null,
                'exception' => UnexpectedValueException::class,
            ],
            // string
            [
                'value' => '1',
                'type' => Types::STRING,
                'formatted' => 1,
                'formatRule' => function () {
                    return intval('1');
                },
                'exception' => false,
            ],
            [
                'value' => 1.0,
                'type' => Types::STRING,
                'formatted' => null,
                'formatRule' => null,
                'exception' => UnexpectedValueException::class,
            ],
            // bool
            [
                'value' => true,
                'type' => Types::BOOL,
                'formatted' => 1,
                'formatRule' => function () {
                    return intval(true);
                },
                'exception' => false,
            ],
            [
                'value' => true,
                'type' => Types::STRING,
                'formatted' => null,
                'formatRule' => null,
                'exception' => UnexpectedValueException::class,
            ],
        ];
    }


    /**
     * @dataProvider getProvidedData
     */
    public function test($value, $type, $formatted, $rule, $exception)
    {
        if ($exception) {
            $this->expectException($exception);
            new \Core\ScalarType($value, $type);
            return;
        }

        $valueType = new \Core\ScalarType($value, $type);
        $valueType->setFormatRule($rule);

        $this->assertEquals(
            $value,
            $valueType->getValue()
        );

        $this->assertEquals(
            $type,
            $valueType->getType()
        );

        $this->assertEquals(
            $formatted,
            $valueType->getFormattedValue()
        );
    }
}