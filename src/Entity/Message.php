<?php

namespace App\Entity;

use App\Repository\MessageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MessageRepository::class)
 */
class Message
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $contain;

    /**
     * @ORM\ManyToOne(targetEntity=user::class, inversedBy="message", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $sender;

    /**
     * @ORM\ManyToOne(targetEntity=user::class, inversedBy="message", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $recipient;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContain(): ?string
    {
        return $this->contain;
    }

    public function setContain(string $contain): self
    {
        $this->contain = $contain;

        return $this;
    }

    public function getSender(): ?user
    {
        return $this->sender;
    }

    public function setSender(user $sender): self
    {
        $this->sender = $sender;

        return $this;
    }

    public function getRecipient(): ?user
    {
        return $this->recipient;
    }

    public function setRecipient(user $recipient): self
    {
        $this->recipient = $recipient;

        return $this;
    }
}
