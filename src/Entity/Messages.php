<?php

namespace App\Entity;

use App\Repository\MessagesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MessagesRepository::class)]
class Messages
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $message_send = null;

    #[ORM\ManyToOne(inversedBy: 'messages')]
    private ?Users $user_email = null;

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

    public function getMessageSend(): ?string
    {
        return $this->message_send;
    }

    public function setMessageSend(string $message_send): self
    {
        $this->message_send = $message_send;

        return $this;
    }

    public function getUserEmail(): ?Users
    {
        return $this->user_email;
    }

    public function setUserEmail(?Users $user_email): self
    {
        $this->user_email = $user_email;

        return $this;
    }
}
