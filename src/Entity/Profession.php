<?php

namespace App\Entity;

use App\Repository\ProfessionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProfessionRepository::class)
 */
class Profession
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $profession;

    /**
     * @ORM\OneToMany(targetEntity=Applier::class, mappedBy="profession", orphanRemoval=true)
     */
    private $appliers;

    public function __construct()
    {
        $this->appliers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProfession(): ?string
    {
        return $this->profession;
    }

    public function setProfession(string $profession): self
    {
        $this->profession = $profession;

        return $this;
    }

    /**
     * @return Collection|Applier[]
     */
    public function getAppliers(): Collection
    {
        return $this->appliers;
    }

    public function addApplier(Applier $applier): self
    {
        if (!$this->appliers->contains($applier)) {
            $this->appliers[] = $applier;
            $applier->setProfession($this);
        }

        return $this;
    }

    public function removeApplier(Applier $applier): self
    {
        if ($this->appliers->removeElement($applier)) {
            // set the owning side to null (unless already changed)
            if ($applier->getProfession() === $this) {
                $applier->setProfession(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->experience;
    }
}
