<?php

namespace App\Entity;

use App\Repository\ZoneProduitRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ZoneProduitRepository::class)]
class ZoneProduit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'zoneProduits')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Produit $produit = null;

    #[ORM\ManyToOne(inversedBy: 'zoneProduits')]
    #[ORM\JoinColumn(nullable: false)]
    private ?ZoneLivraison $zoneLivraison = null;

    #[ORM\Column]
    private ?float $montant = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProduit(): ?Produit
    {
        return $this->produit;
    }

    public function setProduit(?Produit $produit): self
    {
        $this->produit = $produit;

        return $this;
    }

    public function getZoneLivraison(): ?ZoneLivraison
    {
        return $this->zoneLivraison;
    }

    public function setZoneLivraison(?ZoneLivraison $zoneLivraison): self
    {
        $this->zoneLivraison = $zoneLivraison;

        return $this;
    }

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(float $montant): self
    {
        $this->montant = $montant;

        return $this;
    }
}
