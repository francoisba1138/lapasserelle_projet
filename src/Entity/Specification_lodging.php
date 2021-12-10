<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

class specification_lodging
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $lodging_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $specification_id;

    public function setLodging_id($lodgingId){
        $this->lodging_id = $lodgingId;
    }

    public function setSpecification_id($specificationId){
        $this->specification_id = $specificationId;
    }
}