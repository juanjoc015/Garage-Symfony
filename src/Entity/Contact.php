<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ContactRepository;

#[ORM\Entity(repositoryClass: ContactRepository::class)]
class Contact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;


    #[Assert\NotBlank(message:'Votre nom ne doit pas etre vide')]
    #[Assert\Length(
        min: 2,
        max: 20,
        minMessage: 'Votre nom doit comporter au moins {{ limit }} caractères.',
        maxMessage: 'Votre nom ne peut pas dépasser {{ limit }} caractères',
    )]
    #[ORM\Column(length: 255)]
    private ?string $lastname = null;


    #[Assert\NotBlank(message:'Votre prénom ne doit pas etre vide')]
    #[Assert\Length(
        min: 2,
        max: 20,
        minMessage: 'Votre prénom doit comporter au moins {{ limit }} caractères.',
        maxMessage: 'Votre prénom ne peut pas dépasser {{ limit }} caractères',
    )]
    #[ORM\Column(length: 255)]
    private ?string $firstname = null;


    #[Assert\Email(
        message: "L'adresse e-mail '{{ value }}' n'est pas valide.",
        mode: "strict"
    )]
    #[ORM\Column(length: 255)]
    private ?string $email = null;


    #[Assert\Regex(
        pattern: "/^(\+\d{1,3}[- ]?)?\d{10}$/",
        message: "Le numéro de téléphone n'est pas valide."
    )]
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $phone = null;


    #[Assert\NotBlank(
        message: "Votre message ne doit pas etre vide."
    )]
    #[Assert\Length(
        max: 200,
        maxMessage: "Le message ne peut pas dépasser {{ limit }} caractères."
    )]
    #[ORM\Column(type: Types::TEXT)]
    private ?string $message = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }
}
