<?php

namespace App\Entity;

use App\Repository\LodgingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LodgingRepository::class)
 */
class Lodging
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
    private $title;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=user::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $host;

    /**
     * @ORM\OneToOne(targetEntity=address::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $address;

    /**
     * @ORM\OneToOne(targetEntity=Stay::class, mappedBy="lodging", cascade={"persist", "remove"})
     */
    private $stay;

    /**
     * @ORM\OneToMany(targetEntity=Availability::class, mappedBy="lodging")
     */
    private $availabilities;

    /**
     * @ORM\OneToMany(targetEntity=Review::class, mappedBy="lodging")
     */
    private $reviews;

    /**
     * @ORM\OneToMany(targetEntity=Activity::class, mappedBy="lodging")
     */
    private $activities;

    public function __construct()
    {
        $this->availabilities = new ArrayCollection();
        $this->reviews = new ArrayCollection();
        $this->activities = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getHost(): ?user
    {
        return $this->host;
    }

    public function setHost(?user $host): self
    {
        $this->host = $host;

        return $this;
    }

    public function getAddress(): ?address
    {
        return $this->address;
    }

    public function setAddress(address $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getStay(): ?Stay
    {
        return $this->stay;
    }

    public function setStay(Stay $stay): self
    {
        // set the owning side of the relation if necessary
        if ($stay->getLodging() !== $this) {
            $stay->setLodging($this);
        }

        $this->stay = $stay;

        return $this;
    }

    /**
     * @return Collection|Availability[]
     */
    public function getAvailabilities(): Collection
    {
        return $this->availabilities;
    }

    public function addAvailability(Availability $availability): self
    {
        if (!$this->availabilities->contains($availability)) {
            $this->availabilities[] = $availability;
            $availability->setLodging($this);
        }

        return $this;
    }

    public function removeAvailability(Availability $availability): self
    {
        if ($this->availabilities->removeElement($availability)) {
            // set the owning side to null (unless already changed)
            if ($availability->getLodging() === $this) {
                $availability->setLodging(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Review[]
     */
    public function getReviews(): Collection
    {
        return $this->reviews;
    }

    public function addReview(Review $review): self
    {
        if (!$this->reviews->contains($review)) {
            $this->reviews[] = $review;
            $review->setLodging($this);
        }

        return $this;
    }

    public function removeReview(Review $review): self
    {
        if ($this->reviews->removeElement($review)) {
            // set the owning side to null (unless already changed)
            if ($review->getLodging() === $this) {
                $review->setLodging(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Activity[]
     */
    public function getActivities(): Collection
    {
        return $this->activities;
    }

    public function addActivity(Activity $activity): self
    {
        if (!$this->activities->contains($activity)) {
            $this->activities[] = $activity;
            $activity->setLodging($this);
        }

        return $this;
    }

    public function removeActivity(Activity $activity): self
    {
        if ($this->activities->removeElement($activity)) {
            // set the owning side to null (unless already changed)
            if ($activity->getLodging() === $this) {
                $activity->setLodging(null);
            }
        }

        return $this;
    }
}
