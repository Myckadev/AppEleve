<?php

namespace App\Entity;

use App\Repository\ActiviteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ActiviteRepository::class)
 */
class Activite
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
    private $nom;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_creation;

    /**
     * @ORM\ManyToMany(targetEntity=Contenu::class, inversedBy="activites")
     * @Assert\Count(min=1, minMessage="Pas assez de contenu dans votre acitvité", max=5, maxMessage="Trop de contenu dans votre activité")
     */
    private $contenu;

    /**
     * @ORM\ManyToMany(targetEntity=Eleve::class, inversedBy="activites")
     */
    private $eleves;


    public function __construct()
    {
        $this->contenu = new ArrayCollection();
        $this->eleves = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->date_creation;
    }

    public function setDateCreation(\DateTimeInterface $date_creation): self
    {
        $this->date_creation = $date_creation;

        return $this;
    }

    /**
     * @return Collection|Contenu[]
     */
    public function getContenu(): Collection
    {
        return $this->contenu;
    }

    public function addContenu(Contenu $contenu): self
    {
        if (!$this->contenu->contains($contenu)) {
            $this->contenu[] = $contenu;
        }

        return $this;
    }

    public function removeContenu(Contenu $contenu): self
    {
        $this->contenu->removeElement($contenu);

        return $this;
    }

    /**
     * @return Collection|Eleve[]
     */
    public function getEleves(): Collection
    {
        return $this->eleves;
    }

    public function addElefe(Eleve $elefe): self
    {
        if (!$this->eleves->contains($elefe)) {
            $this->eleves[] = $elefe;
        }

        return $this;
    }

    public function removeElefe(Eleve $elefe): self
    {
        $this->eleves->removeElement($elefe);

        return $this;
    }


}
