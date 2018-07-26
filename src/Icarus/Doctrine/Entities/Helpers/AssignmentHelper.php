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
    use Reflection;

    public function assignValues(array $values)
    {
        foreach ($values as $key => $value) {
            $method = "set" . Strings::firstUpper($key);

            if ($this->getReflection()->hasMethod($method)) {
                $this->{$method}($value);
            } else if ($this->getReflection()->hasProperty($key)) {
                $this->$key = $value;
            } else {
                throw new InvalidArgumentException("Entity does not have property '$key' or method '$method'.");
            }
        }
    }



    public function getValues($whitelist = null, $blacklist = ['id'])
    {
        $list = [];

        foreach ($this->getReflection()->getProperties() as $property) {
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