<?php

namespace App\Entity;

use App\Repository\ZoneLivraisonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: ZoneLivraisonRepository::class)]
#[UniqueEntity(fields: ['zone'], message: 'Cette zone est déjà créée')]
class ZoneLivraison
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, unique:true)]
    private ?string $zone = null;

    #[ORM\Column]
    #[Assert\LessThanOrEqual(propertyPath:"estimationDeux", message:"Cette valeur doit être inférieur à {{ compared_value }}")]
    private ?int $estimationUn = null;

    #[ORM\Column]
    private ?int $estimationDeux = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\OneToMany(mappedBy: 'zoneLivraisonPreferentielle', targetEntity: User::class)]
    private Collection $users;

    #[ORM\OneToMany(mappedBy: 'zoneLivraisonPreferentielle', targetEntity: Client::class)]
    private Collection $clients;

    #[ORM\OneToMany(mappedBy: 'zoneLivraisonPreferentielle', targetEntity: Achat::class)]
    private Collection $achats;

    #[ORM\OneToMany(mappedBy: 'zoneLivraison', targetEntity: ZoneProduit::class)]
    private Collection $zoneProduits;

    #[ORM\OneToMany(mappedBy: 'zoneLivraison', targetEntity: Adresse::class)]
    private Collection $adresses;

    public function __toString()
    {
        return strtoupper($this->zone)." livré dans ( ".$this->estimationUn." à ".$this->estimationDeux ." jours).";
    }

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->clients = new ArrayCollection();
        $this->achats = new ArrayCollection();
        $this->zoneProduits = new ArrayCollection();
        $this->adresses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getZone(): ?string
    {
        return strtoupper($this->zone);
    }

    public function setZone(string $zone): self
    {
        $this->zone = strtoupper($zone);

        return $this;
    }

    public function getEstimationUn(): ?int
    {
        return $this->estimationUn;
    }

    public function setEstimationUn(int $estimationUn): self
    {
        $this->estimationUn = $estimationUn;

        return $this;
    }

    public function getEstimationDeux(): ?int
    {
        return $this->estimationDeux;
    }

    public function setEstimationDeux(int $estimationDeux): self
    {
        $this->estimationDeux = $estimationDeux;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

   
    /**
     * @return Collection<int, Client>
     */
    public function getClients(): Collection
    {
        return $this->clients;
    }

    public function addClient(Client $client): self
    {
        if (!$this->clients->contains($client)) {
            $this->clients->add($client);
        }

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
            $achat->setZoneLivraisonPreferentielle($this);
        }

        return $this;
    }

    public function removeAchat(Achat $achat): self
    {
        if ($this->achats->removeElement($achat)) {
            // set the owning side to null (unless already changed)
            if ($achat->getZoneLivraisonPreferentielle() === $this) {
                $achat->setZoneLivraisonPreferentielle(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ZoneProduit>
     */
    public function getZoneProduits(): Collection
    {
        return $this->zoneProduits;
    }

    public function addZoneProduit(ZoneProduit $zoneProduit): self
    {
        if (!$this->zoneProduits->contains($zoneProduit)) {
            $this->zoneProduits->add($zoneProduit);
            $zoneProduit->setZoneLivraison($this);
        }

        return $this;
    }

    public function removeZoneProduit(ZoneProduit $zoneProduit): self
    {
        if ($this->zoneProduits->removeElement($zoneProduit)) {
            // set the owning side to null (unless already changed)
            if ($zoneProduit->getZoneLivraison() === $this) {
                $zoneProduit->setZoneLivraison(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Adresse>
     */
    public function getAdresses(): Collection
    {
        return $this->adresses;
    }

    public function addAdress(Adresse $adress): self
    {
        if (!$this->adresses->contains($adress)) {
            $this->adresses->add($adress);
            $adress->setZoneLivraison($this);
        }

        return $this;
    }

    public function removeAdress(Adresse $adress): self
    {
        if ($this->adresses->removeElement($adress)) {
            // set the owning side to null (unless already changed)
            if ($adress->getZoneLivraison() === $this) {
                $adress->setZoneLivraison(null);
            }
        }

        return $this;
    }
}
