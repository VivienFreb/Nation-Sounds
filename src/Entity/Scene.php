<?php

namespace App\Entity;

use App\Repository\SceneRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SceneRepository::class)
 */
class Scene
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Nom;

    /**
     * @ORM\Column(type="integer")
     */
    private $NbPlaces;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Emplacement;

    /**
     * @ORM\ManyToOne(targetEntity=festival::class, inversedBy="scenes")
     */
    private $festival;

    /**
     * @ORM\OneToMany(targetEntity=Concert::class, mappedBy="scene")
     */
    private $Concert;

    public function __construct()
    {
        $this->Concert = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(?string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getNbPlaces(): ?int
    {
        return $this->NbPlaces;
    }

    public function setNbPlaces(int $NbPlaces): self
    {
        $this->NbPlaces = $NbPlaces;

        return $this;
    }

    public function getEmplacement(): ?string
    {
        return $this->Emplacement;
    }

    public function setEmplacement(?string $Emplacement): self
    {
        $this->Emplacement = $Emplacement;

        return $this;
    }

    public function getFestival(): ?festival
    {
        return $this->festival;
    }

    public function setFestival(?festival $festival): self
    {
        $this->festival = $festival;

        return $this;
    }

    /**
     * @return Collection|Concert[]
     */
    public function getConcert(): Collection
    {
        return $this->Concert;
    }

    public function addConcert(Concert $concert): self
    {
        if (!$this->Concert->contains($concert)) {
            $this->Concert[] = $concert;
            $concert->setScene($this);
        }

        return $this;
    }

    public function removeConcert(Concert $concert): self
    {
        if ($this->Concert->removeElement($concert)) {
            // set the owning side to null (unless already changed)
            if ($concert->getScene() === $this) {
                $concert->setScene(null);
            }
        }

        return $this;
    }
}
