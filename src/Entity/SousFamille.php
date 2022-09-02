<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(repositoryClass=SousSousFamilleRepository::class)
 */
class SousFamille
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity=Famille::class, inversedBy="sousFamilles")
     */
    private $famille;

    /**
     * @ORM\OneToMany(targetEntity=SousSousFamille::class, mappedBy="SousFamille")
     */
    private $sousSousFamilles;

    public function __construct()
    {
        $this->sousSousFamilles = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getFamille(): ?Famille
    {
        return $this->famille;
    }

    public function setFamille(?Famille $famille): self
    {
        $this->famille = $famille;

        return $this;
    }

    /**
     * @return Collection|SousSousFamille[]
     */
    public function getSousSousFamilles(): Collection
    {
        return $this->sousSousFamilles;
    }

    public function __toString()
    {
        return $this->name;
    }
}
