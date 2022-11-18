<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\CompetitionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompetitionRepository::class)]
#[ApiResource]
class Competition
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $cover = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $details = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_start = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_end = null;

    #[ORM\ManyToOne(inversedBy: 'Competition')]
    private ?Baby $baby = null;

    #[ORM\OneToMany(mappedBy: 'competition', targetEntity: Gift::class)]
    private Collection $Gift;

    public function __construct()
    {
        $this->Gift = new ArrayCollection();
    }

    public function __toString(): string
    {
           return $this->id;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCover(): ?string
    {
        return $this->cover;
    }

    public function setCover(string $cover): self
    {
        $this->cover = $cover;

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

    public function getDetails(): ?string
    {
        return $this->details;
    }

    public function setDetails(string $details): self
    {
        $this->details = $details;

        return $this;
    }

    public function getDateStart(): ?\DateTimeInterface
    {
        return $this->date_start;
    }

    public function setDateStart(\DateTimeInterface $date_start): self
    {
        $this->date_start = $date_start;

        return $this;
    }

    public function getDateEnd(): ?\DateTimeInterface
    {
        return $this->date_end;
    }

    public function setDateEnd(\DateTimeInterface $date_end): self
    {
        $this->date_end = $date_end;

        return $this;
    }

    public function getBaby(): ?Baby
    {
        return $this->baby;
    }

    public function setBaby(?Baby $baby): self
    {
        $this->baby = $baby;

        return $this;
    }

    /**
     * @return Collection<int, Gift>
     */
    public function getGift(): Collection
    {
        return $this->Gift;
    }

    public function addGift(Gift $gift): self
    {
        if (!$this->Gift->contains($gift)) {
            $this->Gift->add($gift);
            $gift->setCompetition($this);
        }

        return $this;
    }

    public function removeGift(Gift $gift): self
    {
        if ($this->Gift->removeElement($gift)) {
            // set the owning side to null (unless already changed)
            if ($gift->getCompetition() === $this) {
                $gift->setCompetition(null);
            }
        }

        return $this;
    }
}
