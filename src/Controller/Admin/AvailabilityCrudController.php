<?php

namespace App\Controller\Admin;

use App\Entity\Availability;
use App\Entity\Lodging;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;

use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class AvailabilityCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Availability::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [

            DateTimeField::new('startdate'),
            DateTimeField::new('enddate'),
            AssociationField::new('lodging'),
            
           
          
        ];
    }
    


    public function configureCrud(Crud $crud): Crud
{
    return $crud
        // the labels used to refer to this entity in titles, buttons, etc.
        ->setEntityLabelInSingular('Disponibilité')
    ->setEntityLabelInPlural('Diponibilité');

        
}

}
