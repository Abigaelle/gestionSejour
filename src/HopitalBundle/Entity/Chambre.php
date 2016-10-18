<?php

namespace HopitalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Chambre
 *
 * @ORM\Table(name="chambre")
 * @ORM\Entity(repositoryClass="HopitalBundle\Repository\ChambreRepository")
 */
class Chambre
{
    /**
     * 
     *
     * @ORM\OneToMany(targetEntity="Patient", mappedBy="chambre")
     */
    private $patients;

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
     * @ORM\Column(name="codeLit", type="integer")
     */
    private $codeLit;

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
     * Constructor
     */
    public function __construct()
    {
        $this->patients = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add patient
     *
     * @param \HopitalBundle\Entity\Patient $patient
     *
     * @return Chambre
     */
    public function addPatient(\HopitalBundle\Entity\Patient $patient)
    {
        $this->patients[] = $patient;

        return $this;
    }

    /**
     * Remove patient
     *
     * @param \HopitalBundle\Entity\Patient $patient
     */
    public function removePatient(\HopitalBundle\Entity\Patient $patient)
    {
        $this->patients->removeElement($patient);
    }

    /**
     * Get patients
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPatients()
    {
        return $this->patients;
    }

    /**
     * Set codeLit
     *
     * @param integer $codeLit
     *
     * @return Chambre
     */
    public function setCodeLit($codeLit)
    {
        $this->codeLit = $codeLit;

        return $this;
    }

    /**
     * Get codeLit
     *
     * @return integer
     */
    public function getCodeLit()
    {
        return $this->codeLit;
    }
}
