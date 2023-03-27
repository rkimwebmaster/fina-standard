<?php

namespace App\Entity;

use App\Repository\EntrepriseRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EntrepriseRepository::class)]
class Entreprise
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomEntreprise = null;

    #[ORM\Column(length: 255)]
    private ?string $slogan = null;
	
	
    #[ORM\Column(length: 255)]
    private ?string $idnat = null;

    #[ORM\Column(length: 255)]
    private ?string $rccm = null;

    #[ORM\Column(length: 255)]
    private ?string $sigle = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $logo = null;
	
	
    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $responsable = null;

    #[ORM\Column(length: 14)]
    private ?string $phoneNumber = null;
	
    #[ORM\Column(length: 255)]
    private ?string $email = null;
	
	
    #[ORM\Column(length: 255)]
    private ?string $website = null;

    #[ORM\Column(length: 14)]
    private ?string $whatsappNumber = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $facebook = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $linkedIn = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $twitter = null;


    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\Column(length: 255)]
    private ?string $ville = null;

    #[ORM\Column(length: 255)]
    private ?string $pays = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $newsbg389x454 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $menuBanner295x320Premier = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $menuBanner295x320Deuxieme = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $menuBanner295x320Troisieme = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $mainBanner1903x650Un = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $mainBanner1903x650Deux = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEntreprise(): ?string
    {
        return $this->nomEntreprise;
    }

    public function setNomEntreprise(string $nomEntreprise): self
    {
        $this->nomEntreprise = $nomEntreprise;

        return $this;
    }

    public function getSlogan(): ?string
    {
        return $this->slogan;
    }

    public function setSlogan(string $slogan): self
    {
        $this->slogan = $slogan;

        return $this;
    }

    public function getIdnat(): ?string
    {
        return $this->idnat;
    }

    public function setIdnat(string $idnat): self
    {
        $this->idnat = $idnat;

        return $this;
    }

    public function getRccm(): ?string
    {
        return $this->rccm;
    }

    public function setRccm(string $rccm): self
    {
        $this->rccm = $rccm;

        return $this;
    }

    public function getSigle(): ?string
    {
        return $this->sigle;
    }

    public function setSigle(string $sigle): self
    {
        $this->sigle = $sigle;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(?string $logo): self
    {
        $this->logo = $logo;

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

    public function getResponsable(): ?string
    {
        return $this->responsable;
    }

    public function setResponsable(string $responsable): self
    {
        $this->responsable = $responsable;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(string $website): self
    {
        $this->website = $website;

        return $this;
    }

    public function getWhatsappNumber(): ?string
    {
        return $this->whatsappNumber;
    }

    public function setWhatsappNumber(string $whatsappNumber): self
    {
        $this->whatsappNumber = $whatsappNumber;

        return $this;
    }

    public function getFacebook(): ?string
    {
        return $this->facebook;
    }

    public function setFacebook(?string $facebook): self
    {
        $this->facebook = $facebook;

        return $this;
    }

    public function getLinkedIn(): ?string
    {
        return $this->linkedIn;
    }

    public function setLinkedIn(?string $linkedIn): self
    {
        $this->linkedIn = $linkedIn;

        return $this;
    }

    public function getTwitter(): ?string
    {
        return $this->twitter;
    }

    public function setTwitter(?string $twitter): self
    {
        $this->twitter = $twitter;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): self
    {
        $this->pays = $pays;

        return $this;
    }

    public function getNewsbg389x454(): ?string
    {
        return $this->newsbg389x454;
    }

    public function setNewsbg389x454(?string $newsbg389x454): self
    {
        $this->newsbg389x454 = $newsbg389x454;

        return $this;
    }

    public function getMenuBanner295x320Premier(): ?string
    {
        return $this->menuBanner295x320Premier;
    }

    public function setMenuBanner295x320Premier(?string $menuBanner295x320Premier): self
    {
        $this->menuBanner295x320Premier = $menuBanner295x320Premier;

        return $this;
    }

    public function getMenuBanner295x320Deuxieme(): ?string
    {
        return $this->menuBanner295x320Deuxieme;
    }

    public function setMenuBanner295x320Deuxieme(?string $menuBanner295x320Deuxieme): self
    {
        $this->menuBanner295x320Deuxieme = $menuBanner295x320Deuxieme;

        return $this;
    }

    public function getMenuBanner295x320Troisieme(): ?string
    {
        return $this->menuBanner295x320Troisieme;
    }

    public function setMenuBanner295x320Troisieme(?string $menuBanner295x320Troisieme): self
    {
        $this->menuBanner295x320Troisieme = $menuBanner295x320Troisieme;

        return $this;
    }

    public function getMainBanner1903x650Un(): ?string
    {
        return $this->mainBanner1903x650Un;
    }

    public function setMainBanner1903x650Un(?string $mainBanner1903x650Un): self
    {
        $this->mainBanner1903x650Un = $mainBanner1903x650Un;

        return $this;
    }

    public function getMainBanner1903x650Deux(): ?string
    {
        return $this->mainBanner1903x650Deux;
    }

    public function setMainBanner1903x650Deux(?string $mainBanner1903x650Deux): self
    {
        $this->mainBanner1903x650Deux = $mainBanner1903x650Deux;

        return $this;
    }

}
