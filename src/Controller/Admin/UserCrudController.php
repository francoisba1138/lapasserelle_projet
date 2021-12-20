<?php

namespace App\Controller\Admin;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use App\Entity\Lodging;
use App\Entity\User;
use App\Entity\Address;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

 public function configureFields(string $pageName): iterable
 {
            /* return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];*/
   
       // yield IdField::new('id');
    yield TextField::new('email');
    yield BooleanField::new('is_verified');
    yield AssociationField::new('address');
 
 
  //yield TextField::new('address.address', 'Numéro rue');
  //yield NumberField::new('address.zipcode', 'Code postal');
  //yield TextField::new('address.city', 'Localité');

 

}
    

public function configureCrud(Crud $crud): Crud
{
    return $crud
        // the labels used to refer to this entity in titles, buttons, etc.
        ->setEntityLabelInSingular('Utilisateur')
        ->setEntityLabelInPlural('Utilisateurs');

        
}




  
}
