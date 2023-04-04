<?php

namespace App\Controller\Admin;

use App\Entity\Produit;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ColorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;

class ProduitCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Produit::class;
    }

    
    public function configureFields(string $pageName): iterable
    {

        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('nom')->setColumns(4),
            AssociationField::new('categorie')->setColumns(4),
            MoneyField::new('prixVente')->setCurrency("USD")->setColumns(4),
            TextField::new('code')->hideOnForm(),
            ImageField::new('photo624x800Premier')->setBasePath('uploads/images/produits/')->setUploadDir('public/uploads/images/produits/')->setColumns(4),
            ImageField::new('photo624x800Deuxieme')->setBasePath('uploads/images/produits/')->setUploadDir('public/uploads/images/produits/')->hideOnIndex()->setColumns(4),
            UrlField::new('urlVideoYoutube')->hideOnIndex()->setColumns(4),
            TextEditorField::new('description')->hideOnIndex()->setColumns(12),
            BooleanField::new('isArrivage')->onlyOnForms()->setColumns(12),
            ColorField::new('couleur')->hideOnIndex()->setColumns(12),
            CollectionField::new('photos')->useEntryCrudForm(PhotoCrudController::class)->hideOnIndex()->setColumns(12),


        ];
    }
    
}
