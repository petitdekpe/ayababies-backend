<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\GiftRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GiftRepository::class)]
#[ApiResource]
class Gift
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $details = null;

    #[ORM\Column(length: 255)]
    private ?string $photo = null;

    #[ORM\Column(length: 255)]
    private ?string $value = null;

    #[ORM\ManyToOne(inversedBy: 'Gift')]
    private ?Competition $competition = null;

    #[ORM\ManyToOne(inversedBy: 'gifts')]
    private ?Partner $Partner = null;

    public function __toString(): string
    {
           return $this->id;
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDetails(): ?string
    {
        return $this->details;
    }

    public function setDetails(string $details): self
    {
        $this->details = $details;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(string $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getCompetition(): ?Competition
    {
        return $this->competition;
    }

    public function setCompetition(?Competition $competition): self
    {
        $this->competition = $competition;

        return $this;
    }

    public function getPartner(): ?Partner
    {
        return $this->Partner;
    }

    public function setPartner(?Partner $Partner): self
    {
        $this->Partner = $Partner;

        return $this;
    }
}
