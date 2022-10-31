<?php

namespace App\DataFixtures;

use App\Entity\Movie;
use App\Entity\Category;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $categories = [
            "Terror", "Romance", "Comedy", "Action", "Science Fiction"
        ];

        foreach ($categories as $item) {
            $category = new Category();
            $category->setName($item);
            $manager->persist($category);
        }

        $manager->flush();

        for ($i = 1; $i <= 200; $i++) {

            $categories = $manager->getRepository(Category::class)->findAll();
            $category = array_rand($categories);

            $movie = new Movie();
            $movie->setTitle("Title of movie " . $i);
            $movie->setCategory($categories[$category]);
            $movie->setDescription("Description of movie " . $i * 3.1416);
            $movie->setReleaseDate((new \DateTime())->modify("- $i days"));
            $manager->persist($movie);
        }
        $manager->flush();
        
    }
}
