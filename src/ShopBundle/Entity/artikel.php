<?php

namespace ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * artikel
 *
 * @ORM\Table(name="artikel")
 * @ORM\Entity(repositoryClass="ShopBundle\Repository\artikelRepository")
 */
class artikel
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
     * @ORM\Column(name="staffelgroep", type="integer", nullable=true)
     */

    /**
     * @ORM\ManyToOne(targetEntity="ShopBundle\Entity\staffelgroep")
     * @ORM\JoinColumn(name="staffelgroep", referencedColumnName="id")
     */
    private $staffelgroep;

    /**
     * @var string
     *
     * @ORM\Column(name="naam", type="string", length=255)
     */
    private $naam;

    /**
     * @return string
     */
    public function getNaam()
    {
        return $this->naam;
    }

    /**
     * @param string $naam
     */
    public function setNaam($naam)
    {
        $this->naam = $naam;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="omschrijving", type="text", length=255)
     */
    private $omschrijving;

    /**
     * @var int
     *
     * @ORM\Column(name="btw", type="integer")
     */

    /**
     * @ORM\ManyToOne(targetEntity="ShopBundle\Entity\btw")
     * @ORM\JoinColumn(name="btw", referencedColumnName="id")
     */
    private $btw;

    /**
     * @var float
     *
     * @ORM\Column(name="prijs", type="float")
     */
    private $prijs;

    /**
     * @var integer
     *
     * @ORM\Column(name="categorie", type="integer")
     */

    /**
     * @ORM\ManyToOne(targetEntity="ShopBundle\Entity\categorie")
     * @ORM\JoinColumn(name="categorie", referencedColumnName="id")
     */
    private $categorie;

    /**
     * @return int
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * @param int $categorie
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    }
    /**
     * @return string
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * @param string $img
     */
    public function setImg($img)
    {
        $this->img = $img;
    }


    /**
     * Get id
     *
     * @return int
     */

    /**
     * @var string
     *
     * @ORM\Column(name="img", type="string", length=255)
     */
    private $img;

    public function getId()
    {
        return $this->id;
    }

    /**
     * Set staffelgroep
     *
     * @param integer $staffelgroep
     *
     * @return artikel
     */
    public function setStaffelgroep($staffelgroep)
    {
        $this->staffelgroep = $staffelgroep;

        return $this;
    }

    /**
     * Get staffelgroep
     *
     * @return int
     */
    public function getStaffelgroep()
    {
        return $this->staffelgroep;
    }

    /**
     * Set omschrijving
     *
     * @param string $omschrijving
     *
     * @return artikel
     */
    public function setOmschrijving($omschrijving)
    {
        $this->omschrijving = $omschrijving;

        return $this;
    }

    /**
     * Get omschrijving
     *
     * @return string
     */
    public function getOmschrijving()
    {
        return $this->omschrijving;
    }

    /**
     * Set btw
     *
     * @param integer $btw
     *
     * @return artikel
     */
    public function setBtw($btw)
    {
        $this->btw = $btw;

        return $this;
    }

    /**
     * Get btw
     *
     * @return int
     */
    public function getBtw()
    {
        return $this->btw;
    }

    /**
     * Set prijs
     *
     * @param string $prijs
     *
     * @return artikel
     */
    public function setPrijs($prijs)
    {
        $this->prijs = $prijs;

        return $this;
    }

    /**
     * Get prijs
     *
     * @return string
     */
    public function getPrijs()
    {
        return $this->prijs;
    }
    public function __toString()
    {
        return (string) $this->getNaam();
    }
}

