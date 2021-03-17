<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PartenairesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
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
     * @ORM\ManyToOne(targetEntity=Festival::class, inversedBy="partenaires")
     */
    private $Festival;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Facebook;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Instagram;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Twitter;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $DescriptionEN;

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

    public function getFestival(): ?Festival
    {
        return $this->Festival;
    }

    public function setFestival(?Festival $Festival): self
    {
        $this->Festival = $Festival;

        return $this;
    }

    public function getFacebook(): ?string
    {
        return $this->Facebook;
    }

    public function setFacebook(?string $Facebook): self
    {
        $this->Facebook = $Facebook;

        return $this;
    }

    public function getInstagram(): ?string
    {
        return $this->Instagram;
    }

    public function setInstagram(?string $Instagram): self
    {
        $this->Instagram = $Instagram;

        return $this;
    }

    public function getTwitter(): ?string
    {
        return $this->Twitter;
    }

    public function setTwitter(?string $Twitter): self
    {
        $this->Twitter = $Twitter;

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
