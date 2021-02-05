<?php

namespace App\Entity;

use App\Repository\PartenairesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PartenairesRepository::class)
 */
class Partenaires
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
     * @ORM\Column(type="string", length=255)
     */
    private $Site;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $ReseauxSociaux = [];

    /**
     * @ORM\ManyToOne(targetEntity=Festival::class, inversedBy="partenaires")
     */
    private $Festival;

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

    public function getSite(): ?string
    {
        return $this->Site;
    }

    public function setSite(string $Site): self
    {
        $this->Site = $Site;

        return $this;
    }

    public function getReseauxSociaux(): ?array
    {
        return $this->ReseauxSociaux;
    }

    public function setReseauxSociaux(?array $ReseauxSociaux): self
    {
        $this->ReseauxSociaux = $ReseauxSociaux;

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
}
