<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ArtisteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
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
     * @ORM\Column(type="text")
     */
    private $Description;

    /**
     * @ORM\ManyToOne(targetEntity=Concert::class, inversedBy="artistes")
     */
    private $Concert;

    /**
     * @ORM\ManyToMany(targetEntity=Concert::class, mappedBy="Artistes")
     */
    private $concerts;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $StyleMusiqueEN;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $DescriptionEN;

    public function __construct()
    {
        $this->concerts = new ArrayCollection();
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

    public function getConcert(): ?Concert
    {
        return $this->Concert;
    }

    public function setConcert(?Concert $Concert): self
    {
        $this->Concert = $Concert;

        return $this;
    }

    public function __toString()
    {
        return '(' . $this->id . ') ' .$this->NomDeScene;
    }

    /**
     * @return Collection|Concert[]
     */
    public function getConcerts(): Collection
    {
        return $this->concerts;
    }

    public function addConcert(Concert $concert): self
    {
        if (!$this->concerts->contains($concert)) {
            $this->concerts[] = $concert;
            $concert->addArtiste($this);
        }

        return $this;
    }

    public function removeConcert(Concert $concert): self
    {
        if ($this->concerts->removeElement($concert)) {
            $concert->removeArtiste($this);
        }

        return $this;
    }

    public function getStyleMusiqueEN(): ?string
    {
        return $this->StyleMusiqueEN;
    }

    public function setStyleMusiqueEN(?string $StyleMusiqueEN): self
    {
        $this->StyleMusiqueEN = $StyleMusiqueEN;

        return $this;
    }

    public function getDescriptionEN(): ?string
    {
        return $this->DescriptionEN;
    }

    public function setDescriptionEN(?string $DescriptionEN): self
    {
        $this->DescriptionEN = $DescriptionEN;

        return $this;
    }
}
