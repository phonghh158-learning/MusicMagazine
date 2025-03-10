<?php

namespace Core\helper;

use DateTime;
use ReflectionClass;

class Mapper {
    // Array Data to Entity
    public static function DataToEntity($entityClass, $data) {
        $reflection = new ReflectionClass($entityClass); //Ánh xạ class
        $entity = $reflection->newInstanceWithoutConstructor();

        foreach ($data as $key => $value) {
            $setterMethod = "set" . ucfirst($key);

            if ($reflection->hasMethod($setterMethod)) {
                $method = $reflection->getMethod($setterMethod);
                $params = $method->getParameters();

                if (!empty($params)) {
                    $paramType = $params[0]->getType();

                    if ($paramType && $paramType->getName() == "DateTime") {
                        $value = new DateTime($value);
                    }
                }

                $method->invoke($entity, $value);
            }
        }

        return $entity;
    }

    // Entity to Data Array
    public static function EntityToData($entity) {
        $data = [];
        $reflection = new ReflectionClass($entity);

        foreach ($reflection->getProperties() as $property) {
            $getterMethod = "get" . ucfirst($property->getName());

            if ($reflection->hasMethod($getterMethod)) {
                $method = $reflection->getMethod($getterMethod);
                $value = $method->invoke($entity);

                if ($value instanceof DateTime) {
                    $value = $value->format("Y-m-d H:i:s");
                }

                $data[$property->getName()] = $value;
            }
        }

        return $data;
    }
}

?>