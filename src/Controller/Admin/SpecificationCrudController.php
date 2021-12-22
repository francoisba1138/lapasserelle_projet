<?php

namespace App\Controller\Admin;

use App\Entity\Specification;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class SpecificationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Specification::class;
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
