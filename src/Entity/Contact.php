<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContactRepository::class)]
class Contact
{
    const SEND = '1';
    const NO_SEND = '2';

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $email;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    private $subject;

    #[ORM\Column(type: 'text')]
    private $question;

    #[ORM\Column(type: 'string', length: 2)]
    private $send_status = '0';

    #[ORM\Column(type: 'datetime')]
    private $date_send;

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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSubject(): ?string
    {
        return $this->subject;
    }

    public function setSubject(string $subject): self
    {
        $this->subject = $subject;

        return $this;
    }

    public function getQuestion(): ?string
    {
        return $this->question;
    }

    public function setQuestion(string $question): self
    {
        $this->question = $question;

        return $this;
    }

    public function getSendStatus(): ?string
    {
        return $this->send_status;
    }

    public function setSendStatus(string $send_status): self
    {
        $this->send_status = $send_status;

        return $this;
    }

    public function getDateSend(): ?\DateTime
    {
        return $this->date_send;
    }

    public function setDateSend(\DateTime $date_send): self
    {
        $this->date_send = $date_send;

        return $this;
    }
}
