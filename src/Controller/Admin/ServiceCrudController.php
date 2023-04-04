<?php

namespace App\Controller\Admin;

use App\Entity\Service;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ServiceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Service::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('designation')->setColumns(6)->setLabel("Nom du service "),
            ImageField::new('photo1170x500')->setBasePath('uploads/images/produits/')->setUploadDir('public/uploads/images/produits/')->setColumns(6)->setLabel("Image de la page du service ")->setHelp("Avec une taille 1170 x 500 et le plus léger possible"),
            TextEditorField::new('description')->setColumns(12),
        ];
    }
    
}
