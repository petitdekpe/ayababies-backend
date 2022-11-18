<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\BabyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BabyRepository::class)]
#[ApiResource]
class Baby
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $sexe = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $birthday = null;

    #[ORM\Column(length: 255)]
    private ?string $town = null;

    #[ORM\Column(length: 255)]
    private ?string $country = null;

    #[ORM\Column(length: 255)]
    private ?string $photo = null;

    #[ORM\OneToMany(mappedBy: 'baby', targetEntity: Competition::class)]
    private Collection $Competition;

    public function __construct()
    {
        $this->Competition = new ArrayCollection();
    }

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

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(\DateTimeInterface $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function getTown(): ?string
    {
        return $this->town;
    }

    public function setTown(string $town): self
    {
        $this->town = $town;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

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

    /**
     * @return Collection<int, Competition>
     */
    public function getCompetition(): Collection
    {
        return $this->Competition;
    }

    public function addCompetition(Competition $competition): self
    {
        if (!$this->Competition->contains($competition)) {
            $this->Competition->add($competition);
            $competition->setBaby($this);
        }

        return $this;
    }

    public function removeCompetition(Competition $competition): self
    {
        if ($this->Competition->removeElement($competition)) {
            // set the owning side to null (unless already changed)
            if ($competition->getBaby() === $this) {
                $competition->setBaby(null);
            }
        }

        return $this;
    }
}
