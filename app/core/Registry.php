<?php

namespace app\core;

class Registry
{
    use TSingleton;

    protected static array $properties = [];

    public static function setProperty($name, $value): void
    {
        self::$properties[$name] = $value;
    }

    public static function getProperty($name): mixed
    {
        return self::$properties[$name] ?? null;
    }

    public static function getProperties(): array
    {
        return self::$properties;
    }
}