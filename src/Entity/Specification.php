<?php

namespace App\Entity;

use App\Repository\SpecificationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SpecificationRepository::class)
 */
class Specification
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $label;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $icon;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\ManyToMany(targetEntity=Lodging::class, inversedBy="specifications")
     */
    private $lodging;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $title;

    public function __construct()
    {
        $this->lodging = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function setIcon(?string $icon): self
    {
        $this->icon = $icon;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection|lodging[]
     */
    public function getLodging(): Collection
    {
        return $this->lodging;
    }

    public function addLodging(lodging $lodging): self
    {
        if (!$this->lodging->contains($lodging)) {
            $this->lodging[] = $lodging;
        }

        return $this;
    }

    public function removeLodging(lodging $lodging): self
    {
        $this->lodging->removeElement($lodging);

        return $this;
    }

  

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }
    
    public function __toString()
    {
        return $this->title;
    }


  
}
