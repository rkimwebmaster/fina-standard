<?php

namespace App\Controller\Admin;

use App\Entity\Achat;
use App\Entity\Annulation;
use App\Entity\Categorie;
use App\Entity\Client;
use App\Entity\Contact;
use App\Entity\Entreprise;
use App\Entity\NewsLetter;
use App\Entity\PageLivraison;
use App\Entity\PagePolicy;
use App\Entity\PageQSN;
use App\Entity\Partenaire;
use App\Entity\Photo;
use App\Entity\Produit;
use App\Entity\Recherche;
use App\Entity\Service;
use App\Entity\TeamMember;
use App\Entity\User;
use App\Entity\ZoneLivraison;
use App\Entity\ZoneProduit;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{

    public function __construct(private AdminURLGenerator $adminURL)
    {
    }
    #[Route('/admin', name: 'app_admin')]
    public function index(): Response
    {
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);

        return $this->render('admin/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('<img src="images/finacon.png"> Fina Dashboard <span class="text-small">Fina sarl</span>')
            ->setFaviconPath('images/finacon.png')
            ->renderContentMaximized()
            ->generateRelativeUrls(true)
            ->setLocales(['en', 'fr'])
            ->setLocales([
                'en' => '🇬🇧 Anglais british',
                'fr' => ' Français'
            ])
            ->generateRelativeUrls(true)
            ->setTitle('DashBoard FINA sarl');
    }

    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::linkToRoute('FINA SITE WEB', 'fas fa-home', 'app_accueil'),
            MenuItem::section('Configuration', 'fa fa-cog'),
            MenuItem::subMenu('Entreprise')->setSubItems([
                MenuItem::linkToCrud('Liste ', 'fa fa-list-ul', Entreprise::class)->setAction(Crud::PAGE_INDEX),
                MenuItem::linkToCrud('Nouveau', 'fa fa-plus-circle', Entreprise::class)->setAction(Crud::PAGE_NEW),

            ]),
            MenuItem::subMenu('Zones de Livraison')->setSubItems([
                MenuItem::linkToCrud('Liste ', 'fa fa-list-ul', ZoneLivraison::class)->setAction(Crud::PAGE_INDEX),
                MenuItem::linkToCrud('Nouveau', 'fa fa-plus-circle', ZoneLivraison::class)->setAction(Crud::PAGE_NEW),

            ]),
            MenuItem::subMenu('Categories')->setSubItems([
                MenuItem::linkToCrud('Liste ', 'fa fa-list-ul', Categorie::class)->setAction(Crud::PAGE_INDEX),
                MenuItem::linkToCrud('Nouveau', 'fa fa-plus-circle', Categorie::class)->setAction(Crud::PAGE_NEW),

            ]),
            MenuItem::subMenu('Produits')->setSubItems([
                MenuItem::linkToCrud('Liste ', 'fa fa-list-ul', Produit::class)->setAction(Crud::PAGE_INDEX),
                MenuItem::linkToCrud('Nouveau', 'fa fa-plus-circle', Produit::class)->setAction(Crud::PAGE_NEW),

            ]),
            // MenuItem::subMenu('Zone produit')->setSubItems([
            //     MenuItem::linkToCrud('Liste ', 'fa fa-list-ul', ZoneProduit::class)->setAction(Crud::PAGE_INDEX),
            //     MenuItem::linkToCrud('Nouveau', 'fa fa-plus-circle', ZoneProduit::class)->setAction(Crud::PAGE_NEW),

            // ]),
            MenuItem::subMenu('Page Qui Sommes-nous')->setSubItems([
                MenuItem::linkToCrud('Liste ', 'fa fa-list-ul', PageQSN::class)->setAction(Crud::PAGE_INDEX),
                MenuItem::linkToCrud('Nouveau', 'fa fa-plus-circle', PageQSN::class)->setAction(Crud::PAGE_NEW),

            ]),
            MenuItem::subMenu('Page Livraison')->setSubItems([
                MenuItem::linkToCrud('Liste ', 'fa fa-list-ul', PageLivraison::class)->setAction(Crud::PAGE_INDEX),
                MenuItem::linkToCrud('Nouveau', 'fa fa-plus-circle', PageLivraison::class)->setAction(Crud::PAGE_NEW),

            ]),
            MenuItem::subMenu('Page Policy')->setSubItems([
                MenuItem::linkToCrud('Liste ', 'fa fa-list-ul', PagePolicy::class)->setAction(Crud::PAGE_INDEX),
                MenuItem::linkToCrud('Nouveau', 'fa fa-plus-circle', PagePolicy::class)->setAction(Crud::PAGE_NEW),

            ]),
            MenuItem::subMenu('Partenaires ')->setSubItems([
                MenuItem::linkToCrud('Liste ', 'fa fa-list-ul', Partenaire::class)->setAction(Crud::PAGE_INDEX),
                MenuItem::linkToCrud('Nouveau', 'fa fa-plus-circle', Partenaire::class)->setAction(Crud::PAGE_NEW),

            ]),
            MenuItem::subMenu('Membres équipe dirigeante')->setSubItems([
                MenuItem::linkToCrud('Liste ', 'fa fa-list-ul', TeamMember::class)->setAction(Crud::PAGE_INDEX),
                MenuItem::linkToCrud('Nouveau', 'fa fa-plus-circle', TeamMember::class)->setAction(Crud::PAGE_NEW),

            ]),
            MenuItem::subMenu('Services')->setSubItems([
                MenuItem::linkToCrud('Liste ', 'fa fa-list-ul', Service::class)->setAction(Crud::PAGE_INDEX),
                MenuItem::linkToCrud('Nouveau', 'fa fa-plus-circle', Service::class)->setAction(Crud::PAGE_NEW),

            ]),
            MenuItem::section('Utilisateurs ADMIN ', 'fa fa-users'),
            MenuItem::subMenu('Utilisateurs')->setSubItems([
                MenuItem::linkToCrud('Liste de tous les utilisateurs', 'fa fa-list-ul', User::class)->setAction(Crud::PAGE_INDEX),
                MenuItem::linkToCrud('Nouveau ADMIN ', 'fa fa-plus-circle', User::class)->setAction(Crud::PAGE_NEW),

            ]),
            MenuItem::section('Métiers', 'fa fa-search-plus'),
            // MenuItem::subMenu('Liste des éléments ')->setSubItems([
            MenuItem::linkToCrud('Achats', 'fa fa-list-ul', Achat::class),
            MenuItem::linkToCrud('Zone de produit', 'fa fa-list-ul', ZoneProduit::class),
            // MenuItem::linkToCrud('Annulations', 'fa fa-list-ul', Annulation::class),
            MenuItem::linkToCrud('NewsLetters ', 'fa fa-list-ul', NewsLetter::class),
            MenuItem::linkToCrud('Contacts', 'fa fa-list-ul', Contact::class),
            MenuItem::linkToCrud('Clients', 'fa fa-list-ul', Client::class),
            MenuItem::linkToCrud('Recherches ', 'fa fa-list-ul', Recherche::class),

            // ]),
            // MenuItem::section('Statistiques'),
            // MenuItem::linkToCrud('Achats', 'fa fa-list-ul', Achat::class),
            // MenuItem::linkToCrud('Annualtion', 'fa fa-list-ul', Annulation::class),

            // MenuItem::linkToCrud('Blog Posts', 'fa fa-file-text', BlogPost::class),

        ];
    }
}
