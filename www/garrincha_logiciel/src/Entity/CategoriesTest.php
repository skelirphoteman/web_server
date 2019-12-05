<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoriesTestRepository")
 */
class CategoriesTest
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
    private $name;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $_at;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ValuePhysicalTest", mappedBy="categoriesTest")
     */
    private $valuesPhysicalTest;

    public function __construct()
    {
        $this->valuesPhysicalTest = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
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

    public function getAt(): ?\DateTimeInterface
    {
        return $this->_at;
    }

    public function setAt(?\DateTimeInterface $_at): self
    {
        $this->_at = $_at;

        return $this;
    }

    /**
     * @return Collection|ValuePhysicalTest[]
     */
    public function getValuesPhysicalTest(): Collection
    {
        return $this->valuesPhysicalTest;
    }

    public function addValuesPhysicalTest(ValuePhysicalTest $valuesPhysicalTest): self
    {
        if (!$this->valuesPhysicalTest->contains($valuesPhysicalTest)) {
            $this->valuesPhysicalTest[] = $valuesPhysicalTest;
            $valuesPhysicalTest->setCategoriesTest($this);
        }

        return $this;
    }

    public function removeValuesPhysicalTest(ValuePhysicalTest $valuesPhysicalTest): self
    {
        if ($this->valuesPhysicalTest->contains($valuesPhysicalTest)) {
            $this->valuesPhysicalTest->removeElement($valuesPhysicalTest);
            // set the owning side to null (unless already changed)
            if ($valuesPhysicalTest->getCategoriesTest() === $this) {
                $valuesPhysicalTest->setCategoriesTest(null);
            }
        }

        return $this;
    }
}
