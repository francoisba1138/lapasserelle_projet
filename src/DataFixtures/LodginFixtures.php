<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Lodging;

class LodginFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        /*$lodging=new Lodging();

        $lodging
            ->setTitle("Super Chalet à la montagne")
            ->setDEscription("Lorem ipsom blabla bla blabla bla  blabla bla  blabla bla  blabla bla  blabla bla  blabla bla  blabla bla  blabla bla  blabla bla  blabla bla  blabla bla ")

        $manager->flush();*/
    }
}
