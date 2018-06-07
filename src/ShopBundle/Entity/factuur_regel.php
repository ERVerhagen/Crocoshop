<?php

namespace ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * factuur_regel
 *
 * @ORM\Table(name="factuur_regel")
 * @ORM\Entity(repositoryClass="ShopBundle\Repository\factuur_regelRepository")
 */
class factuur_regel
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
     * @ORM\Column(name="factuurnr", type="integer")
     */

    /**
     * @ORM\ManyToOne(targetEntity="ShopBundle\Entity\factuur")
     * @ORM\JoinColumn(name="factuurnr", referencedColumnName="id")
     */
    private $factuurnr;

    /**
     * @var int
     *
     * @ORM\Column(name="artikelnr", type="integer")
     */

    /**
     * @ORM\ManyToOne(targetEntity="ShopBundle\Entity\artikel")
     * @ORM\JoinColumn(name="artikelnr", referencedColumnName="id")
     */
    private $artikelnr;

    /**
     * @var int
     *
     * @ORM\Column(name="eenheid", type="integer")
     */
    private $eenheid;


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
     * Set factuurnr
     *
     * @param integer $factuurnr
     *
     * @return factuur_regel
     */
    public function setFactuurnr($factuurnr)
    {
        $this->factuurnr = $factuurnr;

        return $this;
    }

    /**
     * Get factuurnr
     *
     * @return int
     */
    public function getFactuurnr()
    {
        return $this->factuurnr;
    }

    /**
     * Set artikelnr
     *
     * @param integer $artikelnr
     *
     * @return factuur_regel
     */
    public function setArtikelnr($artikelnr)
    {
        $this->artikelnr = $artikelnr;

        return $this;
    }

    /**
     * Get artikelnr
     *
     * @return int
     */
    public function getArtikelnr()
    {
        return $this->artikelnr;
    }

    /**
     * Set eenheid
     *
     * @param integer $eenheid
     *
     * @return factuur_regel
     */
    public function setEenheid($eenheid)
    {
        $this->eenheid = $eenheid;

        return $this;
    }

    /**
     * Get eenheid
     *
     * @return int
     */
    public function getEenheid()
    {
        return $this->eenheid;
    }
    public function __toString()
    {
        return (string) $this->getArtikelnr();
    }
}

