<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
#[ORM\HasLifecycleCallbacks()]
class Client
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Identite $identite = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Adresse $adresse = null;

    #[ORM\Column(length: 255)]
    private ?string $codeClient = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable:true)]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\OneToMany(mappedBy: 'client', targetEntity: Achat::class)]
    private Collection $achats;

    // #[ORM\ManyToOne(inversedBy: 'clients')]
    // #[ORM\JoinColumn(nullable: false)]
    // private ?ZoneLivraison $zoneLivraisonPreferentielle = null;

    #[ORM\OneToOne(mappedBy: 'client', cascade: ['persist', 'remove'])]
    private ?User $utilisateur = null;

    
    public function __construct()
    {
        $this->codeClient=strtoupper(uniqid('FCL-'));
        $this->createdAt=new \DateTimeImmutable();
        $this->achats = new ArrayCollection();
    }


    #[ORM\PrePersist]
    #[ORM\PreUpdate]
    public function misAJour(){
        $this->codeClient=uniqid('FCL-');
    }
    
    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdentite(): ?Identite
    {
        return $this->identite;
    }

    public function setIdentite(Identite $identite): self
    {
        $this->identite = $identite;

        return $this;
    }

    public function getAdresse(): ?Adresse
    {
        return $this->adresse;
    }

    public function setAdresse(Adresse $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCodeClient(): ?string
    {
        return $this->codeClient;
    }

    public function setCodeClient(string $codeClient): self
    {
        $this->codeClient = $codeClient;

        return $this;
    }

    /**
     * @return Collection<int, Achat>
     */
    public function getAchats(): Collection
    {
        return $this->achats;
    }

    public function addAchat(Achat $achat): self
    {
        if (!$this->achats->contains($achat)) {
            $this->achats->add($achat);
            $achat->setClient($this);
        }

        return $this;
    }

    public function removeAchat(Achat $achat): self
    {
        if ($this->achats->removeElement($achat)) {
            // set the owning side to null (unless already changed)
            if ($achat->getClient() === $this) {
                $achat->setClient(null);
            }
        }

        return $this;
    }

    // public function getZoneLivraisonPreferentielle(): ?zoneLivraison
    // {
    //     return $this->zoneLivraisonPreferentielle;
    // }

    // public function setZoneLivraisonPreferentielle(?zoneLivraison $zoneLivraisonPreferentielle): self
    // {
    //     $this->zoneLivraisonPreferentielle = $zoneLivraisonPreferentielle;

    //     return $this;
    // }

    public function getUtilisateur(): ?User
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(User $utilisateur): self
    {
        // set the owning side of the relation if necessary
        if ($utilisateur->getClient() !== $this) {
            $utilisateur->setClient($this);
        }

        $this->utilisateur = $utilisateur;

        return $this;
    }

    
}
