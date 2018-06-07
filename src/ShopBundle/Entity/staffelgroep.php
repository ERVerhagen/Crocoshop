<?php

namespace ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * staffelgroep
 *
 * @ORM\Table(name="staffelgroep")
 * @ORM\Entity(repositoryClass="ShopBundle\Repository\staffelgroepRepository")
 */
class staffelgroep
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
     * @ORM\ManyToMany(targetEntity="ShopBundle\Entity\staffeltrede")
     * @ORM\JoinTable(name="staffel_regel",
     *      joinColumns={@ORM\JoinColumn(name="staffelgroep", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="staffeltrede", referencedColumnName="id")}
     *      )
     */
    private $staffeltreden;

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
     * @return mixed
     */
    public function getStaffeltreden()
    {
        return $this->staffeltreden;
    }

    /**
     * @param mixed $staffeltreden
     */
    public function setStaffeltreden($staffeltreden)
    {
        $this->staffeltreden = $staffeltreden;
    }
    public function __toString()
    {

        return (string) $this->id;
    }
}


