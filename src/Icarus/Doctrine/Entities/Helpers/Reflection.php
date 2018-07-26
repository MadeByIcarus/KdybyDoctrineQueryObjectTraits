<?php


namespace Icarus\Doctrine\Entities\Helpers;


trait Reflection
{
    private $reflection;

    public function getReflection()
    {
        if (!$this->reflection) {
            $this->reflection = new \ReflectionObject($this);
        }
        return $this->reflection;
    }
}