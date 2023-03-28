<?php

namespace App\Entity;

use App\Repository\ZoneLivraisonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ZoneLivraisonRepository::class)]
class ZoneLivraison
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
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

    public function __toString()
    {
        return $this->zone."-> Coût : ".$this->prix;
    }

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->clients = new ArrayCollection();
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

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users->add($user);
            $user->setZoneLivraisonPreferentielle($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getZoneLivraisonPreferentielle() === $this) {
                $user->setZoneLivraisonPreferentielle(null);
            }
        }

        return $this;
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
}
