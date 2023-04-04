<?php

namespace App\Controller\Admin;

use App\Entity\TeamMember;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class TeamMemberCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TeamMember::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('noms')->setColumns(4)->setLabel("Nom complet du teamMember")->setHelp("ex: Idris Kasongo Banza"),
            TextField::new('fonction')->setColumns(4),
            TextField::new('description')->setColumns(4)->setLabel("Description "),
            ImageField::new('photoCouleur390x390')->setBasePath('uploads/images/')->setUploadDir('public/uploads/images/')->setColumns(6)->setLabel("Image à la dimension 390 x 390 ")->setHelp("Le plus léger possible (moins de 50 ko)"),
            ImageField::new('photoNoirBlanc390x390')->setBasePath('uploads/images/')->setUploadDir('public/uploads/images/')->setColumns(6)->setLabel("Image à la dimension 390 x 390 ")->setHelp("Le plus léger possible (moins de 50 ko)"),
            TextField::new('facebook')->setColumns(3),
            TextField::new('twitter')->setColumns(3),
            TextField::new('dribble')->setColumns(3),
            TextField::new('pinterest')->setColumns(3),
            // TextField::new('behance'),
        ];
    }
    
}
