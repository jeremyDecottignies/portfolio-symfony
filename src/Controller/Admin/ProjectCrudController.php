<?php

namespace App\Controller\Admin;

use App\Entity\Project;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
// use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;

class ProjectCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Project::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('nom'),
            TextEditorField::new('courteDescription'),
            TextEditorField::new('description'),
            ArrayField::new('technologies'),
            TextField::new('gitUrl'),
            // DateTimeField::new('createdAt')->hideOnForm(),

            ImageField::new('image')
                ->setBasePath('uploads/images/projects')                 // URL publique
                ->setUploadDir('public/uploads/images/projects')         // dossier sur le disque
                ->setUploadedFileNamePattern('[slug]-[timestamp].[extension]')
                ->setRequired(false),
        ];
    }
}
