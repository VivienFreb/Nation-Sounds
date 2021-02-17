<?php

namespace App\Controller\Admin;

use App\Entity\Festival;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;

class FestivalCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Festival::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('Nom', 'Nom'),
            DateTimeField::new('DateDebut', 'Date et heure début'),
            DateTimeField::new('DateFin', 'Date et heure fin'),
            TextField::new('Adresse', 'Adresse'),
            UrlField::new('Facebook', 'Facebook'),
            UrlField::new('Instagram', 'Instagram'),
            UrlField::new('Twitter', 'Twitter'),
        ];
    }
}
