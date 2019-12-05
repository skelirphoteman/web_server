<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SportPlayerRepository")
 */
class SportPlayer
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $surname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $birthday;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ValuePhysicalTest", mappedBy="sport_player")
     */
    private $valuePhysicalTests;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $statue;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Media", cascade={"persist", "remove"})
     */
    private $profil_image;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\CaracteristicsSportPlayer", inversedBy="sportPlayer", cascade={"persist", "remove"})
     */
    private $caracteristics;

    public function __construct()
    {
        $this->valuePhysicalTests = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(?string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(?\DateTimeInterface $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * @return Collection|ValuePhysicalTest[]
     */
    public function getValuePhysicalTests(): Collection
    {
        return $this->valuePhysicalTests;
    }

    public function addValuePhysicalTest(ValuePhysicalTest $valuePhysicalTest): self
    {
        if (!$this->valuePhysicalTests->contains($valuePhysicalTest)) {
            $this->valuePhysicalTests[] = $valuePhysicalTest;
            $valuePhysicalTest->setSportPlayer($this);
        }

        return $this;
    }

    public function removeValuePhysicalTest(ValuePhysicalTest $valuePhysicalTest): self
    {
        if ($this->valuePhysicalTests->contains($valuePhysicalTest)) {
            $this->valuePhysicalTests->removeElement($valuePhysicalTest);
            // set the owning side to null (unless already changed)
            if ($valuePhysicalTest->getSportPlayer() === $this) {
                $valuePhysicalTest->setSportPlayer(null);
            }
        }

        return $this;
    }

    public function getStatue(): ?int
    {
        return $this->statue;
    }

    public function setStatue(?int $statue): self
    {
        $this->statue = $statue;

        return $this;
    }

    public function getProfilImage(): ?Media
    {
        return $this->profil_image;
    }

    public function setProfilImage(?Media $profil_image): self
    {
        $this->profil_image = $profil_image;

        return $this;
    }

    public function getCaracteristics(): ?CaracteristicsSportPlayer
    {
        return $this->caracteristics;
    }

    public function setCaracteristics(?CaracteristicsSportPlayer $caracteristics): self
    {
        $this->caracteristics = $caracteristics;

        return $this;
    }
}
