<?php

namespace App\Controller\Admin;

use App\Entity\ZoneProduit;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ZoneProduitCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ZoneProduit::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('produit')->setColumns(4),
            AssociationField::new('zoneLivraison')->setColumns(4),
            MoneyField::new('montant')->setCurrency("USD")->setColumns(4),
        ];
    }
    
}
