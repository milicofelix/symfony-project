<?php

namespace App\DataFixtures;

use App\Entity\Raca;
use App\Entity\Especie;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $especies = [
            "Cachorro" => [
                ['nome' => "SRD"],
                ['nome' => "Boxer"],
                ['nome' => "Shihtzu"],
                ['nome' => "Poodle"],
            ],
            "Gato" => [
                ['nome' => "SRD"],
                ['nome' => "Siamês"],
                ['nome' => "Angorá"],
            ]
        ];

        foreach ($especies as $especie => $racas) {
            $obj = new Especie();
            $obj->setNome($especie);
            $manager->persist($obj);

            foreach($racas as $raca) {
                $obj2 = new Raca();
                $obj2->setNome($raca['nome']);
                $obj2->setEspecie($obj);
                $manager->persist($obj2);
            }
        }
        $manager->flush();
    }
}
