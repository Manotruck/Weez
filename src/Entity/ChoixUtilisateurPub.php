<?php

namespace App\Entity;

use App\Repository\ChoixUtilisateurPubRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChoixUtilisateurPubRepository::class)]
class ChoixUtilisateurPub
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?utilisateur $utilisateur = null;

    #[ORM\ManyToMany(targetEntity: GenrePub::class)]
    private Collection $Genre_Pub;

    #[ORM\Column]
    private ?bool $local = null;

    #[ORM\Column]
    private ?bool $regional = null;

    #[ORM\Column]
    private ?bool $national = null;

    #[ORM\Column]
    private ?bool $international = null;

    #[ORM\OneToOne(mappedBy: 'Choix_Utilisateur', cascade: ['persist', 'remove'])]
    private ?AffichagePub $Transfer_Choix = null;

    public function __construct()
    {
        $this->Genre_Pub = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUtilisateur(): ?utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?utilisateur $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * @return Collection<int, GenrePub>
     */
    public function getGenrePub(): Collection
    {
        return $this->Genre_Pub;
    }

    public function addGenrePub(GenrePub $genrePub): self
    {
        if (!$this->Genre_Pub->contains($genrePub)) {
            $this->Genre_Pub->add($genrePub);
        }

        return $this;
    }

    public function removeGenrePub(GenrePub $genrePub): self
    {
        $this->Genre_Pub->removeElement($genrePub);

        return $this;
    }

    public function isLocal(): ?bool
    {
        return $this->local;
    }

    public function setLocal(bool $local): self
    {
        $this->local = $local;

        return $this;
    }

    public function isRegional(): ?bool
    {
        return $this->regional;
    }

    public function setRegional(bool $regional): self
    {
        $this->regional = $regional;

        return $this;
    }

    public function isNational(): ?bool
    {
        return $this->national;
    }

    public function setNational(bool $national): self
    {
        $this->national = $national;

        return $this;
    }

    public function isInternational(): ?bool
    {
        return $this->international;
    }

    public function setInternational(bool $international): self
    {
        $this->international = $international;

        return $this;
    }

    public function getTransferChoix(): ?AffichagePub
    {
        return $this->Transfer_Choix;
    }

    public function setTransferChoix(AffichagePub $Transfer_Choix): self
    {
        // set the owning side of the relation if necessary
        if ($Transfer_Choix->getChoixUtilisateur() !== $this) {
            $Transfer_Choix->setChoixUtilisateur($this);
        }

        $this->Transfer_Choix = $Transfer_Choix;

        return $this;
    }
}
