<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

     /**
     * @var string
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank(message="Campo nome não pode ser vazio!")
     */
    private $name;

     /**
     * @var float
     * @ORM\Column(type="decimal", scale=2)
     * @Assert\NotBlank(message="Campo preço não pode ser vazio!")
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     * @Assert\NotBlank(message="Campo descrição não pode ser vazio!")
     *
     */
    private $description;


    public function getId(): ?int
    {
        return $this->id;
    }
    public function getName(): ?string
    {
        return $this->name;
    }
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }
    public function setPrice(float $price): self
    {
        $this->price = $price;
        return $this;
    }

    /**
     * Get the value of description
     *
     * @return  string
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @param  string  $description
     *
     * @return  self
     */ 
    public function setDescription(string $description)
    {
        $this->description = $description;

        return $this;
    }
}
