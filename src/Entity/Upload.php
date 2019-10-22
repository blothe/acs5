<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UploadRepository")
 */
class Upload
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sender_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sender_email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $recipient_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $recipient_email;

    /**
     * @ORM\Column(type="string")
     */
    private $attachment;

    /**
     * @ORM\Column(type="text")
     */
    private $message;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSenderName(): ?string
    {
        return $this->sender_name;
    }

    public function setSenderName(string $sender_name): self
    {
        $this->sender_name = $sender_name;

        return $this;
    }

    public function getSenderEmail(): ?string
    {
        return $this->sender_email;
    }

    public function setSenderEmail(string $sender_email): self
    {
        $this->sender_email = $sender_email;

        return $this;
    }

    public function getRecipientName(): ?string
    {
        return $this->recipient_name;
    }

    public function setRecipientName(string $recipient_name): self
    {
        $this->recipient_name = $recipient_name;

        return $this;
    }

    public function getRecipientEmail(): ?string
    {
        return $this->recipient_email;
    }

    public function setRecipientEmail(string $recipient_email): self
    {
        $this->recipient_email = $recipient_email;

        return $this;
    }

    public function getAttachment(): ?string
    {
        return $this->attachment;
    }

    public function setAttachment(string $attachment): self
    {
        $this->attachment = $attachment;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
