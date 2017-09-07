<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Setter
 *
 * @ORM\Table(name="setter")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SetterRepository")
 */
class Setter
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=255)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=255)
     */
    private $lastName;

    /**
     * @var int
     *
     * @ORM\Column(name="ratings", type="integer")
     */
    private $ratings;


    /**
     * One Product has Many Features.
     * @ORM\OneToMany(targetEntity="Route", mappedBy="setter")
     */
    private $routes;
    // ...

    public function __construct() {
        $this->routes = new ArrayCollection();
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Setter
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return Setter
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set ratings
     *
     * @param integer $ratings
     *
     * @return Setter
     */
    public function setRatings($ratings)
    {
        $this->ratings = $ratings;

        return $this;
    }

    /**
     * Get ratings
     *
     * @return int
     */
    public function getRatings()
    {
        return $this->ratings;
    }

//    /**
//     * Set routes
//     *
//     * @param integer $routes
//     *
//     * @return Setter
//     */
//    public function setRoutes($routes)
//    {
//        $this->routes = $routes;
//
//        return $this;
//    }
//
//    /**
//     * Get routes
//     *
//     * @return int
//     */
//    public function getRoutes()
//    {
//        return $this->routes;
//    }
}

