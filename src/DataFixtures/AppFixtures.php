<?php

namespace App\DataFixtures;

use App\Entity\annonce;
use App\Entity\User;
use App\Utils\PriceCalculator;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{

    private $passwordEncoder;
    public function __construct(UserPasswordEncoderInterface $userPasswordEncoderInterface)
    {
        $this->passwordEncoder = $userPasswordEncoderInterface;
    }

    public function load(ObjectManager $manager)
    {
        $faker= Factory::create();

        $priceCalculator=new PriceCalculator();
        for ($i = 0; $i < 10; $i++){
            $annonce = new Annonce();

            $nb_km=$faker->numberBetween(10000,1000000);
            $car_year=$faker->numberBetween(2000,2019);
            $nb_days=$faker->numberBetween(1,22);
            $price = $priceCalculator->givePrice($nb_days,$nb_km,$car_year);


            $annonce->SetTitle($faker->realText($maxNbChars = 10, $indexSize = 1))
                ->setDescription($faker->realText($maxNbChars = 155, $indexSize = 2))
                ->setCity($faker->word())
                ->setCaryear($car_year)
                ->setNbkm($nb_km)
                ->setNbdays($nb_days)
                ->setPrice($price);


            $manager->persist($annonce);
        }

        $user = new User();
        $user->setEmail('bob@bob.com')
            ->setRoles(['ROLE_ADMIN'])
            ->setPassword($this->passwordEncoder->encodePassword($user,'bob123'));
        $manager->persist($user);


        $manager->flush();

    }
}
