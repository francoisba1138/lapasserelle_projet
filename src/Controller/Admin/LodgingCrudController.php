<?php

namespace App\Controller\Admin;

use App\Entity\Lodging;
use App\Entity\User;
use App\Entity\Address;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
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
            yield AssociationField ::new('host');
            yield AssociationField::new('address');
          
            // return [
            //     'title',
            //     'description',
            //     'host_id',
            //     'address_id',

            // ];

    

    }
    
}
