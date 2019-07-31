<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace SPORT\UserBundle\Entity;

use SPORT\LocationBundle\Entity\AdresseUser;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use SPORT\LocationBundle\Entity\Commande;
use SPORT\SanteBundle\Entity\Abonnement;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 *   @ORM\HasLifecycleCallbacks()
 */
class User extends BaseUser {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     *  * @ORM\Column(type="string")
     */
    protected $nom;

    /**
     *  * @ORM\Column(type="string")
     */
    protected $prenom;

    /**
     *  @ORM\Column(type = "string")
     */
    protected $adresse;

    /**
     * @ORM\OneToMany(targetEntity="SPORT\LocationBundle\Entity\Commande", mappedBy="user")
     */
    private $commandes;
   

    /**
     * @ORM\OneToMany(targetEntity="SPORT\LocationBundle\Entity\AdresseUser", mappedBy="utilisateur", cascade={"remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $adresses;

    /**
     * @ORM\OneToMany(targetEntity="SPORT\SanteBundle\Entity\Abonnement", mappedBy="user")
     */
    private $abonnements;

    public function __construct() {
        parent::__construct();
        $this->adresses = new \Doctrine\Common\Collections\ArrayCollection();
// your own logic
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return User
     */
    public function setNom($nom) {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom() {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return User
     */
    public function setPrenom($prenom) {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom() {
        return $this->prenom;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return User
     */
    public function setAdresse($adresse) {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse() {
        return $this->adresse;
    }

    /**
     * Add commande
     *
     * @param \SPORT\LocationBundle\Entity\Commande $commande
     *
     * @return User
     */
    public function addCommande(\SPORT\LocationBundle\Entity\Commande $commande) {
        $this->commandes[] = $commande;
        $commande->setUser($this);
        return $this;
    }

    /**
     * Remove commande
     *
     * @param \SPORT\LocationBundle\Entity\Commande $commande
     */
    public function removeCommande(\SPORT\LocationBundle\Entity\Commande $commande) {
        $this->commandes->removeElement($commande);
    }

    /**
     * Get commandes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCommandes() {
        return $this->commandes;
    }

    /**
     * Add adress
     *
     * @param \SPORT\LocationBundle\Entity\AdresseUser $adress
     *
     * @return User
     */
    public function addAdress(\SPORT\LocationBundle\Entity\AdresseUser $adress) {
        $this->adresses[] = $adress;
        $adress->setUtilisateur(this);
        return $this;
    }

    /**
     * Remove adress
     *
     * @param \SPORT\LocationBundle\Entity\AdresseUser $adress
     */
    public function removeAdress(\SPORT\LocationBundle\Entity\AdresseUser $adress) {
        $this->adresses->removeElement($adress);
    }

    /**
     * Get adresses
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAdresses() {
        return $this->adresses;
    }

    /**
     * Add abonnement
     *
     * @param \SPORT\SanteBundle\Entity\Abonnement $abonnement
     *
     * @return User
     */
    public function addAbonnement(\SPORT\SanteBundle\Entity\Abonnement $abonnement) {
        $this->abonnements[] = $abonnement;

        $abonnement->setUser($this);
        return $this;
    }

    /**
     * Remove abonnement
     *
     * @param \SPORT\SanteBundle\Entity\Abonnement $abonnement
     */
    public function removeAbonnement(\SPORT\SanteBundle\Entity\Abonnement $abonnement) {
        $this->abonnements->removeElement($abonnement);
    }

    /**
     * Get abonnements
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAbonnements() {
        return $this->abonnements;
    }

}
