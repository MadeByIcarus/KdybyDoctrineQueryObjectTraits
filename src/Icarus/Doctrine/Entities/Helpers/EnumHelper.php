<?php


namespace Icarus\Doctrine\Entities\Helpers;


use Kdyby\Doctrine\InvalidArgumentException;
use Nette\Utils\Strings;


trait EnumHelper
{
    use Reflection;

    private function checkEnumValue($constantsPrefix, $enumValue)
    {
        $allowedValues = [];
        if (!$constantsPrefix) {
            $allowedValues = $this->getReflection()->getConstants();
        } else {
            foreach ($this->getReflection()->getConstants() as $name => $value) {
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