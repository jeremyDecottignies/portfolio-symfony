<?php

namespace App\Controller\Admin;

use App\Entity\Project;
use App\Entity\ProjectImage;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FileField;

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

            ImageField::new('image')
                ->setBasePath('uploads/images/projects')
                ->setUploadDir('public/uploads/images/projects')
                ->setUploadedFileNamePattern('[slug]-[timestamp].[extension]')
                ->setRequired(false)
                ->setHelp('Image principale du projet'),

            ChoiceField::new('displayMode')
                ->setLabel('Mode d\'affichage des images')
                ->setChoices([
                    'Grille (toutes visibles)' => 'grid',
                    'Avant / Après côte à côte' => 'comparison',
                ])
                ->setRequired(false)
                ->setHelp('Choisir comment afficher les images du projet'),

            AssociationField::new('competences')
                ->setLabel('Compétences BTS SIO')
                ->setRequired(false),

            FileField::new('pdffile')
                ->setLabel('Fichier PDF')
                ->setUploadDir('public/uploads/pdf/projects')
                ->setBasePath('uploads/pdf/projects')
                ->setUploadedFileNamePattern('[slug]-[timestamp].[extension]')
                ->setRequired(false),
        ];
    }
}
