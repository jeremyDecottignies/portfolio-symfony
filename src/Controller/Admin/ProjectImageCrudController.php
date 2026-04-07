<?php

namespace App\Controller\Admin;

use App\Entity\ProjectImage;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;

class ProjectImageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ProjectImage::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('project')->setLabel('Projet'),
            ImageField::new('filename')
                ->setLabel('Image')
                ->setBasePath('uploads/images/projects')
                ->setUploadDir('public/uploads/images/projects')
                ->setUploadedFileNamePattern('[slug]-[timestamp].[extension]')
                ->setRequired(true),
        ];
    }
}
