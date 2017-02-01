<?php

/**
 * Inspired by Kdyby\Doctrine\Entities\Attributes\Identifier
 */

namespace Icarus\Doctrine\Entities\Attributes;


use Doctrine\ORM\Mapping as ORM;


trait BigIdentifier
{

    /**
     * @ORM\Id
     * @ORM\Column(type="bigint")
     * @ORM\GeneratedValue
     * @var integer
     */
    private $id;



    /**
     * @return integer
     */
    final public function getId()
    {
        return $this->id;
    }



    public function __clone()
    {
        $this->id = NULL;
    }

}
