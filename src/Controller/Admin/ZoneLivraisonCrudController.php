<?php

namespace App\Controller\Admin;

use App\Entity\ZoneLivraison;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ZoneLivraisonCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ZoneLivraison::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
