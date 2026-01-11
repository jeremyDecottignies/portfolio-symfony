<?php

namespace App\Controller\Admin;

use App\Entity\Education;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class EducationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Education::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('intitule', 'Intitulé'),
            TextField::new('etablissement', 'Établissement'),
            TextField::new('lieu', 'Lieu'),
            TextField::new('niveau', 'Niveau'),
            DateField::new('dateDebut', 'Début'),
            DateField::new('dateFin', 'Fin')->setRequired(false),
            TextEditorField::new('description', 'Description')->onlyOnForms(),
        ];
    }
}
