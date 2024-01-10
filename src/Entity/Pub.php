<?php

namespace App\Entity;

use App\Repository\PubRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PubRepository::class)]
class Pub
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom = null;

    #[ORM\Column(length: 255)]
    private ?string $Code_Postal = null;

    #[ORM\Column(length: 255)]
    private ?string $Pays = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?AuteurPub $Auteur_Pub_id = null;

    #[ORM\ManyToMany(targetEntity: GenrePub::class)]
    private Collection $Genre_Pub;

    #[ORM\OneToOne(mappedBy: 'Pub', cascade: ['persist', 'remove'])]
    private ?PostPub $genre = null;

    #[ORM\ManyToMany(targetEntity: AffichagePub::class, mappedBy: 'Pub')]
    private Collection $TransferPub;

    public function __construct()
    {
        $this->Genre_Pub = new ArrayCollection();
        $this->TransferPub = new ArrayCollection();
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

    public function getCodePostal(): ?string
    {
        return $this->Code_Postal;
    }

    public function setCodePostal(string $Code_Postal): self
    {
        $this->Code_Postal = $Code_Postal;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->Pays;
    }

    public function setPays(string $Pays): self
    {
        $this->Pays = $Pays;

        return $this;
    }

    public function getAuteurPubId(): ?AuteurPub
    {
        return $this->Auteur_Pub_id;
    }

    public function setAuteurPubId(?AuteurPub $Auteur_Pub_id): self
    {
        $this->Auteur_Pub_id = $Auteur_Pub_id;

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

    public function getGenre(): ?PostPub
    {
        return $this->genre;
    }

    public function setGenre(PostPub $genre): self
    {
        // set the owning side of the relation if necessary
        if ($genre->getPub() !== $this) {
            $genre->setPub($this);
        }

        $this->genre = $genre;

        return $this;
    }

    /**
     * @return Collection<int, AffichagePub>
     */
    public function getTransferPub(): Collection
    {
        return $this->TransferPub;
    }

    public function addTransferPub(AffichagePub $transferPub): self
    {
        if (!$this->TransferPub->contains($transferPub)) {
            $this->TransferPub->add($transferPub);
            $transferPub->addPub($this);
        }

        return $this;
    }

    public function removeTransferPub(AffichagePub $transferPub): self
    {
        if ($this->TransferPub->removeElement($transferPub)) {
            $transferPub->removePub($this);
        }

        return $this;
    }
}
