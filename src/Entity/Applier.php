<?php

namespace App\Entity;

use App\Repository\ApplierRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ApplierRepository::class)
 */
class Applier
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Merci de renseigner votre prénom")
     * @Assert\Length(max="255", maxMessage="Le prénom saisie {{ value }} est trop long, elle ne devrait pas dépasser {{ limit }}")
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Merci de renseigner votre nom")
     * @Assert\Length(max="255", maxMessage="Le nom saisie {{ value }} est trop long, elle ne devrait pas dépasser {{ limit }}")
     */
    private $lastname;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="Merci de renseigner votre age")
     */
    private $age;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="Merci de renseigner votre taille en cm")
     */
    private $height;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Merci de renseigner votre origine")
     * @Assert\Length(max="255", maxMessage="L'oringine' saisie {{ value }} est trop long, elle ne devrait pas dépasser {{ limit }}")
     */
    private $origin;

    /**
     * @ORM\ManyToOne(targetEntity=Gender::class, inversedBy="appliers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $gender;

    /**
     * @ORM\ManyToOne(targetEntity=Profession::class, inversedBy="appliers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $profession;

    /**
     * @ORM\ManyToOne(targetEntity=Experience::class, inversedBy="warriorAppliers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $warriorSkill;

    /**
     * @ORM\ManyToOne(targetEntity=Experience::class, inversedBy="navigationAppliers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $navigationSkill;

    /**
     * @ORM\ManyToOne(targetEntity=Weapon::class, inversedBy="appliers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Weapon;

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

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getHeight(): ?int
    {
        return $this->height;
    }

    public function setHeight(int $height): self
    {
        $this->height = $height;

        return $this;
    }

    public function getOrigin(): ?string
    {
        return $this->origin;
    }

    public function setOrigin(string $origin): self
    {
        $this->origin = $origin;

        return $this;
    }

    public function getGender(): ?Gender
    {
        return $this->gender;
    }

    public function setGender(?Gender $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getProfession(): ?Profession
    {
        return $this->profession;
    }

    public function setProfession(?Profession $profession): self
    {
        $this->profession = $profession;

        return $this;
    }

    public function getWarriorSkill(): ?Experience
    {
        return $this->warriorSkill;
    }

    public function setWarriorSkill(?Experience $warriorSkill): self
    {
        $this->warriorSkill = $warriorSkill;

        return $this;
    }

    public function getNavigationSkill(): ?Experience
    {
        return $this->navigationSkill;
    }

    public function setNavigationSkill(?Experience $navigationSkill): self
    {
        $this->navigationSkill = $navigationSkill;

        return $this;
    }

    public function getWeapon(): ?Weapon
    {
        return $this->Weapon;
    }

    public function setWeapon(?Weapon $Weapon): self
    {
        $this->Weapon = $Weapon;

        return $this;
    }
}
