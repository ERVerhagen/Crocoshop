<?php

namespace ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * factuur
 *
 * @ORM\Table(name="factuur")
 * @ORM\Entity(repositoryClass="ShopBundle\Repository\factuurRepository")
 */
class factuur
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
     * @ORM\Column(name="klantnr", type="integer")
     */

    /**
     * @ORM\ManyToOne(targetEntity="ShopBundle\Entity\User")
     * @ORM\JoinColumn(name="klantnr", referencedColumnName="id")
     */

    private $klantnr;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="factuurdatum", type="datetime")
     */
    private $factuurdatum;

    /**
     * @var int
     *
     * @ORM\Column(name="betaaltermijn", type="integer", nullable=true)
     */
    private $betaaltermijn;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="vervaldatum", type="datetime", nullable=true)
     */
    private $vervaldatum;

    /**
     * @var string
     *
     * @ORM\Column(name="referentie", type="string", length=255, unique=true, nullable=true)
     */
    private $referentie;

    /**
     * @var int
     *
     * @ORM\Column(name="betaald", type="integer", nullable=true)
     */

    private $betaald;

    /**
     * @var int
     *
     * @ORM\Column(name="valutanr", type="integer")
     */


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
     * Set klantnr
     *
     * @param integer $klantnr
     *
     * @return factuur
     */
    public function setKlantnr($klantnr)
    {
        $this->klantnr = $klantnr;

        return $this;
    }

    /**
     * Get klantnr
     *
     * @return int
     */
    public function getKlantnr()
    {
        return $this->klantnr;
    }

    /**
     * Set factuurdatum
     *
     * @param \DateTime $factuurdatum
     *
     * @return factuur
     */
    public function setFactuurdatum($factuurdatum)
    {
        $this->factuurdatum = $factuurdatum;

        return $this;
    }

    /**
     * Get factuurdatum
     *
     * @return \DateTime
     */
    public function getFactuurdatum()
    {
        return $this->factuurdatum;
    }

    /**
     * Set betaaltermijn
     *
     * @param integer $betaaltermijn
     *
     * @return factuur
     */
    public function setBetaaltermijn($betaaltermijn)
    {
        $this->betaaltermijn = $betaaltermijn;

        return $this;
    }

    /**
     * Get betaaltermijn
     *
     * @return int
     */
    public function getBetaaltermijn()
    {
        return $this->betaaltermijn;
    }

    /**
     * Set vervaldatum
     *
     * @param \DateTime $vervaldatum
     *
     * @return factuur
     */
    public function setVervaldatum($vervaldatum)
    {
        $this->vervaldatum = $vervaldatum;

        return $this;
    }

    /**
     * Get vervaldatum
     *
     * @return \DateTime
     */
    public function getVervaldatum()
    {
        return $this->vervaldatum;
    }

    /**
     * Set referentie
     *
     * @param string $referentie
     *
     * @return factuur
     */
    public function setReferentie($referentie)
    {
        $this->referentie = $referentie;

        return $this;
    }

    /**
     * Get referentie
     *
     * @return string
     */
    public function getReferentie()
    {
        return $this->referentie;
    }

    /**
     * Set betaald
     *
     * @param integer $betaald
     *
     * @return factuur
     */
    public function setBetaald($betaald)
    {
        $this->betaald = $betaald;

        return $this;
    }

    /**
     * Get betaald
     *
     * @return int
     */
    public function getBetaald()
    {
        return $this->betaald;
    }

}

