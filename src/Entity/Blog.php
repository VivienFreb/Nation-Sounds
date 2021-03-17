<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\BlogRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=BlogRepository::class)
 */
class Blog
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
    private $Titre;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $TitreEN;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Contenu;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $ContenuEN;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $DatePublication;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->Titre;
    }

    public function setTitre(?string $Titre): self
    {
        $this->Titre = $Titre;

        return $this;
    }

    public function getTitreEN(): ?string
    {
        return $this->TitreEN;
    }

    public function setTitreEN(?string $TitreEN): self
    {
        $this->TitreEN = $TitreEN;

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

    public function getContenuEN(): ?string
    {
        return $this->ContenuEN;
    }

    public function setContenuEN(?string $ContenuEN): self
    {
        $this->ContenuEN = $ContenuEN;

        return $this;
    }

    public function getDatePublication(): ?\DateTimeInterface
    {
        return $this->DatePublication;
    }

    public function setDatePublication(?\DateTimeInterface $DatePublication): self
    {
        $this->DatePublication = $DatePublication;

        return $this;
    }
}
