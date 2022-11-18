<?php

namespace App\Controller\Admin;

use App\Entity\Baby;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CountryField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;

class BabyCrudController extends AbstractCrudController
{
    public const BABY_BASE_PATH = 'upload/images/baby';
    public const BABY_UPLOAD_DIR = 'public/upload/images/baby';
    public static function getEntityFqcn(): string
    {
        return Baby::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            ImageField::new('photo')
                ->setBasePath(self::BABY_BASE_PATH)
                ->setUploadDir(self::BABY_UPLOAD_DIR),
            TextField::new('name', 'Prénom du Bébé'),
            ChoiceField::new('sexe')->setChoices(['Masculin' => 'M', 'Feminin' => 'F'])->renderExpanded(),
            DateField::new('birthday', 'Date de naissance'),
            TextField::new('town', 'Ville'),
            CountryField::new('country', 'Pays'),
            AssociationField::new('Competition', 'Concours')->hideOnForm(),

        ];
    }
}
