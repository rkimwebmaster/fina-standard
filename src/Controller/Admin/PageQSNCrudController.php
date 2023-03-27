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
            ImageField::new('photo1170x500')->setBasePath('uploads/images/produits/')->setUploadDir('public/uploads/images/produits/'),
            TextEditorField::new('contenu'),
            DateTimeField::new('createdAt')->hideOnForm(),
            DateTimeField::new('updatedAt')->hideOnForm(),
        ];
    }

}
