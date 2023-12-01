<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\CycleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


#[ORM\Entity(repositoryClass: CycleRepository::class)]
#[ApiResource]
#[UniqueEntity('name')]
class Cycle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'cycle', targetEntity: Level::class)]
    private Collection $level;

    public function __construct()
    {
        $this->level = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Level>
     */
    public function getLevel(): Collection
    {
        return $this->level;
    }

    public function addLevel(Level $level): static
    {
        if (!$this->level->contains($level)) {
            $this->level->add($level);
            $level->setCycle($this);
        }

        return $this;
    }

    public function removeLevel(Level $level): static
    {
        if ($this->level->removeElement($level)) {
            // set the owning side to null (unless already changed)
            if ($level->getCycle() === $this) {
                $level->setCycle(null);
            }
        }

        return $this;
    }
}
