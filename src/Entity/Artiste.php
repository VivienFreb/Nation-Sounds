<?php

namespace App\Entity;

use App\Repository\ArtisteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
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
     * @ORM\Column(type="string", length=255)
     */
    private $Description;

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
}
