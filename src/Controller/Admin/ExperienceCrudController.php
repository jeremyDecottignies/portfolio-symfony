<?php

namespace App\Controller\Admin;

use App\Entity\Experience;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ExperienceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Experience::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('titre', 'Titre'),
            TextField::new('entreprise', 'Entreprise'),
            TextField::new('lieu', 'Lieu'),
            TextField::new('type', 'Type'), // Stage / Alternance / Projet perso
            DateField::new('dateDebut', 'Début'),
            DateField::new('dateFin', 'Fin')->setRequired(false),
            TextEditorField::new('description', 'Description'),
        ];
    }
}
