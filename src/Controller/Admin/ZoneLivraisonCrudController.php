<?php

namespace App\Controller\Admin;

use App\Entity\ZoneLivraison;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
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
            TextField::new('zone')->setLabel("Nom de la zone ")->setColumns(6)->setHelp("ex: Lubumbashi, Kipushi, Mbadanka "),
            IntegerField::new('estimationUn')->setColumns(3)->setLabel("Nombre des jours minimal"),
            IntegerField::new('estimationDeux')->setColumns(3)->setLabel("Nombre des jours maximal"),
            TextEditorField::new('description')->setColumns(12),
        ];
    }

}
