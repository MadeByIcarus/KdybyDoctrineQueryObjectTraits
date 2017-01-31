<?php // lint >= 5.4

/**
 * This file is part of the Kdyby (http://www.kdyby.org)
 *
 * Copyright (c) 2008, 2012 Filip Procházka (filip@prochazka.su)
 *
 * For the full copyright and license information, please view the file license.md that was distributed with this source code.
 */

namespace Icarus\Doctrine\Entities\Attributes;

use Doctrine\ORM\Mapping as ORM;



/**
 * @author Pavel Gajdoš <pavel.gajdos@gmail.com>
 */
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
