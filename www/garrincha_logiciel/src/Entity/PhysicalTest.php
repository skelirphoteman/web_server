<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PhysicalTestRepository")
 */
class PhysicalTest
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $unity;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ValuePhysicalTest", mappedBy="physical_test")
     */
    private $Values;

    public function __construct()
    {
        $this->Values = new ArrayCollection();
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

    public function getUnity(): ?string
    {
        return $this->unity;
    }

    public function setUnity(?string $unity): self
    {
        $this->unity = $unity;

        return $this;
    }

    /**
     * @return Collection|ValuePhysicalTest[]
     */
    public function getValues(): Collection
    {
        return $this->Values;
    }

    public function addValues(ValuePhysicalTest $value): self
    {
        if (!$this->Values->contains($value)) {
            $this->Values[] = $values;
            $value->setPhysicalTest($this);
        }

        return $this;
    }

    public function removeValue(ValuePhysicalTest $value): self
    {
        if ($this->Value->contains($value)) {
            $this->Value->removeElement($value);
            // set the owning side to null (unless already changed)
            if ($value->getPhysicalTest() === $this) {
                $value->setPhysicalTest(null);
            }
        }

        return $this;
    }
}
