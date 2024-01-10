<?php

namespace App\Entity;

use App\Repository\AffichagePubRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AffichagePubRepository::class)]
class AffichagePub
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'Transfer_Choix', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?ChoixUtilisateurPub $Choix_Utilisateur = null;

    #[ORM\ManyToMany(targetEntity: Pub::class, inversedBy: 'TransferPub')]
    private Collection $Pub;

    public function __construct()
    {
        $this->Pub = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getChoixUtilisateur(): ?ChoixUtilisateurPub
    {
        return $this->Choix_Utilisateur;
    }

    public function setChoixUtilisateur(ChoixUtilisateurPub $Choix_Utilisateur): self
    {
        $this->Choix_Utilisateur = $Choix_Utilisateur;

        return $this;
    }

    /**
     * @return Collection<int, Pub>
     */
    public function getPub(): Collection
    {
        return $this->Pub;
    }

    public function addPub(Pub $pub): self
    {
        if (!$this->Pub->contains($pub)) {
            $this->Pub->add($pub);
        }

        return $this;
    }

    public function removePub(Pub $pub): self
    {
        $this->Pub->removeElement($pub);

        return $this;
    }
}
