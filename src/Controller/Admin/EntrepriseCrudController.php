<?php

namespace App\Controller\Admin;

use App\Entity\Adresse;
use App\Entity\Entreprise;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CountryField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class EntrepriseCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Entreprise::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('nomEntreprise')->hideOnIndex()->setColumns(6),
            TextField::new('sigle')->setColumns(6),
            TextField::new('slogan')->hideOnIndex()->setColumns(6),
            ImageField::new('logo')->setBasePath('uploads/images/produits/')->setUploadDir('public/uploads/images/produits/')->setColumns(6),
            TextField::new('description')->hideOnIndex()->setColumns(6),
            TextField::new('responsable')->hideOnIndex()->setColumns(6),
            TextField::new('phoneNumber')->setColumns(6),
            TextField::new('email')->setColumns(6),
            TextField::new('website')->hideOnIndex()->setColumns(6),
            TextField::new('whatsappNumber')->hideOnIndex()->setColumns(6),
            TextField::new('facebook')->hideOnIndex()->setColumns(6),
            TextField::new('linkedIn')->hideOnIndex()->setColumns(6),
            TextField::new('twitter')->hideOnIndex()->setColumns(6),
            TextField::new('idnat')->hideOnIndex()->setColumns(6),
            TextField::new('rccm')->hideOnIndex()->setColumns(6),
            TextField::new('adresse')->hideOnIndex()->setColumns(6),
            TextField::new('ville')->hideOnIndex()->setColumns(6),
            CountryField::new('pays')->setColumns(6),
            ImageField::new('newsbg389x454')->setBasePath('uploads/images/produits/')->setUploadDir('public/uploads/images/produits/')->setColumns(6),
            ImageField::new('menuBanner295x320Premier')->setBasePath('uploads/images/produits/')->setUploadDir('public/uploads/images/produits/')->setColumns(6),
            ImageField::new('menuBanner295x320Deuxieme')->setBasePath('uploads/images/produits/')->setUploadDir('public/uploads/images/produits/')->setColumns(6),
            ImageField::new('menuBanner295x320Troisieme')->setBasePath('uploads/images/produits/')->setUploadDir('public/uploads/images/produits/')->setColumns(6),
            ImageField::new('mainBanner1903x650Un')->setBasePath('uploads/images/produits/')->setUploadDir('public/uploads/images/produits/')->setColumns(6),
            ImageField::new('mainBanner1903x650Deux')->setBasePath('uploads/images/produits/')->setUploadDir('public/uploads/images/produits/')->setColumns(6),
            // AssociationField::new('adresse')->renderAsEmbeddedForm(AdresseCrudController::class),

        ];
    }
    
}
