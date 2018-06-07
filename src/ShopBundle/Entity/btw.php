<?php

namespace ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * btw
 *
 * @ORM\Table(name="btw")
 * @ORM\Entity(repositoryClass="ShopBundle\Repository\btwRepository")
 */
class btw
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
     * @var float
     *
     * @ORM\Column(name="percentage", type="float", unique=true)
     */
    private $percentage;


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
     * Set percentage
     *
     * @param integer $percentage
     *
     * @return btw
     */
    public function setPercentage($percentage)
    {
        $this->percentage = $percentage;

        return $this;
    }

    /**
     * Get percentage
     *
     * @return int
     */
    public function getPercentage()
    {
        return $this->percentage;
    }
    public function __toString()
    {
        return (string) $this->getPercentage();
    }
}

