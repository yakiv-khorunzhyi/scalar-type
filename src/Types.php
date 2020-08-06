<?php

namespace Core;

class Types
{
    const INT = 'int';

    const STRING = 'string';

    const FLOAT = 'float';

    const BOOL = 'bool';

    /**
     * @return array
     */
    public static function get()
    {
        return [
            self::INT,
            self::FLOAT,
            self::BOOL,
            self::STRING,
        ];
    }
}