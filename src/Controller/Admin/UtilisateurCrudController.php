<?php

namespace App\Controller\Admin;

use App\Entity\Utilisateur;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\DomCrawler\Field\InputFormField;
use Symfony\Component\Validator\Constraints\Date;

class UtilisateurCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Utilisateur::class;
    }

    public function configureFields(string $pageName): iterable
    {
//        $roles = $this->getParameter('security.role_hierarchy.roles');
//
//        echo "<pre>";
//        var_dump($roles);
//        echo "</pre>";
//
//        $roles = [
//            'Administateur' => 'ROLE_ADMIN',
//            'Utilisateur' => 'ROLE_USER'
//        ];
//
//        echo "<pre>";
//        var_dump($roles);
//        echo "</pre>";

        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('Nom', 'Nom'),
            TextField::new('Prenom', 'Prénom'),
            DateField::new('DateDeNaissance', 'Date de naissance'),
//            ChoiceField::new('Role', 'Rôle de l\'utilisateur')->setChoices([$roles]),
            EmailField::new('Mail', 'Mail'),
            TelephoneField::new('Telephone', 'Téléphone'),
            TextField::new('Password', 'Mot de passe'),
            ];
    }
}
