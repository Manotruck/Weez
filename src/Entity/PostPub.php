<?php

namespace App\Entity;

use App\Repository\PostPubRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PostPubRepository::class)]
class PostPub
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'genre', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Pub $Pub = null;

    

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Pub $pub = null;

    #[ORM\ManyToMany(targetEntity: GenrePub::class)]
    private Collection $genre;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?AuteurPub $auteur = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Code_Postal = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Pays = null;

    public function __construct()
    {
        $this->genre = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPub(): ?Pub
    {
        return $this->Pub;
    }

    public function setPub(Pub $Pub): self
    {
        $this->Pub = $Pub;

        return $this;
    }

   

    /**
     * @return Collection<int, GenrePub>
     */
    public function getGenre(): Collection
    {
        return $this->genre;
    }

    public function addGenre(GenrePub $genre): self
    {
        if (!$this->genre->contains($genre)) {
            $this->genre->add($genre);
        }

        return $this;
    }

    public function removeGenre(GenrePub $genre): self
    {
        $this->genre->removeElement($genre);

        return $this;
    }

    public function getAuteur(): ?AuteurPub
    {
        return $this->auteur;
    }

    public function setAuteur(?AuteurPub $auteur): self
    {
        $this->auteur = $auteur;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->Code_Postal;
    }

    public function setCodePostal(?string $Code_Postal): self
    {
        $this->Code_Postal = $Code_Postal;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->Pays;
    }

    public function setPays(?string $Pays): self
    {
        $this->Pays = $Pays;

        return $this;
    }
}
