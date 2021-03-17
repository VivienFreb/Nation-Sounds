<?php

namespace App\Controller\Admin;

use App\Entity\Blog;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class BlogCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Blog::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('Titre', 'Titre'),
            TextField::new('TitreEN', 'Titre Anglais'),
            TextEditorField::new('Contenu', 'Contenu'),
            TextEditorField::new('ContenuEN', 'Contenu Anglais'),
            DateField::new('DatePublication', 'Date de publication'),
        ];
    }

}
