<?php

namespace App\Entity;

use App\Repository\ArtisteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArtisteRepository::class)
 */
class Artiste
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
    private $NomDeScene;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $StyleMusique;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Description;

    /**
     * @ORM\ManyToMany(targetEntity=festival::class, inversedBy="artistes")
     */
    private $festival;

    /**
     * @ORM\ManyToOne(targetEntity=Concert::class, inversedBy="artistes")
     */
    private $Concert;

    public function __construct()
    {
        $this->festival = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomDeScene(): ?string
    {
        return $this->NomDeScene;
    }

    public function setNomDeScene(string $NomDeScene): self
    {
        $this->NomDeScene = $NomDeScene;

        return $this;
    }

    public function getStyleMusique(): ?string
    {
        return $this->StyleMusique;
    }

    public function setStyleMusique(string $StyleMusique): self
    {
        $this->StyleMusique = $StyleMusique;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    /**
     * @return Collection|festival[]
     */
    public function getFestival(): Collection
    {
        return $this->festival;
    }

    public function addFestival(festival $festival): self
    {
        if (!$this->festival->contains($festival)) {
            $this->festival[] = $festival;
        }

        return $this;
    }

    public function removeFestival(festival $festival): self
    {
        $this->festival->removeElement($festival);

        return $this;
    }

    public function getConcert(): ?Concert
    {
        return $this->Concert;
    }

    public function setConcert(?Concert $Concert): self
    {
        $this->Concert = $Concert;

        return $this;
    }
}
