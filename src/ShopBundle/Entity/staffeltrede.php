<?php

namespace ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * staffeltrede
 *
 * @ORM\Table(name="staffeltrede")
 * @ORM\Entity(repositoryClass="ShopBundle\Repository\staffeltredeRepository")
 */
class staffeltrede
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
     * @ORM\Column(name="aantal", type="integer")
     */
    private $aantal;

    /**
     * @var int
     *
     * @ORM\Column(name="percentage", type="integer")
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
     * Set aantal
     *
     * @param integer $aantal
     *
     * @return staffeltrede
     */
    public function setAantal($aantal)
    {
        $this->aantal = $aantal;

        return $this;
    }

    /**
     * Get aantal
     *
     * @return int
     */
    public function getAantal()
    {
        return $this->aantal;
    }

    /**
     * Set percentage
     *
     * @param integer $percentage
     *
     * @return staffeltrede
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
        $aantal =  $this->getAantal();
        $percentage = $this->getPercentage();
        return (string) 'Aantal: '.$aantal.' Producten, Kortingspercentage: '.$percentage.'%';
    }
}

