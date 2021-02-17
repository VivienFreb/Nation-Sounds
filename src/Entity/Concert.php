<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ConcertRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ConcertRepository::class)
 */
class Concert
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
     * @ORM\ManyToOne(targetEntity=Scene::class, inversedBy="Concert")
     */
    private $scene;

    /**
     * @ORM\ManyToOne(targetEntity=Festival::class, inversedBy="concerts")
     */
    private $Festival;

    /**
     * @ORM\ManyToMany(targetEntity=Artiste::class, inversedBy="concerts")
     */
    private $Artistes;

    public function __construct()
    {
        $this->Artistes = new ArrayCollection();
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

    public function getScene(): ?Scene
    {
        return $this->scene;
    }

    public function setScene(?Scene $scene): self
    {
        $this->scene = $scene;

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

    /**
     * @return Collection|Artiste[]
     */
    public function getArtistes(): Collection
    {
        return $this->Artistes;
    }

    public function addArtiste(Artiste $artiste): self
    {
        if (!$this->Artistes->contains($artiste)) {
            $this->Artistes[] = $artiste;
        }

        return $this;
    }

    public function removeArtiste(Artiste $artiste): self
    {
        $this->Artistes->removeElement($artiste);

        return $this;
    }
}
