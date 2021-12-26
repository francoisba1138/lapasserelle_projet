<?php

namespace App\Controller\Admin;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;

use App\Entity\Specification;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class SpecificationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Specification::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title'),
            TextField::new('label'),
            ImageField::new('icon')->setUploadDir('public/img/icons')->setBasePath('img/icons'),
            TextField::new('type')
  
        ];
    }
    
}
