<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Comps
 *
 * @ORM\Table(name="comps")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CompsRepository")
 */
class Comps
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start_time", type="time")
     */
    private $startTime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end_time", type="time")
     */
    private $endTime;

    /**
     * @var int
     *
     * @ORM\Column(name="number_of_routes", type="integer")
     */
    private $numberOfRoutes;

    /**
     * @var bool
     *
     * @ORM\Column(name="spec_chal", type="boolean")
     */
    private $specChal;

    /**
     * @var int
     *
     * @ORM\Column(name="spec_chal_points", type="integer")
     */
    private $specChalPoints;

    /**
     * One Product has Many Features.
     * @ORM\OneToMany(targetEntity="Route", mappedBy="Comps")
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
     * @return Comps
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Comps
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set startTime
     *
     * @param \DateTime $startTime
     *
     * @return Comps
     */
    public function setStartTime($startTime)
    {
        $this->startTime = $startTime;

        return $this;
    }

    /**
     * Get startTime
     *
     * @return \DateTime
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * Set endTime
     *
     * @param \DateTime $endTime
     *
     * @return Comps
     */
    public function setEndTime($endTime)
    {
        $this->endTime = $endTime;

        return $this;
    }

    /**
     * Get endTime
     *
     * @return \DateTime
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * Set numberOfRoutes
     *
     * @param integer $numberOfRoutes
     *
     * @return Comps
     */
    public function setNumberOfRoutes($numberOfRoutes)
    {
        $this->numberOfRoutes = $numberOfRoutes;

        return $this;
    }

    /**
     * Get numberOfRoutes
     *
     * @return int
     */
    public function getNumberOfRoutes()
    {
        return $this->numberOfRoutes;
    }

    /**
     * Set specChal
     *
     * @param boolean $specChal
     *
     * @return Comps
     */
    public function setSpecChal($specChal)
    {
        $this->specChal = $specChal;

        return $this;
    }

    /**
     * Get specChal
     *
     * @return bool
     */
    public function getSpecChal()
    {
        return $this->specChal;
    }

    /**
     * Set specChalPoints
     *
     * @param integer $specChalPoints
     *
     * @return Comps
     */
    public function setSpecChalPoints($specChalPoints)
    {
        $this->specChalPoints = $specChalPoints;

        return $this;
    }

    /**
     * Get specChalPoints
     *
     * @return int
     */
    public function getSpecChalPoints()
    {
        return $this->specChalPoints;
    }
}

