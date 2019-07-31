<?php

namespace SPORT\SanteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use \SPORT\UserBundle\Entity\User;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Creneau
 *
 * @ORM\Table(name="creneau")
 * @ORM\Entity(repositoryClass="SPORT\SanteBundle\Repository\CreneauRepository")
 */
class Creneau {

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
     * @ORM\Column(name="heured_creneau", type="time")
     */
    private $heuredCreneau;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heuref_creneau", type="time")
     */
    private $heurefCreneau;

    /**
     * @var int
     *
     * @ORM\Column(name="nbplace_creneau", type="integer")
     * @Assert\GreaterThan(
     *     value = 5
     * )
     */
    private $nbplaceCreneau;

    /**
     * @var string
     *
     * @ORM\Column(name="nomActivite_creneau", type="string", length=150)
     */
    private $nomActiviteCreneau;

    /**
     * @ORM\ManyToOne(targetEntity="SPORT\SanteBundle\Entity\Seance", inversedBy="creneaux")
     * @ORM\JoinColumn(nullable=false)
     */
    private $seance;

    /**
     * Many Creneau have Many Users.
     * @ORM\ManyToMany(targetEntity="SPORT\UserBundle\Entity\User",cascade={"persist"})
     */
    private $users;

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set heureCreneau
     *
     * @param \DateTime $heureCreneau
     *
     * @return Creneau
     */
    public function setHeureCreneau($heureCreneau) {
        $this->heureCreneau = $heureCreneau;

        return $this;
    }

    /**
     * Get heureCreneau
     *
     * @return \DateTime
     */
    public function getHeureCreneau() {
        return $this->heureCreneau;
    }

    /**
     * Set nbplaceCreneau
     *
     * @param integer $nbplaceCreneau
     *
     * @return Creneau
     */
    public function setNbplaceCreneau($nbplaceCreneau) {
        $this->nbplaceCreneau = $nbplaceCreneau;

        return $this;
    }

    /**
     * Get nbplaceCreneau
     *
     * @return int
     */
    public function getNbplaceCreneau() {
        return $this->nbplaceCreneau;
    }

    /**
     * Set nomActiviteCreneau
     *
     * @param string $nomActiviteCreneau
     *
     * @return Creneau
     */
    public function setNomActiviteCreneau($nomActiviteCreneau) {
        $this->nomActiviteCreneau = $nomActiviteCreneau;

        return $this;
    }

    /**
     * Get nomActiviteCreneau
     *
     * @return string
     */
    public function getNomActiviteCreneau() {
        return $this->nomActiviteCreneau;
    }

    /**
     * Set seance
     *
     * @param \SPORT\SanteBundle\Entity\Seance $seance
     *
     * @return Creneau
     */
    public function setSeance(\SPORT\SanteBundle\Entity\Seance $seance) {
        $this->seance = $seance;

        return $this;
    }

    /**
     * Get seance
     *
     * @return \SPORT\SanteBundle\Entity\Seance
     */
    public function getSeance() {
        return $this->seance;
    }

    /**
     * Set heuredCreneau
     *
     * @param \DateTime $heuredCreneau
     *
     * @return Creneau
     */
    public function setHeuredCreneau($heuredCreneau) {
        $this->heuredCreneau = $heuredCreneau;

        return $this;
    }

    /**
     * Get heuredCreneau
     *
     * @return \DateTime
     */
    public function getHeuredCreneau() {
        return $this->heuredCreneau;
    }

    /**
     * Set heurefCreneau
     *
     * @param \DateTime $heurefCreneau
     *
     * @return Creneau
     */
    public function setHeurefCreneau($heurefCreneau) {
        $this->heurefCreneau = $heurefCreneau;

        return $this;
    }

    /**
     * Get heurefCreneau
     *
     * @return \DateTime
     */
    public function getHeurefCreneau() {
        return $this->heurefCreneau;
    }

    /**
     * Constructor
     */
    public function __construct() {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add user
     *
     * @param \SPORT\UserBundle\Entity\User $user
     *
     * @return Creneau
     */
    public function addUser(\SPORT\UserBundle\Entity\User $user) {
        $this->users[] = $user;

        $date = new \DateTime();
        foreach ($user->getAbonnements() as $value) {
            if ($value->getDatefin() >= $date) {
                $value->decrementSeance();
            }
        }
        $this->decrement();
        return $this;
    }

    /**
     * Remove user
     *
     * @param \SPORT\UserBundle\Entity\User $user
     */
    public function removeUser(\SPORT\UserBundle\Entity\User $user) {
        $this->users->removeElement($user);
        $this->increment();
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers() {
        return $this->users;
    }

    private function decrement() {
        if ($this->nbplaceCreneau >= 1) {
            $this->nbplaceCreneau = $this->nbplaceCreneau - 1;
        }
    }

    private function increment() {

        $this->nbplaceCreneau = $this->nbplaceCreneau + 1;
    }

}
