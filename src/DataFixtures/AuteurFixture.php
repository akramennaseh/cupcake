<?php

namespace App\DataFixtures;


use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Auteur;
use Faker;

class AuteurFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $generator = Faker\Factory::create("fr_FR");
        for($i =1;$i <=20;$i++){
            $auteur = new Auteur(); 
            
            $auteur
            ->setNomPrenom($generator->name())
            ->setSexe($generator->randomElement($array = array ('a','b','c')))
            ->setDateDeNaissance($generator->numberBetween($min = 1000, $max = 9000))
            ->setNationalite($generator->country());
            
            $manager->persist($auteur);
        }

        $manager->flush();
    }
}
