<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\FAQRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=FAQRepository::class)
 */
class FAQ
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
    private $Question;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Reponse;

    /**
     * @ORM\ManyToOne(targetEntity=Festival::class, inversedBy="FAQs")
     */
    private $Festival;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $QuestionEN;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ReponseEN;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuestion(): ?string
    {
        return $this->Question;
    }

    public function setQuestion(string $Question): self
    {
        $this->Question = $Question;

        return $this;
    }

    public function getReponse(): ?string
    {
        return $this->Reponse;
    }

    public function setReponse(string $Reponse): self
    {
        $this->Reponse = $Reponse;

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

    public function getQuestionEN(): ?string
    {
        return $this->QuestionEN;
    }

    public function setQuestionEN(?string $QuestionEN): self
    {
        $this->QuestionEN = $QuestionEN;

        return $this;
    }

    public function getReponseEN(): ?string
    {
        return $this->ReponseEN;
    }

    public function setReponseEN(?string $ReponseEN): self
    {
        $this->ReponseEN = $ReponseEN;

        return $this;
    }
}
