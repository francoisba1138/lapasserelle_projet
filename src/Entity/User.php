<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\OneToMany(targetEntity=Stay::class, mappedBy="user")
     */
    private $stays;

    /**
     * @ORM\OneToMany(targetEntity=Review::class, mappedBy="author")
     */
    private $reviews;

    /**
     * @ORM\OneToMany(targetEntity=Message::class, mappedBy="sender")
     */
    
     private $sent_message;

       /**
     * @ORM\OneToMany(targetEntity=Message::class, mappedBy="recipient")
     */
    
    private $received_message;

    /**
     * @ORM\ManyToMany(targetEntity=Lodging::class, mappedBy="certification")
     */
    private $certificated_lodgings;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isVerified = false;

    public function __construct()
    {
        $this->stays = new ArrayCollection();
        $this->reviews = new ArrayCollection();
        $this->certificated_lodgings = new ArrayCollection();
        $this->sent_message = new ArrayCollection();
        $this->received_message = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getSalt(){}

    /**
     * @return Collection|Stay[]
     */
    public function getStays(): Collection
    {
        return $this->stays;
    }

    public function addStay(Stay $stay): self
    {
        if (!$this->stays->contains($stay)) {
            $this->stays[] = $stay;
            $stay->setUser($this);
        }

        return $this;
    }

    public function removeStay(Stay $stay): self
    {
        if ($this->stays->removeElement($stay)) {
            // set the owning side to null (unless already changed)
            if ($stay->getUser() === $this) {
                $stay->setUser(null);
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
            $review->setAuthor($this);
        }

        return $this;
    }

    public function removeReview(Review $review): self
    {
        if ($this->reviews->removeElement($review)) {
            // set the owning side to null (unless already changed)
            if ($review->getAuthor() === $this) {
                $review->setAuthor(null);
            }
        }

        return $this;
    }

    /*public function getMessage(): ?Message
    {
        return $this->message;
    }

    public function setMessage(Message $message): self
    {
        // set the owning side of the relation if necessary
        if ($message->getSender() !== $this) {
            $message->setSender($this);
        }

        $this->message = $message;

        return $this;
    }*/

    /**
     * @return Collection|Lodging[]
     */
    public function getCertificatedLodgings(): Collection
    {
        return $this->certificated_lodgings;
    }

    public function addCertificatedLodging(Lodging $certificatedLodging): self
    {
        if (!$this->certificated_lodgings->contains($certificatedLodging)) {
            $this->certificated_lodgings[] = $certificatedLodging;
            $certificatedLodging->addCertification($this);
        }

        return $this;
    }

    public function removeCertificatedLodging(Lodging $certificatedLodging): self
    {
        if ($this->certificated_lodgings->removeElement($certificatedLodging)) {
            $certificatedLodging->removeCertification($this);
        }

        return $this;
    }

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): self
    {
        $this->isVerified = $isVerified;

        return $this;
    }

    public function getIsVerified(): ?bool
    {
        return $this->isVerified;
    }

    /**
     * @return Collection|Message[]
     */
    public function getSentMessage(): Collection
    {
        return $this->sent_message;
    }

    public function addSentMessage(Message $sentMessage): self
    {
        if (!$this->sent_message->contains($sentMessage)) {
            $this->sent_message[] = $sentMessage;
            $sentMessage->setSender($this);
        }

        return $this;
    }

    public function removeSentMessage(Message $sentMessage): self
    {
        if ($this->sent_message->removeElement($sentMessage)) {
            // set the owning side to null (unless already changed)
            if ($sentMessage->getSender() === $this) {
                $sentMessage->setSender(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Message[]
     */
    public function getReceivedMessage(): Collection
    {
        return $this->received_message;
    }

    public function addReceivedMessage(Message $receivedMessage): self
    {
        if (!$this->received_message->contains($receivedMessage)) {
            $this->received_message[] = $receivedMessage;
            $receivedMessage->setRecipient($this);
        }

        return $this;
    }

    public function removeReceivedMessage(Message $receivedMessage): self
    {
        if ($this->received_message->removeElement($receivedMessage)) {
            // set the owning side to null (unless already changed)
            if ($receivedMessage->getRecipient() === $this) {
                $receivedMessage->setRecipient(null);
            }
        }

        return $this;
    }
}
