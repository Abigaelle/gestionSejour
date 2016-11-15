<?php

namespace HopitalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sejour
 *
 * @ORM\Table(name="sejour")
 * @ORM\Entity(repositoryClass="HopitalBundle\Repository\SejourRepository")
 */
class Sejour
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
     * @var \DateTime
     *
     * @ORM\Column(name="dateArriver", type="datetime")
     */
    private $dateArriver;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateSortie", type="datetime")
     */
    private $dateSortie;

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
     * Set dateArriver
     *
     * @param \DateTime $dateArriver
     *
     * @return Sejour
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
     * Set dateSortie
     *
     * @param \DateTime $dateSortie
     *
     * @return Sejour
     */
    public function setDateSortie($dateSortie)
    {
        $this->dateSortie = $dateSortie;

        return $this;
    }

    /**
     * Get dateSortie
     *
     * @return \DateTime
     */
    public function getDateSortie()
    {
        return $this->dateSortie;
    }
}

