<?php

namespace App\Controller\Admin;

use App\Entity\ZoneLivraison;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ZoneLivraisonCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ZoneLivraison::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('zone')->setColumns(6),
            TextField::new('estimationUn')->setColumns(3),
            TextField::new('estimationDeux')->setColumns(3),
            TextEditorField::new('description')->setColumns(12),
        ];
    }

}
