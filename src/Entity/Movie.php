<?php

namespace App\Entity;

use DateTime;
use App\Entity\Category;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\MovieRepository;

/**
 * @ORM\Entity(repositoryClass=MovieRepository::class)
 */
class Movie
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @var DateTime
     *
     * @ORM\Column(type="date")
     */
    private $release_date;

    /**
     * @var object
     *
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="movies")
     */
    private $category;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Movie
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Movie
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param $description
     * @return Movie
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getReleaseDate()
    {
        return $this->release_date;
    }

    /**
     * @param DateTime $release_date
     * @return Movie
     */
    public function setReleaseDate(DateTime $release_date)
    {
        $this->release_date = $release_date;
        return $this;
    }

    /**
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param string $category
     * @return Movie
     */
    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }
}
