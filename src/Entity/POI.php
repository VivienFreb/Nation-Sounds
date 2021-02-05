<?php

namespace App\Entity;

use App\Repository\POIRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=POIRepository::class)
 */
class POI
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
    private $Nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Description;

    /**
     * @ORM\Column(type="json")
     */
    private $Coordonnees = [];

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Lien;

    /**
     * @ORM\ManyToOne(targetEntity=Festival::class, inversedBy="POIs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $festival;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

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

    public function getCoordonnees(): ?array
    {
        return $this->Coordonnees;
    }

    public function setCoordonnees(array $Coordonnees): self
    {
        $this->Coordonnees = $Coordonnees;

        return $this;
    }

    public function getLien(): ?string
    {
        return $this->Lien;
    }

    public function setLien(?string $Lien): self
    {
        $this->Lien = $Lien;

        return $this;
    }

    public function getFestival(): ?Festival
    {
        return $this->festival;
    }

    public function setFestival(?Festival $festival): self
    {
        $this->festival = $festival;

        return $this;
    }
}