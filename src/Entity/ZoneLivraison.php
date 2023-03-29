<?php

namespace App\Entity;

use App\Repository\ZoneLivraisonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

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
    private ?int $estimationUn = null;

    #[ORM\Column]
    private ?int $estimationDeux = null;

    #[ORM\Column]
    private ?float $prix = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\OneToMany(mappedBy: 'zoneLivraisonPreferentielle', targetEntity: User::class)]
    private Collection $users;

    #[ORM\OneToMany(mappedBy: 'zoneLivraisonPreferentielle', targetEntity: Client::class)]
    private Collection $clients;

    #[ORM\OneToMany(mappedBy: 'zoneLivraisonPreferentielle', targetEntity: Achat::class)]
    private Collection $achats;

    public function __toString()
    {
        return $this->zone."-> Coût : ".$this->prix;
    }

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->clients = new ArrayCollection();
        $this->achats = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getZone(): ?string
    {
        return $this->zone;
    }

    public function setZone(string $zone): self
    {
        $this->zone = $zone;

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

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

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
            $client->setZoneLivraisonPreferentielle($this);
        }

        return $this;
    }

    public function removeClient(Client $client): self
    {
        if ($this->clients->removeElement($client)) {
            // set the owning side to null (unless already changed)
            if ($client->getZoneLivraisonPreferentielle() === $this) {
                $client->setZoneLivraisonPreferentielle(null);
            }
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
}
