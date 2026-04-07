<?php

namespace App\Controller\Admin;

use App\Entity\ExperienceImage;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;

class ExperienceImageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ExperienceImage::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('experience')->setLabel('Expérience'),
            ImageField::new('filename')
                ->setLabel('Image')
                ->setBasePath('uploads/images/experiences')
                ->setUploadDir('public/uploads/images/experiences')
                ->setUploadedFileNamePattern('[slug]-[timestamp].[extension]')
                ->setRequired(true),
        ];
    }
}
