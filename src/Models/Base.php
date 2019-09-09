<?php


namespace slavkluev\Bizon365\Models;

use ReflectionClass;
use ReflectionProperty;

abstract class Base
{
    public static function fromResponse($data)
    {
        $instance = new static();
        $instance->map($data);

        return $instance;
    }

    public function map($data)
    {
        $reflect = new ReflectionClass($this);
        $props = $reflect->getProperties(ReflectionProperty::IS_PROTECTED);

        foreach ($props as $prop) {
            $propName = $prop->getName();
            if (isset($data[$propName])) {
                $this->$propName = $data[$propName];
            }
        }
    }

    public function toArray()
    {
        $reflect = new ReflectionClass($this);
        $props = $reflect->getProperties(ReflectionProperty::IS_PROTECTED);

        $result = [];

        foreach ($props as $prop) {
            $propName = $prop->getName();
            $result[$propName] = $this->$propName;
        }

        return $result;
    }
}
