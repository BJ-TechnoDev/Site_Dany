<?php

namespace App\Controller\Admin;

use App\Entity\Tableau;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TableauCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Tableau::class;
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
