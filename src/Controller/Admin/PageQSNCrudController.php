<?php

namespace App\Controller\Admin;

use App\Entity\PageQSN;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;

class PageQSNCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PageQSN::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            ImageField::new('photo1170x500')->setBasePath('uploads/images/produits/')->setUploadDir('public/uploads/images/produits/')->setColumns(12)->setLabel("Image au fomat 1170 x 500 ")->setHelp("Le poids le plus léger possible, moins de 50 Ko"),
            TextEditorField::new('contenu')->setColumns(12),
            DateTimeField::new('createdAt')->hideOnForm(),
            DateTimeField::new('updatedAt')->hideOnForm(),
        ];
    }

}
