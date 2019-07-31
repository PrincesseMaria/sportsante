<?php

namespace SPORT\LocationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use SPORT\UserBundle\Entity\User;
use SPORT\LocationBundle\Entity\Livraison;

/**
 * Commande
 *
 * @ORM\Table(name="commande")
 * @ORM\Entity(repositoryClass="SPORT\LocationBundle\Repository\CommandeRepository")
 */
class Commande {

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
     * @ORM\Column(name="commande_intitule", type="string", length=100)
     */
    private $commandeIntitule;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="commande_date", type="datetime")
     */
    private $commandeDate;

    /**
     * @ORM\ManyToOne(targetEntity="SPORT\UserBundle\Entity\User", inversedBy="commandes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="SPORT\LocationBundle\Entity\Livraison", mappedBy="commande")
     */
    private $livraisons;

    function __construct() {
        $this->commandeDate = new \DateTime();
        $this->livraisons = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set commandeIntitule
     *
     * @param string $commandeIntitule
     *
     * @return Commande
     */
    public function setCommandeIntitule($commandeIntitule) {
        $this->commandeIntitule = $commandeIntitule;

        return $this;
    }

    /**
     * Get commandeIntitule
     *
     * @return string
     */
    public function getCommandeIntitule() {
        return $this->commandeIntitule;
    }

    /**
     * Set commandeDate
     *
     * @param \DateTime $commandeDate
     *
     * @return Commande
     */
    public function setCommandeDate($commandeDate) {
        $this->commandeDate = $commandeDate;

        return $this;
    }

    /**
     * Get commandeDate
     *
     * @return \DateTime
     */
    public function getCommandeDate() {
        return $this->commandeDate;
    }

    /**
     * Set user
     *
     * @param \SPORT\UserBundle\Entity\User $user
     *
     * @return Commande
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
     * Add livraison
     *
     * @param SPORT\LocationBundle\Entity\Livraison $livraison
     *
     * @return Commande
     */
    public function addLivraison(\SPORT\LocationBundle\Entity\Livraison $livraison)
    {
        $this->livraisons[] = $livraison;
        $livraison->setCommande($this);
        return $this;
    }

    /**
     * Remove livraison
     *
     * @param \SPORT\SanteBundle\Entity\Livraison $livraison
     */
    public function removeLivraison(\SPORT\LocationBundle\Entity\Livraison $livraison)
    {
        $this->livraisons->removeElement($livraison);
    }

    /**
     * Get livraisons
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLivraisons()
    {
        return $this->livraisons;
    }
}
