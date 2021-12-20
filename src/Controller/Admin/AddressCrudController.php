<?php

namespace App\Controller\Admin;

use App\Entity\Address;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class AddressCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Address::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            
            TextField::new('address', 'Numero rue'),
           NumberField::new('zipcode', 'Code postal'),
            TextField::new('city', 'Localité'),
            AssociationField::new('user', 'Utilisateur'),
          
        ];
    }
    


    public function configureCrud(Crud $crud): Crud
{
    return $crud
        // the labels used to refer to this entity in titles, buttons, etc.
        ->setEntityLabelInSingular('Adresse')
    ->setEntityLabelInPlural('Adresses');

        
}

}
