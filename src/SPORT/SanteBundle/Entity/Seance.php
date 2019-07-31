<?php

namespace SPORT\SanteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Seance
 *
 * @ORM\Table(name="seance")
 * @ORM\Entity(repositoryClass="SPORT\SanteBundle\Repository\SeanceRepository")
 */
class Seance {

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
     * @Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message="Le jour ne doit pas contenir un chiffre"
     * )
     * @ORM\Column(name="jour_seance", type="string", length=25)
     */
    private $jourSeance;

    /**
     * @var date
     *
     * @ORM\Column(name="date_seance", type="date")
     * @Assert\GreaterThanOrEqual("today")
     */
    private $dateSeance;

    /**
     * @ORM\ManyToOne(targetEntity="SPORT\SanteBundle\Entity\Salle", inversedBy="seances")
     * @ORM\JoinColumn(nullable=false)
     */
    private $salle;

    /**
     * @ORM\OneToMany(targetEntity="SPORT\SanteBundle\Entity\Creneau", mappedBy="seance")
     */
    private $creneaux;

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set jourSeance
     *
     * @param string $jourSeance
     *
     * @return Seance
     */
    public function setJourSeance($jourSeance) {
        $this->jourSeance = $jourSeance;

        return $this;
    }

    /**
     * Get jourSeance
     *
     * @return string
     */
    public function getJourSeance() {
        return $this->jourSeance;
    }

    /**
     * Set dateSeance
     *
     * @param \DateTime $dateSeance
     *
     * @return Seance
     */
    public function setDateSeance($dateSeance) {
        $this->dateSeance = $dateSeance;

        return $this;
    }

    /**
     * Get dateSeance
     *
     * @return \DateTime
     */
    public function getDateSeance() {
        return $this->dateSeance;
    }

    /**
     * Constructor
     */
    public function __construct() {
        $this->creneaux = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add creneaux
     *
     * @param \SPORT\SanteBundle\Entity\Creneau $creneaux
     *
     * @return Seance
     */
    public function addCreneaux(\SPORT\SanteBundle\Entity\Creneau $creneaux) {
        $this->creneaux[] = $creneaux;
        $creneaux->setSeance(this);
        return $this;
    }

    /**
     * Remove creneaux
     *
     * @param \SPORT\SanteBundle\Entity\Creneau $creneaux
     */
    public function removeCreneaux(\SPORT\SanteBundle\Entity\Creneau $creneaux) {
        $this->creneaux->removeElement($creneaux);
    }

    /**
     * Get creneaux
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCreneaux() {
        return $this->creneaux;
    }

    /**
     * Set salle
     *
     * @param \SPORT\SanteBundle\Entity\Salle $salle
     *
     * @return Seance
     */
    public function setSalle(\SPORT\SanteBundle\Entity\Salle $salle) {
        $this->salle = $salle;

        return $this;
    }

    /**
     * Get salle
     *
     * @return \SPORT\SanteBundle\Entity\Salle
     */
    public function getSalle() {
        return $this->salle;
    }

}
