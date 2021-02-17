<?php

namespace App\Controller\Admin;

use App\Entity\Artiste;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ArtisteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Artiste::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('NomDeScene', 'Nom de scène'),
            TextField::new('StyleMusique', 'Style de musique'),
            TextEditorField::new('Description', 'Description'),
        ];
    }

}
