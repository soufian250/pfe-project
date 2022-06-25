<?php

namespace ProjectBundle\Entity;

use Symfony\Component\HttpFoundation\File\File;


/**
 * Car
 */
class Car
{
    public function __construct()
    {
        $this->createdAt = new \DateTime('now');
    }

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $matriclue;

    /**
     * @var string
     */
    private $name;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var \DateTime
     */
    private $createdAt;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set matriclue
     *
     * @param string $matriclue
     *
     * @return Car
     */
    public function setMatriclue($matriclue)
    {
        $this->matriclue = $matriclue;

        return $this;
    }

    /**
     * Get matriclue
     *
     * @return string
     */
    public function getMatriclue()
    {
        return $this->matriclue;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Car
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
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Car
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Car
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
    /**
     * @var string
     */
    private $imageName;


    /**
     * Set imageName
     *
     * @param string $imageName
     *
     * @return Car
     */
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;

        return $this;
    }

    /**
     * Get imageName
     *
     * @return string
     */
    public function getImageName()
    {
        return $this->imageName;
    }
    /**
     * @var integer
     */
    private $seat;

    /**
     * @var integer
     */
    private $door;

    /**
     * @var boolean
     */
    private $air_conditioner = false;

    /**
     * @var string
     */
    private $transmission;

    /**
     * @var string
     */
    private $fuel;


    /**
     * Set seat
     *
     * @param integer $seat
     *
     * @return Car
     */
    public function setSeat($seat)
    {
        $this->seat = $seat;

        return $this;
    }

    /**
     * Get seat
     *
     * @return integer
     */
    public function getSeat()
    {
        return $this->seat;
    }

    /**
     * Set door
     *
     * @param integer $door
     *
     * @return Car
     */
    public function setDoor($door)
    {
        $this->door = $door;

        return $this;
    }

    /**
     * Get door
     *
     * @return integer
     */
    public function getDoor()
    {
        return $this->door;
    }

    /**
     * Set airConditioner
     *
     * @param boolean $airConditioner
     *
     * @return Car
     */
    public function setAirConditioner($airConditioner)
    {
        $this->air_conditioner = $airConditioner;

        return $this;
    }

    /**
     * Get airConditioner
     *
     * @return boolean
     */
    public function getAirConditioner()
    {
        return $this->air_conditioner;
    }

    /**
     * Set transmission
     *
     * @param string $transmission
     *
     * @return Car
     */
    public function setTransmission($transmission)
    {
        $this->transmission = $transmission;

        return $this;
    }

    /**
     * Get transmission
     *
     * @return string
     */
    public function getTransmission()
    {
        return $this->transmission;
    }

    /**
     * Set fuel
     *
     * @param string $fuel
     *
     * @return Car
     */
    public function setFuel($fuel)
    {
        $this->fuel = $fuel;

        return $this;
    }

    /**
     * Get fuel
     *
     * @return string
     */
    public function getFuel()
    {
        return $this->fuel;
    }
    /**
     * @var \ProjectBundle\Entity\Type
     */
    private $type;


    /**
     * Set type
     *
     * @param \ProjectBundle\Entity\Type $type
     *
     * @return Car
     */
    public function setType(\ProjectBundle\Entity\Type $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \ProjectBundle\Entity\Type
     */
    public function getType()
    {
        return $this->type;
    }
    /**
     * @var integer
     */
    private $passenger;


    /**
     * Set passenger
     *
     * @param integer $passenger
     *
     * @return Car
     */
    public function setPassenger($passenger)
    {
        $this->passenger = $passenger;

        return $this;
    }

    /**
     * Get passenger
     *
     * @return integer
     */
    public function getPassenger()
    {
        return $this->passenger;
    }
}
