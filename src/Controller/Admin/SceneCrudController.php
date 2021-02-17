<?php

namespace App\Controller\Admin;

use App\Entity\Scene;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SceneCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Scene::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('Nom', 'Nom de la scène'),
            IntegerField::new('nbplaces', 'Nombre de places'),
            TextField::new('Emplacement', 'Emplacement scène'),
            AssociationField::new('Festival', 'Festival correspondant')->autocomplete(),
        ];
    }

}
