<?php

namespace App\Controller\Admin;

use App\Entity\Lodging;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use IntlChar;

class LodgingCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Lodging::class;
    }

   
    public function configureFields(string $pageName): iterable
    {
        /* return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];*/

        
            yield TextField::new('title');
            yield TextField::new('description');
            yield IdField::new('host');
            yield IdField::new('address');
          


    

    }
    
}
