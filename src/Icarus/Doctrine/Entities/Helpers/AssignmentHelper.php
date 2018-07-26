<?php
/**
 * Created by PhpStorm.
 * User: pavelgajdos
 * Date: 01.02.17
 * Time: 12:36
 */

namespace Icarus\Doctrine\Entities\Helpers;


use Kdyby\Doctrine\InvalidArgumentException;
use Nette\Utils\Strings;


trait AssignmentHelper
{

    public function assignValues(array $values)
    {
        $reflection = new \ReflectionObject($this);
        foreach ($values as $key => $value) {
            $method = "set" . Strings::firstUpper($key);

            if ($reflection->hasMethod($method)) {
                $this->{$method}($value);
            } else if ($reflection->hasProperty($key)) {
                $this->$key = $value;
            } else {
                throw new InvalidArgumentException("Entity does not have property '$key' or method '$method'.");
            }
        }
    }



    public function getValues($whitelist = null, $blacklist = ['id'])
    {
        $reflection = new \ReflectionObject($this);
        $list = [];

        foreach ($reflection->getProperties() as $property) {
            if ($whitelist) {
                if (in_array($property->getName(), $whitelist)) {
                    $list[] = $property->getName();
                } else {
                    continue;
                }
            }

            if ($blacklist) {
                if (!in_array($property->getName(), $blacklist)) {
                    $list[] = $property->getName();
                } else {
                    continue;
                }
            }

            $list[] = $property->getName();
        }

        $values = [];

        foreach ($list as $item) {
            $values[$item] = $this->{$item};
        }

        return $values;
    }
}