<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ValuePhysicalTestRepository")
 */
class ValuePhysicalTest
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\SportPlayer", inversedBy="valuePhysicalTests")
     */
    private $sport_player;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\PhysicalTest", inversedBy="Value")
     */
    private $physical_test;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $value;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $_at;

    /**
     * @ORM\Column(type="json_array", nullable=true)
     */
    private $options = [];

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CategoriesTest", inversedBy="valuesPhysicalTest")
     */
    private $categoriesTest;


    public function __construct()
    {
        $this->category = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSportPlayer(): ?SportPlayer
    {
        return $this->sport_player;
    }

    public function setSportPlayer(?SportPlayer $sport_player): self
    {
        $this->sport_player = $sport_player;

        return $this;
    }

    public function getPhysicalTest(): ?PhysicalTest
    {
        return $this->physical_test;
    }

    public function setPhysicalTest(?PhysicalTest $physical_test): self
    {
        $this->physical_test = $physical_test;

        return $this;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(?string $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getAt(): ?\DateTimeInterface
    {
        return $this->_at;
    }

    public function setAt(?\DateTimeInterface $_at): self
    {
        $this->_at = $_at;

        return $this;
    }

    public function getOptions(): ?array
    {
        return $this->options;
    }

    public function setOptions(?array $options): self
    {
        $this->options = $options;

        return $this;
    }

    public function getCategoriesTest(): ?CategoriesTest
    {
        return $this->categoriesTest;
    }

    public function setCategoriesTest(?CategoriesTest $categoriesTest): self
    {
        $this->categoriesTest = $categoriesTest;

        return $this;
    }
}
