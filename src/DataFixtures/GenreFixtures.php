<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
use App\Entity\Genre;

class GenreFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $generator = Faker\Factory::create("fr_FR");
        for($i =1;$i <=10;$i++){
            $genre = new Genre(); 
            
            $genre
            ->setNom($generator->word());
            
            $manager->persist($genre);
            
            
            
            
        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
