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
        $this->updatedAt = new \DateTime();
    }

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


    /**
     * @var string
     */
    private $carImage;


    /**
     * Set carImage
     *
     * @param string $carImage
     *
     * @return Car
     */
    public function setCarImage($carImage)
    {
        $this->carImage = $carImage;

        return $this;
    }

    /**
     * Get carImage
     *
     * @return string
     */
    public function getCarImage()
    {
        return $this->carImage;
    }

    private $imageFile;

    /**
     * @ORM\Column(type="string")
     *
     * @var string|null
     */
    private $imageName;


    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTimeInterface|null
     */
    private $updatedAt;

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFile
     */
    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageName(?string $imageName): void
    {
        $this->imageName = $imageName;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }

}
