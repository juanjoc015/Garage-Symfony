<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ReviewRepository;

#[ORM\Entity(repositoryClass: ReviewRepository::class)]
#[ORM\HasLifecycleCallbacks()]
class Review
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: 'datetime')]
    private \DateTimeInterface $createdAt;


    #[Assert\NotBlank(message:'Votre nom ne doit pas etre vide')]
    #[Assert\Length(
        min: 2,
        max: 20,
        minMessage: 'Votre nom doit comporter au moins {{ limit }} caractères.',
        maxMessage: 'Votre nom ne peut pas dépasser {{ limit }} caractères',
    )]
    #[ORM\Column(length: 255)]
    private ?string $lastname = null;

    // seguridad lado servidor
    #[Assert\NotBlank(message:'Votre message ne doit pas etre vide')]
    #[Assert\Length(
        max: 200,
        maxMessage: 'Votre message ne peut pas dépasser {{ limit }} caractères',
    )]
    #[ORM\Column(type: Types::TEXT)]
    private ?string $message = null;


    #[Assert\Range(
        min: 1,
        max: 5,
        notInRangeMessage: 'Votre note doit etre entre {{ min }} et {{ max }} etoiles',
    )]
    #[ORM\Column()]
    private ?int $rating = null;

    #[ORM\Column]
    private ?bool $enabled = null;

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    // Setter para createdAt
    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }

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

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }

    public function getRating(): ?int
    {
        return $this->rating;
    }

    public function setRating(int $rating): static
    {
        $this->rating = $rating;

        return $this;
    }

    public function isEnabled(): ?bool
    {
        return $this->enabled;
    }

    public function setEnabled(bool $enabled): static
    {
        $this->enabled = $enabled;

        return $this;
    }
}
