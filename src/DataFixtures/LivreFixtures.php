<?php

namespace App\DataFixtures;

use App\Entity\Livre;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class LivreFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $generator = Faker\Factory::create("fr_FR");
        for($i =1;$i <=50;$i++){
            $livre = new Livre(); 
            
            $livre
            ->setIsbn($generator->isbn13())
            ->setTitre($generator->sentence())
            ->setNombrePages($generator->numberBetween($min = 50, $max = 500))
            ->setDateDeParution($generator->DateTime())
            ->setNote($generator->numberBetween($min = 0, $max = 20));
            
            $manager->persist($livre);
        }

        $manager->flush();
    }
}
