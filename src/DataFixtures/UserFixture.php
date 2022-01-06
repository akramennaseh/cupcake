<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixture extends Fixture
{
  /*  private UserPasswordHasherInterface $hasher;
    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }*/
    /*public function load(ObjectManager $manager): void
    {
        $generator = Faker\Factory::create("fr_FR");
        for($i =1;$i <=10;$i++){
            $user = new User(); 
            $password = $this->hasher->hashPassword($user, 'pass_1234');
            $user
            ->setFirstname($generator->firstName())
            ->setLastname($generator->lastName())
            ->setEmail($generator->email())
            ->setPassword($password)
            ->setRoles(['ROLE_TEST']);
            
            $manager->persist($user);
            
            
            
            
        }
        // $product = new P roduct();
        // $manager->persist($product);

        $manager->flush();
    }*/
    private $passwordEncoder;
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }
    public function load(ObjectManager $manager)
    {
    
        
            $user = new User(); 
            $password_hashed = $this->passwordEncoder->encodePassword($user,"admin1234");
            $user
            ->setFirstname("cupcake")
            ->setLastname("cupcake")
            ->setEmail("cupcake@ramenna.com")
            ->setPassword($password_hashed)
            ->setRoles(['ROLE_USER']);
            
            $manager->persist($user);
            
            
            
            
        
        // $product = new P roduct();
        // $manager->persist($product);

        $manager->flush();
    }
}
