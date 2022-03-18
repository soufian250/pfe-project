<?php

namespace ProjectBundle\Entity;

/**
 * Car
 */
class Car
{
    /**
     * @var int
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
     * Get id
     *
     * @return int
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
}
