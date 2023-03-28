<?php

namespace App\EventSubscriber;

use App\Repository\CategorieRepository;
use App\Repository\EntrepriseRepository;
use App\Repository\PartenaireRepository;
use App\Repository\ProduitRepository;
use App\Repository\ServiceRepository;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Twig\Environment;

class TwigEventSubscriber implements EventSubscriberInterface
{
    
    public function __construct(
        private Environment $twig,
        private PartenaireRepository $partenaireRepository,
        private EntrepriseRepository $entrepriseRepository, 
        private ServiceRepository $serviceRepository, 
        private ProduitRepository $produitRepository, 
        private CategorieRepository $categorieRepository)
    {
        
    }
    public function onKernelController(ControllerEvent $event)
    {
        $this->twig->addGlobal('entreprise', $this->entrepriseRepository->findOneBy([]));
        $this->twig->addGlobal('services', $this->serviceRepository->findAll([]));
        $this->twig->addGlobal('categories', $this->categorieRepository->findAll([]));
        $this->twig->addGlobal('partenaires', $this->partenaireRepository->findAll([]));
        $this->twig->addGlobal('produits', $this->produitRepository->findAll([]));
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::CONTROLLER => 'onKernelController',
        ];
    }
}
