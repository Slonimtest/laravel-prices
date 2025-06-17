<?php

namespace App\Reference;

use Illuminate\Support\Str;
use ReflectionClass;

/**
 * Class Constants
 * @package App\Reference
 */
class AbstractConstants
{
    /**
     * Get list of available constants
     *
     * @return array
     */
    public static function getAvailableConstantValues()
    {
        $constants = static::getConstants();

        return array_values($constants);
    }

    /**
     * Get list of all constants
     *
     * @return array
     */
    public static function getConstants()
    {
        $reflection = new ReflectionClass(static::class);

        return $reflection->getConstants();
    }

    /**
     * Get a random constant value
     *
     * @return array
     */
    public static function getRandom()
    {
        $values = static::getAvailableConstantValues();

        return $values[rand(0, count($values) - 1)];
    }

    /**
     * Get value by name
     *
     * @param string $name
     * @return mixed|null
     */
    public static function getValueByName(string $name)
    {
        $name = Str::upper(Str::snake(Str::lower($name)));

        $constants = static::getConstants();

        return $constants[$name] ?? null;
    }

    /**
     * Get name by ID
     *
     * @param int|null $id
     * @return false|int|string
     */
    public static function getNameById(int|null $id)
    {
        return array_search($id, static::getConstants());
    }
}
