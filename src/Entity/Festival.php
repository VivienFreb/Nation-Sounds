<?php

namespace App\Entity;

use App\Repository\FestivalRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @Assert\Expression(
     *     "this.getDateFin() >= this.getDateDebut()",
     *     message="La date de fin ne peut pas être avant la date de début."
     * )
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

    /**
     * @ORM\OneToMany(targetEntity=Information::class, mappedBy="Festival")
     */
    private $information;

    /**
     * @ORM\OneToMany(targetEntity=Events::class, mappedBy="Festival")
     */
    private $events;

    /**
     * @ORM\OneToMany(targetEntity=Partenaires::class, mappedBy="Festival")
     */
    private $partenaires;

    /**
     * @ORM\OneToMany(targetEntity=FAQ::class, mappedBy="Festival")
     */
    private $FAQs;

    /**
     * @ORM\OneToMany(targetEntity=Scene::class, mappedBy="Festival")
     */
    private $scenes;

    /**
     * @ORM\OneToMany(targetEntity=Concert::class, mappedBy="Festival")
     */
    private $concerts;

    public function __construct()
    {
        $this->POIs = new ArrayCollection();
        $this->information = new ArrayCollection();
        $this->events = new ArrayCollection();
        $this->partenaires = new ArrayCollection();
        $this->artistes = new ArrayCollection();
        $this->FAQs = new ArrayCollection();
        $this->scenes = new ArrayCollection();
        $this->concerts = new ArrayCollection();
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

    /**
     * @return Collection|Information[]
     */
    public function getInformation(): Collection
    {
        return $this->information;
    }

    public function addInformation(Information $information): self
    {
        if (!$this->information->contains($information)) {
            $this->information[] = $information;
            $information->setFestival($this);
        }

        return $this;
    }

    public function removeInformation(Information $information): self
    {
        if ($this->information->removeElement($information)) {
            // set the owning side to null (unless already changed)
            if ($information->getFestival() === $this) {
                $information->setFestival(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Events[]
     */
    public function getEvents(): Collection
    {
        return $this->events;
    }

    public function addEvent(Events $event): self
    {
        if (!$this->events->contains($event)) {
            $this->events[] = $event;
            $event->setFestival($this);
        }

        return $this;
    }

    public function removeEvent(Events $event): self
    {
        if ($this->events->removeElement($event)) {
            // set the owning side to null (unless already changed)
            if ($event->getFestival() === $this) {
                $event->setFestival(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Partenaires[]
     */
    public function getPartenaires(): Collection
    {
        return $this->partenaires;
    }

    public function addPartenaire(Partenaires $partenaire): self
    {
        if (!$this->partenaires->contains($partenaire)) {
            $this->partenaires[] = $partenaire;
            $partenaire->setFestival($this);
        }

        return $this;
    }

    public function removePartenaire(Partenaires $partenaire): self
    {
        if ($this->partenaires->removeElement($partenaire)) {
            // set the owning side to null (unless already changed)
            if ($partenaire->getFestival() === $this) {
                $partenaire->setFestival(null);
            }
        }

        return $this;
    }


    /**
     * @return Collection|FAQ[]
     */
    public function getFAQs(): Collection
    {
        return $this->FAQs;
    }

    public function addFAQ(FAQ $fAQ): self
    {
        if (!$this->FAQs->contains($fAQ)) {
            $this->FAQs[] = $fAQ;
            $fAQ->setFestival($this);
        }

        return $this;
    }

    public function removeFAQ(FAQ $fAQ): self
    {
        if ($this->FAQs->removeElement($fAQ)) {
            // set the owning side to null (unless already changed)
            if ($fAQ->getFestival() === $this) {
                $fAQ->setFestival(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Scene[]
     */
    public function getScenes(): Collection
    {
        return $this->scenes;
    }

    public function addScene(Scene $scene): self
    {
        if (!$this->scenes->contains($scene)) {
            $this->scenes[] = $scene;
            $scene->setFestival($this);
        }

        return $this;
    }

    public function removeScene(Scene $scene): self
    {
        if ($this->scenes->removeElement($scene)) {
            // set the owning side to null (unless already changed)
            if ($scene->getFestival() === $this) {
                $scene->setFestival(null);
            }
        }

        return $this;
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
            $concert->setFestival($this);
        }

        return $this;
    }

    public function removeConcert(Concert $concert): self
    {
        if ($this->concerts->removeElement($concert)) {
            // set the owning side to null (unless already changed)
            if ($concert->getFestival() === $this) {
                $concert->setFestival(null);
            }
        }

        return $this;
    }

    public function __toString(){
        return $this->Nom;
    }
}
