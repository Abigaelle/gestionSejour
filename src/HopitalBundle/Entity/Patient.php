<?php

namespace HopitalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Patient
 *
 * @ORM\Table(name="patient")
 * @ORM\Entity(repositoryClass="HopitalBundle\Repository\PatientRepository")
 */
class Patient
{
    /**
     * @var Service $leService
     *
     * @ORM\ManyToOne(targetEntity="Service")
     */
    private $leService;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Chambre", inversedBy="patients")
     */
    private $chambre;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateNaissance", type="datetime")
     */
    private $dateNaissance;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateArriver", type="datetime")
     */
    private $dateArriver;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateSorti", type="datetime")
     */
    private $dateSorti;

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
     * Set nom
     *
     * @param string $nom
     *
     * @return Patient
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Patient
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set dateNaissance
     *
     * @param \DateTime $dateNaissance
     *
     * @return Patient
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * Get dateNaissance
     *
     * @return \DateTime
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * Set leService
     *
     * @param \HopitalBundle\Entity\Service $leService
     *
     * @return Patient
     */
    public function setLeService(\HopitalBundle\Entity\Service $leService = null)
    {
        $this->leService = $leService;

        return $this;
    }

    /**
     * Get leService
     *
     * @return \HopitalBundle\Entity\Service
     */
    public function getLeService()
    {
        return $this->leService;
    }

    /**
     * Set dateArriver
     *
     * @param \DateTime $dateArriver
     *
     * @return Patient
     */
    public function setDateArriver($dateArriver)
    {
        $this->dateArriver = $dateArriver;

        return $this;
    }

    /**
     * Get dateArriver
     *
     * @return \DateTime
     */
    public function getDateArriver()
    {
        return $this->dateArriver;
    }

    /**
     * Set dateSorti
     *
     * @param \DateTime $dateSorti
     *
     * @return Patient
     */
    public function setDateSorti($dateSorti)
    {
        $this->dateSorti = $dateSorti;

        return $this;
    }

    /**
     * Get dateSorti
     *
     * @return \DateTime
     */
    public function getDateSorti()
    {
        return $this->dateSorti;
    }

    /**
     * Set chambre
     *
     * @param \HopitalBundle\Entity\Chambre $chambre
     *
     * @return Patient
     */
    public function setChambre(\HopitalBundle\Entity\Chambre $chambre = null)
    {
        $this->chambre = $chambre;

        return $this;
    }

    /**
     * Get chambre
     *
     * @return \HopitalBundle\Entity\Chambre
     */
    public function getChambre()
    {
        return $this->chambre;
    }
}
