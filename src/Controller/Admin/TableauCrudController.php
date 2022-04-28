<?php

namespace App\Controller\Admin;

use App\Entity\Decoration;
use App\Entity\Tableau;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\RedirectResponse;

class TableauCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Tableau::class;
    }


    public function configureFields(string $pageName): iterable
    {

        yield TextField::new('titre');
        if ($pageName === Crud::PAGE_NEW){
            yield ImageField::new('image', 'Image')
                ->setUploadedFileNamePattern('[slug]-[contenthash].[extension]')
                ->setUploadDir('public/uploads/images/tableau')
                ->setBasePath('uploads/images/tableau')->setRequired(true);
        }else{
            yield ImageField::new('image', 'Image')
                ->setUploadedFileNamePattern('[slug]-[contenthash].[extension]')
                ->setUploadDir('public/uploads/images/tableau')
                ->setBasePath('uploads/images/tableau');
        }

    }

    /**
     * @param AdminContext $context
     * @param string $action
     * @return RedirectResponse
     */
    protected function getRedirectResponseAfterSave(AdminContext $context, string $action): RedirectResponse
    {
        /**
         * @var $entityInstance Tableau
         */
        $entityInstance = $context->getEntity()->getInstance();

        $image = $entityInstance->getImage();
        if (!isset($image)){
            $adminurlgenerator = $this->get(AdminUrlGenerator::class);
            $this->addFlash('warning', 'merci de mettre une image');
            return $this->redirect($adminurlgenerator->setController(TableauCrudController::class)->setAction('edit')->setEntityId($entityInstance->getId())->generateUrl());
        }
        return parent::getRedirectResponseAfterSave($context, $action);
    }

}
