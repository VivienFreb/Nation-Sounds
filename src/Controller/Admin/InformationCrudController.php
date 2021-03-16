<?php

namespace App\Controller\Admin;

use App\Entity\Information;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class InformationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Information::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('Nom', 'Nom'),
            TextField::new('NomEN', 'Nom Anglais'),
            TextEditorField::new('Contenu', 'Contenu'),
            TextEditorField::new('ContenuEN', 'Contenu Anglais'),
            ChoiceField::new('Type', 'Type')->setChoices([
                'Information' => 'Information',
                'Urgent' => 'Urgent'
            ]),
            DateField::new('DateEmission', 'Date et heure fin'),
            AssociationField::new('Festival', 'Festival concerné'),
        ];
    }

}
