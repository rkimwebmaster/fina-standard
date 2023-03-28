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
            TextField::new('nomEntreprise')->hideOnIndex(),
            TextField::new('sigle'),
            TextField::new('slogan')->hideOnIndex(),
            ImageField::new('logo')->setBasePath('uploads/images/produits/')->setUploadDir('public/uploads/images/produits/'),
            // DateTimeField::new('createdAt')->hideOnForm(),
            // DateTimeField::new('updatedAt')->hideOnForm(),
            TextField::new('description')->hideOnIndex(),
            TextField::new('responsable')->hideOnIndex(),
            TextField::new('phoneNumber'),
            TextField::new('email'),
            TextField::new('website')->hideOnIndex(),
            TextField::new('whatsappNumber')->hideOnIndex(),
            TextField::new('facebook')->hideOnIndex(),
            TextField::new('linkedIn')->hideOnIndex(),
            TextField::new('twitter')->hideOnIndex(),
            TextField::new('idnat')->hideOnIndex(),
            TextField::new('rccm')->hideOnIndex(),
            TextField::new('adresse')->hideOnIndex(),
            TextField::new('ville')->hideOnIndex(),
            CountryField::new('pays'),
            // TextField::new('description'),
            // TextField::new('description'),
            // TextField::new('websiteEntreprise')->hideOnIndex(),
            // TextField::new('description')->hideOnIndex(),
            // TextField::new('responsable')->hideOnIndex(),
            ImageField::new('newsbg389x454')->setBasePath('uploads/images/produits/')->setUploadDir('public/uploads/images/produits/'),
            ImageField::new('menuBanner295x320Premier')->setBasePath('uploads/images/produits/')->setUploadDir('public/uploads/images/produits/'),
            ImageField::new('menuBanner295x320Deuxieme')->setBasePath('uploads/images/produits/')->setUploadDir('public/uploads/images/produits/'),
            ImageField::new('menuBanner295x320Troisieme')->setBasePath('uploads/images/produits/')->setUploadDir('public/uploads/images/produits/'),
            ImageField::new('mainBanner1903x650Un')->setBasePath('uploads/images/produits/')->setUploadDir('public/uploads/images/produits/'),
            ImageField::new('mainBanner1903x650Deux')->setBasePath('uploads/images/produits/')->setUploadDir('public/uploads/images/produits/'),
            // AssociationField::new('adresse')->renderAsEmbeddedForm(AdresseCrudController::class),

        ];
    }
    
}
