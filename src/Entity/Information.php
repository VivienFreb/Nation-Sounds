<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\InformationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=InformationRepository::class)
 */
class Information
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
    private $Type;

    /**
     * @ORM\Column(type="date")
     */
    private $DateEmission;

    /**
     * @ORM\ManyToOne(targetEntity=Festival::class, inversedBy="information")
     */
    private $Festival;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Contenu;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $NomEN;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $ContenuEN;

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

    public function getType(): ?string
    {
        return $this->Type;
    }

    public function setType(string $Type): self
    {
        $this->Type = $Type;

        return $this;
    }

    public function getDateEmission(): ?\DateTimeInterface
    {
        return $this->DateEmission;
    }

    public function setDateEmission(\DateTimeInterface $DateEmission): self
    {
        $this->DateEmission = $DateEmission;

        return $this;
    }

    public function getFestival(): ?Festival
    {
        return $this->Festival;
    }

    public function setFestival(?Festival $Festival): self
    {
        $this->Festival = $Festival;

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->Contenu;
    }

    public function setContenu(?string $Contenu): self
    {
        $this->Contenu = $Contenu;

        return $this;
    }

    public function getNomEN(): ?string
    {
        return $this->NomEN;
    }

    public function setNomEN(?string $NomEN): self
    {
        $this->NomEN = $NomEN;

        return $this;
    }

    public function getContenuEN(): ?string
    {
        return $this->ContenuEN;
    }

    public function setContenuEN(?string $ContenuEN): self
    {
        $this->ContenuEN = $ContenuEN;

        return $this;
    }
}
