<?php

namespace App\Entity;

use App\Repository\FestivalRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FestivalRepository::class)
 */
class Festival
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
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $DateDebut;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $DateFin;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Adresse;

    /**
     * @ORM\Column(type="array")
     */
    private $ReseauxSociaux = [];

    /**
     * @ORM\OneToMany(targetEntity=POI::class, mappedBy="festival")
     */
    private $POIs;

    public function __construct()
    {
        $this->POIs = new ArrayCollection();
    }

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

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->DateDebut;
    }

    public function setDateDebut(?\DateTimeInterface $DateDebut): self
    {
        $this->DateDebut = $DateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->DateFin;
    }

    public function setDateFin(?\DateTimeInterface $DateFin): self
    {
        $this->DateFin = $DateFin;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->Adresse;
    }

    public function setAdresse(?string $Adresse): self
    {
        $this->Adresse = $Adresse;

        return $this;
    }

    public function getReseauxSociaux(): ?array
    {
        return $this->ReseauxSociaux;
    }

    public function setReseauxSociaux(array $ReseauxSociaux): self
    {
        $this->ReseauxSociaux = $ReseauxSociaux;

        return $this;
    }

    /**
     * @return Collection|POI[]
     */
    public function getPOIs(): Collection
    {
        return $this->POIs;
    }

    public function addPOI(POI $pOI): self
    {
        if (!$this->POIs->contains($pOI)) {
            $this->POIs[] = $pOI;
            $pOI->setFestival($this);
        }

        return $this;
    }

    public function removePOI(POI $pOI): self
    {
        if ($this->POIs->removeElement($pOI)) {
            // set the owning side to null (unless already changed)
            if ($pOI->getFestival() === $this) {
                $pOI->setFestival(null);
            }
        }

        return $this;
    }
}
