<?php

namespace App\Controller\Admin;

use App\Entity\Partenaire;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PartenaireCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Partenaire::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('nom')->setColumns(6)->setLabel("Nom du partenaire"),
            ImageField::new('logo215x140')->setBasePath('uploads/images/partenaires/')->setUploadDir('public/uploads/images/partenaires/')->setColumns(6)->setLabel("Image à la dimension 215x140")->setHelp("Le plus léger possible (moins de 50 ko)"),
            TextEditorField::new('description')->setColumns(12)->setLabel("Texte descriptif du partenaire"),
        ];
    }
    
}
