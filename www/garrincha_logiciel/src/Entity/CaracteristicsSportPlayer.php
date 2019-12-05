<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CaracteristicsSportPlayerRepository")
 */
class CaracteristicsSportPlayer
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
    private $team;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $level;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $position;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $strong_foot;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $weight;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $size;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\SportPlayer", mappedBy="caracteristics", cascade={"persist", "remove"})
     */
    private $sportPlayer;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTeam(): ?string
    {
        return $this->team;
    }

    public function setTeam(?string $team): self
    {
        $this->team = $team;

        return $this;
    }

    public function getLevel(): ?string
    {
        return $this->level;
    }

    public function setLevel(?string $level): self
    {
        $this->level = $level;

        return $this;
    }

    public function getPosition(): ?string
    {
        return $this->position;
    }

    public function setPosition(?string $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function getStrongFoot(): ?string
    {
        return $this->strong_foot;
    }

    public function setStrongFoot(?string $strong_foot): self
    {
        $this->strong_foot = $strong_foot;

        return $this;
    }

    public function getWeight(): ?float
    {
        return $this->weight;
    }

    public function setWeight(?float $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getSize(): ?int
    {
        return $this->size;
    }

    public function setSize(?int $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getSportPlayer(): ?SportPlayer
    {
        return $this->sportPlayer;
    }

    public function setSportPlayer(?SportPlayer $sportPlayer): self
    {
        $this->sportPlayer = $sportPlayer;

        // set (or unset) the owning side of the relation if necessary
        $newCaracteristics = $sportPlayer === null ? null : $this;
        if ($newCaracteristics !== $sportPlayer->getCaracteristics()) {
            $sportPlayer->setCaracteristics($newCaracteristics);
        }

        return $this;
    }
}
