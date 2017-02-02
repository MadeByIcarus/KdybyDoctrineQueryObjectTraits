<?php

/**
 * Inspired by Kdyby\Doctrine\Entities\Attributes\Identifier
 * Added 'unsigned' flag to column $id
 */

namespace Icarus\Doctrine\Entities\Attributes;


use Doctrine\ORM\Mapping as ORM;


trait Identifier
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer", options={"unsigned"=true})
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
