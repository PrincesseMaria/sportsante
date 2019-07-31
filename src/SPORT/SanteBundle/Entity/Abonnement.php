<?php

namespace SPORT\SanteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use \SPORT\UserBundle\Entity\User;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Abonnement
 *
 * @ORM\Table(name="abonnement")
 * @ORM\Entity(repositoryClass="SPORT\SanteBundle\Repository\AbonnementRepository")
 */
class Abonnement {

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
     * @ORM\Column(name="datedebut", type="datetimetz")
     */
    private $datedebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datefin", type="datetimetz")
     */
    private $datefin;

    /**
     * @var int
     *
     * @ORM\Column(name="nombreseance", type="integer")

     * @Assert\GreaterThan(
     *     value = 5
     * )
     */
    private $nombreseance;

    /**
     * @var float
     * @ORM\Column(name="prixseance", type="float")F
     */
    private $prixseance;

    /**
     * Many abonnement have Many Users.
     * @ORM\ManyToOne(targetEntity="SPORT\UserBundle\Entity\User",inversedBy="abonnements",cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set datedebut
     *
     * @param \DateTime $datedebut
     *
     * @return Abonnement
     */
    public function setDatedebut($datedebut) {
        $this->datedebut = $datedebut;

        return $this;
    }

    /**
     * Get datedebut
     *
     * @return \DateTime
     */
    public function getDatedebut() {
        return $this->datedebut;
    }

    /**
     * Set datefin
     *
     * @param \DateTime $datefin
     *
     * @return Abonnement
     */
    public function setDatefin($datefin) {
        $this->datefin = $datefin;

        return $this;
    }

    /**
     * Get datefin
     *
     * @return \DateTime
     */
    public function getDatefin() {
        return $this->datefin;
    }

    /**
     * Set nombreseance
     *
     * @param integer $nombreseance
     *
     * @return Abonnement
     */
    public function setNombreseance($nombreseance) {
        $this->nombreseance = $nombreseance;

        return $this;
    }

    /**
     * Get nombreseance
     *
     * @return int
     */
    public function getNombreseance() {
        return $this->nombreseance;
    }

    /**
     * Set user
     *
     * @param \SPORT\UserBundle\Entity\User $user
     *
     * @return Abonnement
     */
    public function setUser(\SPORT\UserBundle\Entity\User $user) {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \SPORT\UserBundle\Entity\User
     */
    public function getUser() {
        return $this->user;
    }

    /**
     * Set prixseance
     *
     * @param float $prixseance
     *
     * @return Abonnement
     */
    public function setPrixseance($prixseance) {
        $this->prixseance = $prixseance;

        return $this;
    }

    /**
     * Get prixseance
     *
     * @return float
     */
    public function getPrixseance() {
        return $this->prixseance;
    }

    function __construct() {
        $this->datedebut = new \DateTime();

        $this->datefin = new \DateTime();
        $interval = new \DateInterval('P12M');

        $this->datefin->add($interval);
    }

    public function decrementSeance() {
        if ($this->nombreseance >= 1) {
            $this->nombreseance = $this->nombreseance - 1;
        }
    }

}
