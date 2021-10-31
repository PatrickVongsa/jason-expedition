<?php

namespace App\Entity;

use App\Repository\ExperienceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ExperienceRepository::class)
 */
class Experience
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
    private $experience;

    /**
     * @ORM\OneToMany(targetEntity=Applier::class, mappedBy="warriorSkill", orphanRemoval=true)
     */
    private $warriorAppliers;

    /**
     * @ORM\OneToMany(targetEntity=Applier::class, mappedBy="navigationSkill", orphanRemoval=true)
     */
    private $navigationAppliers;

    public function __construct()
    {
        $this->warriorAppliers = new ArrayCollection();
        $this->navigationAppliers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getExperience(): ?string
    {
        return $this->experience;
    }

    public function setExperience(string $experience): self
    {
        $this->experience = $experience;

        return $this;
    }

    /**
     * @return Collection|Applier[]
     */
    public function getWarriorAppliers(): Collection
    {
        return $this->warriorAppliers;
    }

    public function addWarriorApplier(Applier $warriorApplier): self
    {
        if (!$this->warriorAppliers->contains($warriorApplier)) {
            $this->warriorAppliers[] = $warriorApplier;
            $warriorApplier->setWarriorSkill($this);
        }

        return $this;
    }

    public function removeWarriorApplier(Applier $warriorApplier): self
    {
        if ($this->warriorAppliers->removeElement($warriorApplier)) {
            // set the owning side to null (unless already changed)
            if ($warriorApplier->getWarriorSkill() === $this) {
                $warriorApplier->setWarriorSkill(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Applier[]
     */
    public function getNavigationAppliers(): Collection
    {
        return $this->navigationAppliers;
    }

    public function addNavigationApplier(Applier $navigationApplier): self
    {
        if (!$this->navigationAppliers->contains($navigationApplier)) {
            $this->navigationAppliers[] = $navigationApplier;
            $navigationApplier->setNavigationSkill($this);
        }

        return $this;
    }

    public function removeNavigationApplier(Applier $navigationApplier): self
    {
        if ($this->navigationAppliers->removeElement($navigationApplier)) {
            // set the owning side to null (unless already changed)
            if ($navigationApplier->getNavigationSkill() === $this) {
                $navigationApplier->setNavigationSkill(null);
            }
        }

        return $this;
    }
}
