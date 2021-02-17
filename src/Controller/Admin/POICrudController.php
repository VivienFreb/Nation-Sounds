<?php

namespace App\Controller\Admin;

use App\Entity\POI;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\LocaleField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;

class POICrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return POI::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('Nom', 'Nom du point'),
            TextEditorField::new('Description', 'Description'),
            ArrayField::new('Coordonnees', 'Coordonnées'),
            AssociationField::new('festival', 'Festival concerné')->autocomplete(),
            UrlField::new('lien', 'Lien site web'),
        ];
    }

}
