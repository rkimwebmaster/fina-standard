<?php

namespace App\Controller\Admin;

use App\Entity\Categorie;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CategorieCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Categorie::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('designation')->setColumns(6),
            ImageField::new('photo1170x500')->setBasePath('uploads/images/')->setUploadDir('public/uploads/images/')->setColumns(6)->setLabel("Image au fomat 1170 x 500 ")->setHelp("Le poids le plus léger possible, plus ou moins de  50 Ko"),
            TextEditorField::new('description')->setColumns(12),
            DateTimeField::new('createdAt')->hideOnForm(),
            DateTimeField::new('updatedAt')->hideOnForm(),
        ];
    }
    

    // public function BeforeEntityPersistedEvent
}
