<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Route
 *
 * @ORM\Table(name="route")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RouteRepository")
 */
class Route
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
     * @var int
     *
     * @ORM\Column(name="number", type="integer")
     */
    private $number;

    /**
     * @var int
     *
     * @ORM\Column(name="points", type="integer")
     */
    private $points;

    /**
     * Many Routes have One Setter.
     * @ORM\ManyToOne(targetEntity="Setter", inversedBy="routes")
     * @ORM\JoinColumn(name="setter_id", referencedColumnName="id")
     */
    private $setter;

    /**
     * @var string
     *
     * Many Routes have One Comps.
     * @ORM\ManyToOne(targetEntity="Comps", inversedBy="routes")
     * @ORM\JoinColumn(name="comps_id", referencedColumnName="id")
     */
    private $comps;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=255, nullable=true)
     */
    private $color;

    /**
     * @var int
     *
     * @ORM\Column(name="rating", type="integer")
     */
    private $rating;


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
     * Set number
     *
     * @param integer $number
     *
     * @return Route
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set points
     *
     * @param integer $points
     *
     * @return Route
     */
    public function setPoints($points)
    {
        $this->points = $points;

        return $this;
    }

    /**
     * Get points
     *
     * @return int
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * Set setter
     *
     * @param string $setter
     *
     * @return Route
     */
    public function setSetter($setter)
    {
        $this->setter = $setter;

        return $this;
    }

    /**
     * Get setter
     *
     * @return string
     */
    public function getSetter()
    {
        return $this->setter;
    }

    /**
     * Set comps
     *
     * @param string $comps
     *
     * @return Route
     */
    public function setComps($comps)
    {
        $this->comps = $comps;

        return $this;
    }

    /**
     * Get comps
     *
     * @return string
     */
    public function getComps()
    {
        return $this->comps;
    }

    /**
     * Set color
     *
     * @param string $color
     *
     * @return Route
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set rating
     *
     * @param integer $rating
     *
     * @return Route
     */
    public function setRating($rating)
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * Get rating
     *
     * @return int
     */
    public function getRating()
    {
        return $this->rating;
    }
}

