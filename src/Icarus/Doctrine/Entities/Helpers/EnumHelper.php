<?php


namespace Icarus\Doctrine\Entities\Helpers;


use Kdyby\Doctrine\InvalidArgumentException;
use Nette\Utils\Strings;


trait EnumHelper
{

    private function checkEnumValue($constantsPrefix, $enumValue)
    {
        $reflection = new \ReflectionObject($this);
        $allowedValues = [];
        if (!$constantsPrefix) {
            $allowedValues = $reflection->getConstants();
        } else {
            foreach ($reflection->getConstants() as $name => $value) {
                if (Strings::startsWith($name, $constantsPrefix)) {
                    $allowedValues[$name] = $value;
                }
            }
        }

        if (!in_array($enumValue, $allowedValues)) {
            throw new InvalidArgumentException("Invalid value '$enumValue'. Must be one of '" . __CLASS__ . "::$constantsPrefix*'.");
        }
    }
}