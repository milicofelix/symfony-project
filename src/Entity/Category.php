<?php

namespace App\Entity;

use App\Entity\Movie;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\CategoryRepository;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @var object
     *
     * @ORM\OneToMany(targetEntity="Movie", mappedBy="category")
     */
    private $movies;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Category
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Category
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return object
     */
    public function getMovies()
    {
        return $this->movies;
    }

    /**
     * @param object $movies
     * @return Category
     */
    public function setMovies($movies)
    {
        $this->movies = $movies;
        return $this;
    }
}
