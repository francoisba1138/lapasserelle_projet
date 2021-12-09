<?php

namespace App\Entity;

use App\Repository\StayRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StayRepository::class)
 */
class Stay
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=lodging::class, inversedBy="stay", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $lodging;

    /**
     * @ORM\ManyToOne(targetEntity=user::class, inversedBy="stays")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLodging(): ?lodging
    {
        return $this->lodging;
    }

    public function setLodging(lodging $lodging): self
    {
        $this->lodging = $lodging;

        return $this;
    }

    public function getUser(): ?user
    {
        return $this->user;
    }

    public function setUser(?user $user): self
    {
        $this->user = $user;

        return $this;
    }
}
