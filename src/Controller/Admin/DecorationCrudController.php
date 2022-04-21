<?php

namespace App\Controller\Admin;

use App\Entity\Decoration;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class DecorationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Decoration::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('titre'),
            ImageField::new('image', 'Image')
                ->setUploadDir('assets/images')
                ->setBasePath('/build')
        ];
    }

}