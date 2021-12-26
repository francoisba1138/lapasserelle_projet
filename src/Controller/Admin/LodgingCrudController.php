<?php

namespace App\Controller\Admin;

use App\Entity\Lodging;
use App\Entity\User;
use App\Entity\Address;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;

use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

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

  
            yield TextField::new('title', 'Titre');
            yield TextEditorField::new('description');
            yield AssociationField ::new('host', 'propriétaire');
            yield AssociationField::new('address');
            yield AssociationField::new('activities');
            yield AssociationField::new('specifications');



           // yield AssociationField::new('activity')->setFormTypeOption('disabled','disabled');

            //yield TextField::new('address.address', 'Numéro rue');
            //yield NumberField::new('address.zipcode', 'Code postal');
            //yield TextField::new('address.city', 'Localité');
            yield TextField::new('region', 'Région');
            yield BooleanField::new('wwoofing', 'Wwoofing');
            yield BooleanField::new('certified', 'Labélisé');
            yield NumberField::new('rating', 'Evaluation');
            yield CollectionField::new('pictures', 'photos',
             ['entry_type' => ImageField::new('picture', 'photo')->setUploadDir('public/img/icons')->setBasePath('img/icons')]);


          
            // return [
            //     'title',
            //     'description',
            //     'host_id',
            //     'address_id',

            // ];

    

    }


    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            // the labels used to refer to this entity in titles, buttons, etc.
            ->setEntityLabelInSingular('Hébergement')
            ->setEntityLabelInPlural('Hébergements');
    
            
    }

    
}
