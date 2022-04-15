<?php

namespace App\Controller\Admin;

use App\Entity\Decoration;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DecorationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Decoration::class;
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
