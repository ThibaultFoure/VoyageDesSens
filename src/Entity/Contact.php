<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ContactRepository::class)]
class Contact
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private $id;

    #[ORM\Column(type: "string", length: 255)]
    #[Assert\Length(max: 255, maxMessage: 'Le prénom ne doit pas faire plus de {{ limit }} caractères')]
    #[Assert\NotBlank(message: 'Veuillez indiquer votre prénom')]
    private $firstname;

    #[ORM\Column(type: "string", length: 255)]
    #[Assert\Length(max: 255, maxMessage: 'Le nom ne doit pas faire plus de {{ limit }} caractères')]
    #[Assert\NotBlank(message: 'Veuillez indiquer votre nom')]
    private $lastname;

    #[ORM\Column(type: "string", length: 15, nullable: true)]
    #[Assert\Length(max: 15, maxMessage: 'Le numéro de téléphone ne pas doit faire plus de {{ limit }} chiffres')]
    #[Assert\NotBlank(message: 'Veuillez indiquer votre numéro de téléphone')]
    private $phone;

    #[ORM\Column(type: "string", length: 255)]
    #[Assert\Length(max: 255, maxMessage: 'L\'adresse mail ne pas doit faire plus de {{ limit }} caractères')]
    #[Assert\NotBlank(message: 'Veuillez indiquer votre adresse mail')]
    private $mail;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\Length(max: 255, maxMessage: 'Le raison ne pas doit faire plus de {{ limit }} caractères')]
    #[Assert\NotBlank(message: 'Veuillez indiquer la raison de votre message')]
    private $reason;

    #[ORM\Column(type: 'text')]
    #[Assert\NotBlank(message: 'Veuillez indiquer votre message')]

    private $message;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getReason(): ?string
    {
        return $this->reason;
    }

    public function setReason(string $reason): self
    {
        $this->reason = $reason;

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
}
