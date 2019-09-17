<?php


namespace slavkluev\Bizon365\Models;

use ReflectionClass;
use ReflectionProperty;

abstract class Base
{
    public static $nestedModels = [];

    public static function fromResponse($data)
    {
        $instance = new static();
        $instance->map($data);

        return $instance;
    }

    protected function map($data)
    {
        $reflect = new ReflectionClass($this);
        $props = $reflect->getProperties(ReflectionProperty::IS_PROTECTED);

        foreach ($props as $prop) {
            $propName = $prop->getName();

            if (isset($data[$propName])) {
                if (isset(static::$nestedModels[$propName])) {
                    $nestedModel = static::$nestedModels[$propName];
                    if ($nestedModel['array']) {
                        $result = array_map(function ($dataOfModel) use ($nestedModel) {
                            return $nestedModel['class']::fromResponse($dataOfModel);
                        }, $data[$propName]);
                    } else {
                        $result = $nestedModel['class']::fromResponse($data[$propName]);
                    }
                } else {
                    $result = $data[$propName];
                }

                $this->$propName = $result;
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
