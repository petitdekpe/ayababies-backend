<?php

namespace App\Controller\Admin;

use App\Entity\Gift;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class GiftCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Gift::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
